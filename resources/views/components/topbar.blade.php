<!-- TOPBAR -->
<div class="bg-white border-b border-gray-100 px-7 py-3 flex items-center gap-3 sticky top-0 z-10">
  <div class="relative flex-1 max-w-lg">
    <form action="{{ route('home') }}" method="GET">
      
      <x-heroicon-o-magnifying-glass 
        class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-blue-300"/> 

      <input 
        type="text" 
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari judul buku, penulis, atau penerbit..."
        class="w-full pl-9 pr-4 py-2 text-sm bg-[#F4F7FB] border border-gray-100 rounded-lg outline-none focus:border-blue-400 focus:bg-white transition-colors placeholder-gray-300"
      >
    </form>
  </div>
  <div class="flex gap-2">
    <button class="px-3 py-2 text-xs font-semibold rounded-lg bg-blue-600 text-white border border-blue-600">Semua</button>
    <button class="px-3 py-2 text-xs font-medium rounded-lg text-gray-500 border border-gray-100 bg-white hover:border-blue-200 hover:text-blue-600 transition-colors">Tersedia</button>
    <button class="px-3 py-2 text-xs font-medium rounded-lg text-gray-500 border border-gray-100 bg-white hover:border-blue-200 hover:text-blue-600 transition-colors">Terbaru</button>
  </div>
</div>