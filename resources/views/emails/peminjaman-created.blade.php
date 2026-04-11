{{-- Header Success --}}
<div style="background: white; border-radius: 16px; border: 1px solid #f3f4f6; padding: 24px; margin-bottom: 16px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="48" style="vertical-align: top; padding-right: 16px;">
                <div style="width: 48px; height: 48px; background: #ecfdf5; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <span style="font-size: 24px;">✅</span>
                </div>
            </td>
            <td style="vertical-align: top;">
                <h1 style="font-size: 20px; font-weight: bold; color: #1f2937; margin: 0 0 4px 0;">Peminjaman Berhasil!</h1>
                <p style="font-size: 14px; color: #6b7280; margin: 0;">
                    Halo <strong style="color: #374151;">{{ $peminjaman->siswa->nama }}</strong>, peminjaman bukumu telah dicatat.
                </p>
            </td>
        </tr>
    </table>
</div>

{{-- Info Poin Siswa --}}
<div style="background: white; border-radius: 16px; border: 1px solid #f3f4f6; padding: 20px; margin-bottom: 16px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="36" style="vertical-align: top; padding-right: 12px;">
                <div style="width: 36px; height: 36px; background: #eff6ff; border-radius: 12px; text-align: center; line-height: 36px;">
                    <span style="font-size: 20px;">⭐</span>
                </div>
            </td>
            <td style="vertical-align: top;">
                <p style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0 0 4px 0;">Poin Kamu Saat Ini</p>
                <p style="margin: 0;">
                    <span style="font-size: 28px; font-weight: bold; color: {{ $peminjaman->siswa->point >= 60 ? '#16a34a' : ($peminjaman->siswa->point >= 20 ? '#f59e0b' : '#ef4444') }};">
                        {{ $peminjaman->siswa->point }}
                    </span>
                    <span style="font-size: 14px; color: #6b7280;"> poin</span>
                </p>
            </td>
        </tr>
    </table>
    
    {{-- Progress Bar --}}
    <div style="margin: 12px 0;">
        <div style="height: 10px; background: #f3f4f6; border-radius: 10px; overflow: hidden;">
            <div style="height: 100%; background: {{ $peminjaman->siswa->point >= 60 ? '#4ade80' : ($peminjaman->siswa->point >= 20 ? '#fbbf24' : '#f87171') }}; width: {{ min($peminjaman->siswa->point, 100) }}%; border-radius: 10px;"></div>
        </div>
    </div>

    @if($peminjaman->siswa->point < 60)
        <div style="background: #fef3c7; border-radius: 12px; padding: 12px; margin-top: 12px;">
            <p style="font-size: 12px; color: #92400e; margin: 0;">
                <strong>⚠️ Perhatian!</strong> Poin kamu sedang rendah. Kembalikan buku tepat waktu agar poin tidak berkurang.
            </p>
        </div>
    @endif
</div>

{{-- Detail Buku yang Dipinjam --}}
<div style="background: white; border-radius: 16px; border: 1px solid #f3f4f6; padding: 20px; margin-bottom: 16px;">
    <h2 style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0 0 16px 0;">
        📚 Buku yang Dipinjam
    </h2>
    
    @foreach ($peminjaman->bukus as $item)
        <div style="background: #f9fafb; border-radius: 12px; padding: 12px; margin-bottom: 8px;">
            <p style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0;">{{ $item->buku->judul }}</p>
            @if(isset($item->buku->penulis))
                <p style="font-size: 12px; color: #6b7280; margin: 4px 0 0 0;">{{ $item->buku->penulis }}</p>
            @endif
        </div>
    @endforeach
</div>

{{-- Info Tanggal --}}
<div style="background: white; border-radius: 16px; border: 1px solid #f3f4f6; padding: 20px; margin-bottom: 16px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="50%" style="padding-right: 8px;">
                <p style="font-size: 12px; color: #6b7280; margin: 0 0 4px 0;">Tanggal Pinjam</p>
                <p style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0;">
                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                </p>
            </td>
            <td width="50%" style="padding-left: 8px;">
                <p style="font-size: 12px; color: #6b7280; margin: 0 0 4px 0;">Batas Pengembalian</p>
                <p style="font-size: 14px; font-weight: 600; color: #dc2626; margin: 0;">
                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y') }}
                </p>
            </td>
        </tr>
    </table>
</div>

{{-- Reminder Sistem Poin --}}
<div style="background: linear-gradient(135deg, #dbeafe 0%, #e0e7ff 100%); border-radius: 16px; border: 1px solid #bfdbfe; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="36" style="vertical-align: top; padding-right: 12px;">
                <div style="width: 36px; height: 36px; background: white; border-radius: 12px; text-align: center; line-height: 36px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <span style="font-size: 20px;">ℹ️</span>
                </div>
            </td>
            <td style="vertical-align: top;">
                <p style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0 0 4px 0;">Ingat Sistem Poin!</p>
                <p style="font-size: 12px; color: #4b5563; line-height: 1.5; margin: 0 0 12px 0;">
                    Keterlambatan pengembalian akan mengurangi poin kamu <strong style="color: #dc2626;">20 poin per hari</strong>. 
                    Jika poin mencapai 0, hak pinjam kamu akan dinonaktifkan.
                </p>
            </td>
        </tr>
    </table>

    <div style="background: white; border-radius: 12px; padding: 12px;">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td style="font-size: 12px; color: #374151; font-weight: 500;">Kembalikan sebelum</td>
                <td style="text-align: right; font-size: 14px; font-weight: bold; color: #dc2626;">
                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y') }}
                </td>
            </tr>
        </table>
    </div>
</div>