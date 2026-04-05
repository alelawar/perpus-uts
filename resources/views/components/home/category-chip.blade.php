@props([
  'type' => 'search', // 'search' | 'kategori'
  'label' => '',
  'kategori' => null, // object kategori (untuk type='kategori')
])

@php
  $search = request('search');

  if ($type === 'search') {
    $isActive = !empty($search);
    $label = $search ?? '';
    $href = route('home');
  } else {
    $currentKategori = request()->route('kategori');
    $isActive = $currentKategori && $currentKategori->slug === $kategori->slug;
    $label = $kategori->nama;
    $href = $isActive
      ? route('home') 
      : route('show-category', $kategori);
  }
@endphp

@if ($label)
  <a 
    href="{{ $href }}" 
    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium border transition
    {{ $isActive
      ? 'bg-blue-100 border-blue-300 text-blue-800'
      : 'bg-gray-50 border-gray-200 text-gray-600 hover:bg-gray-100' }}"
  >
    {{ $label }}
    @if($isActive)
      <span class="text-xs">✕</span>
    @endif
  </a>
@endif