<x-layout>
    <div class="flex min-h-screen">
    
      <!-- SIDEBAR -->
    
      <!-- MAIN -->
      
        <!-- CONTENT -->
        <div class="p-7 overflow-y-auto">
    
          <!-- Banner -->
          <x-banner/>
    
          <!-- Kategori Chips -->
          <div class="flex flex-wrap gap-2 mb-5">
            <x-category-chip/>
          </div>
    
          <!-- Section: Koleksi Terbaru -->
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-semibold text-gray-800">Koleksi Terbaru</h3>
            <a href="#" class="text-xs font-medium text-blue-600 hover:underline">Lihat semua →</a>
          </div>

          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mb-8">
            <x-card/>
    
          </div>
    
        </div>
        
      </div>
    </div>
</x-layout>
