  @php
    use App\Models\Kategori;

    function navClass($route, $kategori = null)
    {
      if ($kategori) {
        $isActive = request()->route('kategori')?->is($kategori);
      } else {
        $isActive = request()->routeIs($route);
      }

      return $isActive
        ? 'text-blue-600 bg-blue-50 font-semibold'
        : 'text-gray-500 hover:bg-blue-50 hover:text-blue-600 font-medium';
    }

    $categories = Kategori::orderBy('nama')
      ->limit(5)
      ->get();
  @endphp

  {{-- Overlay (mobile only) --}}
  <div
    x-show="sidebarOpen"
    x-transition:enter="transition-opacity ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @click="sidebarOpen = false"
    class="fixed inset-0 bg-black/40 z-30 md:hidden"
    style="display: none;"
  ></div>

  {{-- Sidebar Desktop: selalu visible di md+ --}}
  {{-- Sidebar Mobile: drawer dari kiri, toggle via sidebarOpen --}}
  <aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed md:static inset-y-0 left-0 z-40
           w-56 flex-shrink-0
           bg-white border-r border-gray-100
           flex flex-col py-5 px-3
           md:translate-x-0 md:sticky md:top-0 md:h-screen
           overflow-y-auto
           transition-transform duration-200 ease-in-out
           md:transition-none md:!translate-x-0"
  >

    <!-- Header: brand + tombol tutup (mobile) -->
    <div class="flex items-center justify-between mb-6 px-2">
      <div class="flex items-center gap-2">
        <div class="w-8 h-8 bg-gray-300 rounded-lg flex items-center justify-center flex-shrink-0">
          <img src="https://smkinfokom-bogor.sch.id/images/logo123.png" alt="">
        </div>
        <span class="text-blue-800 text-base font-bold">SMK Infokom</span>
      </div>

      <!-- Tombol close hanya di mobile -->
      <button
        @click="sidebarOpen = false"
        class="md:hidden w-7 h-7 flex items-center justify-center rounded-lg text-gray-400 hover:bg-gray-100 transition-colors"
        aria-label="Tutup menu"
      >
        <x-heroicon-o-x-mark class="w-4 h-4" />
      </button>
    </div>

    <!-- Nav: Menu -->
    <p class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase px-2 mb-1">Menu</p>
    <a href="{{ route('home') }}" @click="sidebarOpen = false" class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm mb-0.5 transition-colors {{ navClass('home') }}">
      <x-heroicon-m-home class="w-5 h-5" />
      Beranda
    </a>
    @if (Auth::check())
      <a href="{{ route('filament.admin.pages.dashboard') }}" @click="sidebarOpen = false" class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm mb-0.5 transition-colors {{ navClass('filament.admin.pages.dashboard') }}">
        <x-heroicon-m-user class="w-5 h-5" />
        Admin
      </a>
    @endif

    <hr class="my-3 border-gray-100">

    <!-- Nav: Kategori -->
    <p class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase px-2 mb-1">Kategori</p>

    <a href="#" @click="sidebarOpen = false" class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm font-medium text-gray-500 hover:bg-blue-50 hover:text-blue-600 mb-0.5 transition-colors">
      <x-heroicon-m-hashtag class="w-5 h-5"/>
      Semua Kategori
    </a>

    @forelse ($categories as $cat)
      <a href="{{ route('show-category', $cat) }}" @click="sidebarOpen = false"
        class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm mb-0.5 transition-colors {{ navClass(null, $cat) }}">
        <x-heroicon-m-tag class="w-5 h-5 rounded-full flex-shrink-0" />
        {{ $cat->nama }}
      </a>
    @empty
    @endforelse

    <div class="my-3 border-t-2 border-gray-100"></div>

    <a href="#" @click="sidebarOpen = false" class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm font-medium text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-colors">
      <x-heroicon-m-question-mark-circle class="w-5 h-5" />
      Tentang
    </a>
  </aside>
