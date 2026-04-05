<x-layout>
    <div class="flex min-h-screen">
        <!-- CONTENT -->
        <div class="p-7 overflow-y-auto flex-1 min-w-0">
          <!-- Banner -->
          <x-home.banner/>
          <!-- Kategori Chips -->
          <div class="flex flex-wrap gap-2 mb-5">
            <x-home.category-chip/>
          </div>

          <!-- Section: Koleksi Terbaru -->
          <div class="flex items-center justify-between mb-3 w-full">
            <h3 class="text-lg font-semibold text-gray-800 pb-1 border-b-2 border-blue-600">Koleksi Terbaru</h3>
            {{-- <a href="#" class="text-xs font-medium text-blue-600 hover:underline">Lihat semua →</a> --}}
          </div>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-8 w-full">
            @forelse ($books as $book)
              <x-home.card
                :book="$book"
              />
            @empty

            @endforelse
          </div>
    
        </div>
        
      </div>
    </div>
</x-layout>
