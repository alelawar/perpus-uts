<x-layout>
  <div class="p-4 md:p-7 flex-1 min-w-0">
    <div class="max-w-4xl">

      {{-- Hero --}}
      <x-about.hero />

      {{-- Konsep Sistem --}}
      <x-about.concept />

      {{-- Cara Pinjam --}}
      <x-about.cara-pinjam />

      {{-- Sistem Poin --}}
      <x-about.sistem-poin />

      {{-- Footer note --}}
      <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4 flex items-center gap-3">
        <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
          <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
          </svg>
        </div>
        <p class="text-xs text-gray-500 leading-relaxed">
          Sistem perpustakaan ini dikembangkan untuk <span class="font-semibold text-gray-700">SMK Infokom Bogor</span> guna memudahkan pengelolaan koleksi buku dan proses peminjaman bagi seluruh siswa.
        </p>
      </div>

    </div>
  </div>
</x-layout>