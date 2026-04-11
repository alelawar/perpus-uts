<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use App\Models\Siswa;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeductOverduePoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'peminjaman:deduct-overdue-points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deduct 20 points from students with overdue book loans (H+1 after due date)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting overdue points deduction process...');

        // Get all overdue loans that are still active (dipinjam)
        $overdueLoans = Peminjaman::where('status', 'dipinjam')
            ->whereDate('tgl_kembali_seharusnya', '<', now()->startOfDay())
            ->with('siswa')
            ->get();

        if ($overdueLoans->isEmpty()) {
            $this->info('No overdue loans found.');
            return 0;
        }

        $processedCount = 0;
        $totalPointsDeducted = 0;

        DB::beginTransaction();
        try {
            foreach ($overdueLoans as $peminjaman) {
                $siswa = $peminjaman->siswa;
                
                if (!$siswa) {
                    $this->warn("Siswa not found for peminjaman ID: {$peminjaman->id}");
                    continue;
                }

                // Calculate days overdue
                $daysOverdue = max(0, $peminjaman->tgl_kembali_seharusnya->diffInDays(now()->startOfDay()));
                
                // Deduct 20 points per day overdue
                $pointsToDeduct = $daysOverdue * 20;
                
                // Update siswa points
                $oldPoints = $siswa->point;
                $siswa->point = max(0, $siswa->point - $pointsToDeduct); // Prevent negative points
                $siswa->save();

                $processedCount++;
                $totalPointsDeducted += ($oldPoints - $siswa->point);

                $this->line(sprintf(
                    'Siswa: %s (NIS: %s) - Overdue: %d days - Points deducted: %d (from %d to %d)',
                    $siswa->nama,
                    $siswa->nis,
                    $daysOverdue,
                    $oldPoints - $siswa->point,
                    $oldPoints,
                    $siswa->point
                ));

                // Log the action
                Log::info('Points deducted for overdue loan', [
                    'siswa_id' => $siswa->id,
                    'peminjaman_id' => $peminjaman->id,
                    'days_overdue' => $daysOverdue,
                    'points_deducted' => $oldPoints - $siswa->point,
                    'old_points' => $oldPoints,
                    'new_points' => $siswa->point,
                ]);
            }

            DB::commit();

            $this->newLine();
            $this->info("✓ Process completed successfully!");
            $this->info("Total loans processed: {$processedCount}");
            $this->info("Total points deducted: {$totalPointsDeducted}");

            return 0;

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Error occurred: ' . $e->getMessage());
            Log::error('Overdue points deduction failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return 1;
        }
    }
}