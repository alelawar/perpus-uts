@php
  use App\Models\Buku;

  $tahun = request('tahun');
  $stok = request('stok');
  $penulis = request('penulis');
  $aktif = $tahun || $stok || $penulis;

  $penulisList = Buku::select('penulis')
    ->distinct()
    ->orderBy('penulis')
    ->pluck('penulis');

  $baseQuery = array_filter([
    'search' => request('search'),
    'kategori' => request('kategori'),
  ]);
@endphp

<div class="relative ml-auto" x-data="{ open: false }" @click.outside="open = false">

  {{-- Trigger --}}
  <button
    @click="open = !open"
    type="button"
    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium transition-colors
      {{ $aktif
  ? 'bg-blue-50 border border-blue-200 text-blue-800'
  : 'bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100' }}">
    <x-heroicon-o-funnel class="w-3.5 h-3.5" />
    Filter
    @if ($aktif)
      <span class="w-1.5 h-1.5 rounded-full bg-blue-500 inline-block"></span>
    @endif
  </button>

  {{-- Panel --}}
  <div
    x-show="open"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-xl shadow-lg z-50 p-4"
    style="display: none;">

    <form method="GET" action="{{ route('home') }}">

      {{-- Pertahankan query lain --}}
      @foreach ($baseQuery as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
      @endforeach

      {{-- Filter Tahun Terbit --}}
      <div class="mb-4">
        <label class="flex items-center gap-1.5 text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
          <x-heroicon-o-user class="w-3.5 h-3.5" />
          Penulis
        </label>

        <select name="penulis"
          class="w-full text-sm border border-gray-200 rounded-lg px-3 py-1.5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
          
          <option value="">Semua penulis</option>

          @foreach ($penulisList as $p)
            <option value="{{ $p }}" {{ $penulis == $p ? 'selected' : '' }}>
              {{ $p }}
            </option>
          @endforeach

        </select>
      </div>

      <div class="mb-4">
        <label class="flex items-center gap-1.5 text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
          <x-heroicon-o-calendar-days class="w-3.5 h-3.5" />
          Tahun Terbit
        </label>

        <input 
          type="number"
          name="tahun"
          value="{{ $tahun }}"
          placeholder="Contoh: 2020"
          class="w-full text-sm border border-gray-200 rounded-lg px-3 py-1.5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
        >
      </div>

      {{-- Filter Stok --}}
      <div class="mb-4">
        <label class="flex items-center gap-1.5 text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
          <x-heroicon-o-archive-box class="w-3.5 h-3.5" />
          Stok
        </label>
        <div class="flex flex-col gap-1.5">
          @foreach (['' => 'Semua', 'tersedia' => 'Tersedia', 'habis' => 'Habis'] as $val => $label)
            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
              <input type="radio" name="stok" value="{{ $val }}"
                {{ $stok === $val ? 'checked' : '' }}
                class="accent-blue-500">
              {{ $label }}
            </label>
          @endforeach
        </div>
      </div>

      {{-- Actions --}}
      <div class="flex gap-2 pt-1 border-t border-gray-100">
        <a href="{{ route('home', $baseQuery) }}"
          class="flex-1 text-center text-xs px-3 py-1.5 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
          Reset
        </a>
        <button type="submit"
          class="flex-1 text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors font-medium">
          Terapkan
        </button>
      </div>

    </form>
  </div>
</div>