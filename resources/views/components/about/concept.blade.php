{{-- components/about/concept.blade.php --}}
<div class="mb-8">
  <h2 class="text-lg font-semibold text-gray-800 pb-1 border-b-2 border-blue-600 inline-block mb-5">Konsep Sistem</h2>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    {{-- Card 1: Katalog Buku --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5 hover:border-blue-200 hover:-translate-y-0.5 transition-all">
      <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
        </svg>
      </div>
      <h3 class="text-sm font-semibold text-gray-800 mb-2">Katalog Buku Lengkap</h3>
      <p class="text-xs text-gray-500 leading-relaxed">
        Setiap buku dilengkapi info rak dan hambalan penyimpanan, stok ketersediaan, kategori, penulis, hingga tahun terbit — semua bisa dicari dan difilter dengan mudah.
      </p>
    </div>

    {{-- Card 2: Peminjaman Offline --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5 hover:border-blue-200 hover:-translate-y-0.5 transition-all">
      <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
        </svg>
      </div>
      <h3 class="text-sm font-semibold text-gray-800 mb-2">Peminjaman Offline</h3>
      <p class="text-xs text-gray-500 leading-relaxed">
        Proses peminjaman dilakukan secara fisik di perpustakaan. Admin mencatat buku yang dipinjam langsung dari dashboard — cepat, tanpa form panjang bagi siswa.
      </p>
    </div>

    {{-- Card 3: Sistem Poin --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5 hover:border-blue-200 hover:-translate-y-0.5 transition-all">
      <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
        </svg>
      </div>
      <h3 class="text-sm font-semibold text-gray-800 mb-2">Sistem Poin Siswa</h3>
      <p class="text-xs text-gray-500 leading-relaxed">
        Setiap siswa memiliki poin yang berfungsi sebagai hak pinjam. Keterlambatan pengembalian akan memotong 20 poin per hari. Ketika poin habis, hak pinjam siswa tidak dapat digunakan.
      </p>
    </div>

  </div>
</div>