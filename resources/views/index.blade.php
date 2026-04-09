@php
  use App\Models\Kategori;
  use App\Models\Buku;

  $kategoris = Kategori::orderBy('id', 'desc')
    ->limit(5)
    ->get();

  $tahunList = Buku::select('tahun_terbit')
    ->distinct()
    ->whereNotNull('tahun_terbit')
    ->where('tahun_terbit', '!=', '')
    ->orderByDesc('tahun_terbit')
    ->pluck('tahun_terbit');

@endphp
<x-layout>
  <div class="flex min-h-screen">
    <div class="p-4 md:p-7 overflow-y-auto flex-1 min-w-0 max-w-5xl mx-auto">
      <x-home.banner/>

      <div class="flex flex-wrap items-center gap-2 mb-5">
        {{-- Reset / Semua --}}
        <a href="{{ route('home') }}"
          class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium
          {{ !request('search') && !request()->route('kategori')
  ? 'bg-blue-50 border border-blue-200 text-blue-800'
  : 'bg-gray-50 border border-gray-200 text-gray-600' }}">
          Semua
        </a>

        {{-- Search chip --}}
        <x-home.category-chip type="search" />

        {{-- Kategori chips --}}
        @forelse ($kategoris as $kategori)
          <x-home.category-chip type="kategori" :kategori="$kategori" />
        @empty
          <span class="text-xs text-gray-400 px-3 py-1.5">Belum ada kategori</span>
        @endforelse

        {{-- Filter button (paling kanan) --}}
        <x-home.filter-button  />
      </div>

      <div class="flex items-center justify-between mb-3 w-full">
        <h3 class="text-lg font-semibold text-gray-800 pb-1 border-b-2 border-blue-600">Koleksi Terbaru</h3>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mb-8 w-full">
        @forelse ($books as $book)
          <x-home.card :book="$book" />
        @empty
          <div class="col-span-2 md:col-span-4 flex flex-col items-center justify-center py-16 px-4">
            <svg class="w-20 h-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Tidak Ada Buku</h3>
            <p class="text-sm text-gray-500 text-center max-w-md">
              @if(request('search'))
                Pencarian "<strong>{{ request('search') }}</strong>" tidak ditemukan.
              @elseif(request()->route('kategori'))
                Belum ada buku dalam kategori ini.
              @else
                Koleksi buku masih kosong. Silakan tambahkan buku baru.
              @endif
            </p>
            @if(request('search') || request()->route('kategori'))
              <a href="{{ route('home') }}" 
                class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                Lihat Semua Buku
              </a>
            @endif
          </div>
        @endforelse
      </div>
      
      @if($books->isNotEmpty())
        <div class="mt-8">
          {{ $books->links() }}
        </div>
      @endif
    </div>
  </div>
</x-layout>