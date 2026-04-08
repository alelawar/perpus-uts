@props([
  'book'
])
<a href="{{ route('detail-book', $book->id) }}">
  <div class="bg-white w-full border border-gray-100 rounded-2xl overflow-hidden hover:border-blue-200 hover:-translate-y-1 transition-all cursor-pointer">
    <div class="h-28 md:h-36 bg-blue-50 flex items-center justify-center text-4xl relative">
      <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" class="h-full object-cover">
      <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-green-500 border-2 border-white"></span>
    </div>
    <div class="p-2.5 md:p-3">
      <span class="text-[10px] font-semibold px-2 py-0.5 rounded bg-blue-50 text-blue-800 inline-block mb-1.5">{{ $book->kategori->nama }}</span>
      <p class="text-xs font-semibold text-gray-800 leading-snug line-clamp-2 mb-1">{{ $book->judul ?? '-' }}</p>
      <p class="text-[11px] text-gray-400 mb-2">{{ $book->penulis ?? '-' }}</p>
      <div class="flex items-center justify-between">
        <span class="text-[11px] text-gray-400">{{ $book->tahun_terbit }}</span>
        <span class="text-[10px] font-semibold px-1.5 py-0.5 rounded bg-green-50 text-green-800">Stok {{ $book->stok }}</span>
      </div>
    </div>
  </div>
</a>
