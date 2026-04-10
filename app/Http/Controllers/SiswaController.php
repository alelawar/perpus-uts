<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Menampilkan halaman form registrasi siswa
     */
    public function show()
    {
        return view('registred-siswa');
    }

    /**
     * Memproses data registrasi siswa
     */
    public function post(Request $request)
    {
        // Validasi input dengan custom messages per field
        $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ],
            'nis' => [
                'required',
                'string',
                'unique:siswa,nis',
                'max:20'
            ],
            'email' => [
                'required',
                'string',
                'unique:siswa,email',
                'max:200'
            ],
            'no_telp' => [
                'required',
                'string',
                'unique:siswa,no_telp',
                'max:15',
                'regex:/^[0-9]+$/'
            ],
            'kelas' => [
                'required',
                'string',
                'max:10',
                Rule::in(['X', 'XI', 'XII'])
            ],
            'jurusan' => [
                'required',
                'string',
                'max:100'
            ],
            'tgl_masuk' => [
                'required',
                'date',
                'before_or_equal:today'
            ],
        ], [
            // Custom error messages per field
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 255 karakter',

            'nis.required' => 'NIS wajib diisi',
            'nis.unique' => 'NIS sudah terdaftar di sistem',
            'nis.max' => 'NIS maksimal 20 karakter',

            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar di sistem',
            'email.max' => 'Email maksimal 200 karakter',

            'no_telp.required' => 'Nomor telepon wajib diisi',
            'no_telp.unique' => 'Nomor telepon sudah terdaftar',
            'no_telp.regex' => 'Nomor telepon hanya boleh berisi angka',
            'no_telp.max' => 'Nomor telepon maksimal 15 digit',

            'kelas.required' => 'Kelas wajib diisi',
            'kelas.max' => 'Kelas maksimal 10 karakter',

            'jurusan.required' => 'Jurusan wajib diisi',
            'jurusan.max' => 'Jurusan maksimal 100 karakter',

            'tgl_masuk.required' => 'Tanggal masuk wajib diisi',
            'tgl_masuk.date' => 'Format tanggal tidak valid',
            'tgl_masuk.before_or_equal' => 'Tanggal masuk tidak boleh melebihi hari ini',
        ]);

        // Gunakan transaction untuk memastikan data integrity
        DB::beginTransaction();

        try {
            // Simpan data siswa ke database
            $siswa = Siswa::create([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'no_telp' => $request->no_telp,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'tgl_masuk' => $request->tgl_masuk,
                'is_verified' => false,
                'point' => 0,
            ]);

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('show-registred')
                ->with('success', 'Registrasi berhasil! Data siswa ' . $siswa->nama . ' telah tersimpan. Silakan tunggu verifikasi dari admin.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Jika terjadi error saat menyimpan
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.')
                ->withInput();
        }
    }
}
