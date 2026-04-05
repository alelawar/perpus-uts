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

  <aside class="w-56 flex-shrink-0 bg-white border-r border-gray-100 flex flex-col py-5 px-3 sticky top-0 h-screen overflow-y-auto">

    <!-- Brand -->
    <div class="flex items-center gap-2 px-2 mb-6">
      <div class="w-8 h-8 bg-gray-300 rounded-lg flex items-center justify-center flex-shrink-0">
        <img src="https://smkinfokom-bogor.sch.id/images/logo123.png" alt="">
      </div>
      <span class=" text-blue-800 text-base font-bold">SMK Infokom</span>
    </div>

    <!-- Nav: Menu -->
    <p class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase px-2 mb-1">Menu</p>
    <a href="{{ route('home') }}" class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm mb-0.5 transition-colors {{ navClass('home') }}">
      <x-heroicon-m-home class="w-5 h-5" />
      Beranda
    </a>

    <hr class="my-3 border-gray-100">

    <!-- Nav: Kategori -->
    <p class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase px-2 mb-1">Kategori</p>
    
    <a href="#" class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm font-medium text-gray-500 hover:bg-blue-50 hover:text-blue-600 mb-0.5 transition-colors">
      <x-heroicon-m-hashtag  class="w-5 h-5"/>
      Semua Kategori
    </a>

    @forelse ($categories as $cat)
      <a href="{{ route('show-category', $cat) }}" 
        class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm mb-0.5 transition-colors {{ navClass(null, $cat) }}">
        <x-heroicon-m-tag class="w-5 h-5 rounded-full flex-shrink-0" />
        {{ $cat->nama }}
      </a>
    @empty
    @endforelse
    <div class="my-3 border-t-2 border-gray-100"></div>

    <a href="#" class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm font-medium text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-colors">
        <x-heroicon-m-question-mark-circle  class="w-5 h-5" />
      Tentang
    </a>
  </aside>