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
    <div class="p-4 md:p-7 overflow-y-auto flex-1 min-w-0">
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
        @foreach ($kategoris as $kategori)
          <x-home.category-chip type="kategori" :kategori="$kategori" />
        @endforeach

        {{-- Filter button (paling kanan) --}}
        <x-home.filter-button :tahunList="$tahunList" />
      </div>

      <div class="flex items-center justify-between mb-3 w-full">
        <h3 class="text-lg font-semibold text-gray-800 pb-1 border-b-2 border-blue-600">Koleksi Terbaru</h3>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mb-8 w-full">
        @forelse ($books as $book)
          <x-home.card :book="$book" />
        @empty
        @endforelse
      </div>
    </div>
  </div>
</x-layout>
