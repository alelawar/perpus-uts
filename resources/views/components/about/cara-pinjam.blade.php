{{-- components/about/cara-pinjam.blade.php --}}
<div class="mb-8">
  <h2 class="text-lg font-semibold text-gray-800 pb-1 border-b-2 border-blue-600 inline-block mb-5">Cara Meminjam Buku</h2>

  <div class="bg-white rounded-2xl border border-gray-100 p-5 md:p-7">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      {{-- Step list --}}
      <div class="space-y-4">

        {{-- Step 1 --}}
        <div class="flex gap-4">
          <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center mt-0.5">1</div>
          <div>
            <p class="text-sm font-semibold text-gray-800 mb-0.5">Daftarkan Data Siswa</p>
            <p class="text-xs text-gray-500 leading-relaxed">Sebelum bisa meminjam, data siswa harus didaftarkan terlebih dahulu. Setiap siswa akan mendapatkan <span class="font-medium text-blue-600">kartu berisi QR Code</span> unik sebagai identitas. datangi petugas untuk mendaptkan kartu</p>
          </div>
        </div>

        {{-- Connector --}}
        <div class="ml-4 w-0.5 h-4 bg-gray-100"></div>

        {{-- Step 2 --}}
        <div class="flex gap-4">
          <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center mt-0.5">2</div>
          <div>
            <p class="text-sm font-semibold text-gray-800 mb-0.5">Scan QR Code Kartu</p>
            <p class="text-xs text-gray-500 leading-relaxed">Saat akan meminjam, siswa cukup menunjukkan kartu. Admin melakukan scan QR Code — sistem langsung mengenali identitas siswa secara otomatis.</p>
          </div>
        </div>

        {{-- Connector --}}
        <div class="ml-4 w-0.5 h-4 bg-gray-100"></div>

        {{-- Step 3 --}}
        <div class="flex gap-4">
          <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center mt-0.5">3</div>
          <div>
            <p class="text-sm font-semibold text-gray-800 mb-0.5">Pilih Buku & Konfirmasi</p>
            <p class="text-xs text-gray-500 leading-relaxed">Admin memilih buku yang ingin dipinjam dari daftar, lalu klik <span class="font-medium text-blue-600">Pinjam</span>. Proses selesai — tidak perlu mengisi formulir apapun.</p>
          </div>
        </div>

        {{-- Connector --}}
        <div class="ml-4 w-0.5 h-4 bg-gray-100"></div>

        {{-- Step 4 --}}
        <div class="flex gap-4">
          <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-600 text-white text-xs font-bold flex items-center justify-center mt-0.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>
          </div>
          <div>
            <p class="text-sm font-semibold text-gray-800 mb-0.5">Pengembalian</p>
            <p class="text-xs text-gray-500 leading-relaxed">Saat mengembalikan, scan QR Code siswa kembali, pilih buku yang dikembalikan, dan selesai. Sistem otomatis menghitung keterlambatan jika ada.</p>
          </div>
        </div>

      </div>

      {{-- QR Illustration --}}
      <div class="flex flex-col items-center justify-center py-4 md:py-0">
        <div class="relative">
          {{-- Kartu simulasi --}}
          <div class="w-44 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-4 shadow-lg shadow-blue-200">
            <div class="flex items-center gap-2 mb-4">
              <div class="w-6 h-6 rounded-md bg-white/20 flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
              </div>
              <span class="text-white text-[10px] font-bold tracking-wide">PERPUSTAKAAN</span>
            </div>
            {{-- QR Code visual --}}
            <div class="w-full aspect-square bg-white rounded-xl p-2 mb-3">
              <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <!-- QR decorative pattern -->
                <rect x="5" y="5" width="30" height="30" rx="3" fill="#1d4ed8"/>
                <rect x="10" y="10" width="20" height="20" rx="2" fill="white"/>
                <rect x="14" y="14" width="12" height="12" rx="1" fill="#1d4ed8"/>
                <rect x="65" y="5" width="30" height="30" rx="3" fill="#1d4ed8"/>
                <rect x="70" y="10" width="20" height="20" rx="2" fill="white"/>
                <rect x="74" y="14" width="12" height="12" rx="1" fill="#1d4ed8"/>
                <rect x="5" y="65" width="30" height="30" rx="3" fill="#1d4ed8"/>
                <rect x="10" y="70" width="20" height="20" rx="2" fill="white"/>
                <rect x="14" y="74" width="12" height="12" rx="1" fill="#1d4ed8"/>
                <!-- Dots pattern -->
                <rect x="42" y="5" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="52" y="5" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="42" y="15" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="52" y="25" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="42" y="42" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="52" y="42" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="62" y="42" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="42" y="52" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="62" y="52" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="72" y="42" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="82" y="52" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="52" y="62" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="62" y="72" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="72" y="62" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="82" y="72" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="42" y="72" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="52" y="82" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="72" y="82" width="6" height="6" rx="1" fill="#1d4ed8"/>
                <rect x="82" y="82" width="6" height="6" rx="1" fill="#1d4ed8"/>
              </svg>
            </div>
            <p class="text-white/70 text-[9px] text-center font-medium">Kartu Siswa Perpustakaan</p>
          </div>
          {{-- Floating badge --}}
          <div class="absolute -top-3 -right-3 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-md">Scan & Go!</div>
        </div>
        <p class="text-xs text-gray-400 text-center mt-4 max-w-[140px] leading-relaxed">Tunjukkan kartu, scan, selesai dalam hitungan detik.</p>
      </div>

    </div>
  </div>
</div>