<x-layout>
  <div class="min-h-screen bg-gray-50 py-8 px-4">
    <div class="max-w-3xl mx-auto">

      {{-- Back Button --}}
      <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-blue-600 transition-colors mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </a>

      <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">

        {{-- Cover + Info Header --}}
        <div class="flex flex-col md:flex-row">

          {{-- Cover --}}
          <div class="md:w-56 shrink-0 bg-blue-50 flex items-center justify-center min-h-48 relative">
            @if($book->cover)
              <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
            @else
              <span class="text-6xl">📘</span>
            @endif

            {{-- Stok Badge --}}
            <div class="absolute top-3 right-3">
              @if($book->stok > 0)
                <span class="text-[10px] font-semibold px-2 py-1 rounded-full bg-green-100 text-green-700 border border-green-200">
                  Stok {{ $book->stok }}
                </span>
              @else
                <span class="text-[10px] font-semibold px-2 py-1 rounded-full bg-red-100 text-red-600 border border-red-200">
                  Habis
                </span>
              @endif
            </div>
          </div>

          {{-- Header Info --}}
          <div class="flex-1 p-6 flex flex-col justify-between">
            <div>
              <span class="text-[11px] font-semibold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 inline-block mb-3">
                {{ $book->kategori->nama }}
              </span>
              <h1 class="text-xl font-bold text-gray-800 leading-snug mb-1">{{ $book->judul }}</h1>
              <p class="text-sm text-gray-400 mb-4">{{ $book->penulis }}</p>

              {{-- Meta Grid --}}
              <div class="grid grid-cols-2 gap-3">
                <div class="bg-gray-50 rounded-xl p-3">
                  <p class="text-[10px] text-gray-400 uppercase tracking-wide mb-0.5">Penerbit</p>
                  <p class="text-xs font-semibold text-gray-700">{{ $book->penerbit }}</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-3">
                  <p class="text-[10px] text-gray-400 uppercase tracking-wide mb-0.5">Tahun Terbit</p>
                  <p class="text-xs font-semibold text-gray-700">{{ $book->tahun_terbit }}</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-3">
                  <p class="text-[10px] text-gray-400 uppercase tracking-wide mb-0.5">Rak</p>
                  <p class="text-xs font-semibold text-gray-700">{{ $book->rak }}</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-3">
                  <p class="text-[10px] text-gray-400 uppercase tracking-wide mb-0.5">Hambalan</p>
                  <p class="text-xs font-semibold text-gray-700">{{ $book->hambalan }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Divider --}}
        <div class="border-t border-gray-100 mx-6"></div>

        {{-- Sinopsis --}}
        <div class="p-6">
          <h2 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Sinopsis</h2>
          <p class="text-sm text-gray-600 leading-relaxed">{{ $book->sinopsis }}</p>
        </div>

        {{-- Action --}}
        <div class="px-6 pb-6">
          {{-- <button
            class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-3 rounded-xl transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            {{ $book->stok <= 0 ? 'disabled' : '' }}
          >
            {{ $book->stok > 0 ? 'Pinjam Buku' : 'Stok Habis' }}
          </button> --}}
        </div>

      </div>
    </div>
  </div>
</x-layout>