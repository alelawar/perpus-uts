{{-- components/about/sistem-poin.blade.php --}}
<div class="mb-8">
  <h2 class="text-lg font-semibold text-gray-800 pb-1 border-b-2 border-blue-600 inline-block mb-5">Sistem Poin Siswa</h2>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Penjelasan poin --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5">
      <div class="flex items-start gap-3 mb-4">
        <div class="w-9 h-9 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
          <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-gray-800 mb-1">Bagaimana Poin Bekerja?</p>
          <p class="text-xs text-gray-500 leading-relaxed">Setiap siswa yang terdaftar memiliki sejumlah poin sebagai hak pinjam. Poin ini akan berkurang apabila terjadi keterlambatan pengembalian buku.</p>
        </div>
      </div>

      <div class="space-y-2">
        <div class="flex items-center justify-between bg-gray-50 rounded-xl px-4 py-2.5">
          <span class="text-xs text-gray-600">Keterlambatan per hari</span>
          <span class="text-xs font-bold text-red-500">− 20 poin</span>
        </div>
        <div class="flex items-center justify-between bg-gray-50 rounded-xl px-4 py-2.5">
          <span class="text-xs text-gray-600">Poin habis (0)</span>
          <span class="text-xs font-bold text-red-500">Hak pinjam nonaktif</span>
        </div>
        <div class="flex items-center justify-between bg-blue-50 rounded-xl px-4 py-2.5">
          <span class="text-xs text-blue-700 font-medium">Kembalikan tepat waktu</span>
          <span class="text-xs font-bold text-green-600">Poin aman ✓</span>
        </div>
      </div>
    </div>

    {{-- Ilustrasi bar poin --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex flex-col justify-between">
      <p class="text-sm font-semibold text-gray-800 mb-4">Simulasi Poin</p>

      <div class="space-y-3">
        {{-- 100 poin --}}
        <div>
          <div class="flex justify-between mb-1">
            <span class="text-xs text-gray-500">Tepat waktu</span>
            <span class="text-xs font-semibold text-green-600">100 poin</span>
          </div>
          <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-green-400 rounded-full" style="width: 100%"></div>
          </div>
        </div>
        {{-- 60 poin --}}
        <div>
          <div class="flex justify-between mb-1">
            <span class="text-xs text-gray-500">Terlambat 2 hari</span>
            <span class="text-xs font-semibold text-amber-500">60 poin</span>
          </div>
          <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-amber-400 rounded-full" style="width: 60%"></div>
          </div>
        </div>
        {{-- 20 poin --}}
        <div>
          <div class="flex justify-between mb-1">
            <span class="text-xs text-gray-500">Terlambat 4 hari</span>
            <span class="text-xs font-semibold text-orange-500">20 poin</span>
          </div>
          <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-orange-400 rounded-full" style="width: 20%"></div>
          </div>
        </div>
        {{-- 0 poin --}}
        <div>
          <div class="flex justify-between mb-1">
            <span class="text-xs text-gray-500">Terlambat 5 hari</span>
            <span class="text-xs font-semibold text-red-500">0 poin</span>
          </div>
          <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-red-400 rounded-full" style="width: 2%"></div>
          </div>
        </div>
      </div>

      <p class="text-[10px] text-gray-400 mt-4">*Simulasi berdasarkan poin awal 100 dan denda 20 poin/hari</p>
    </div>

  </div>
</div>