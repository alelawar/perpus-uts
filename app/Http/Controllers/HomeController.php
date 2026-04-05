<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $search = request('search');
        $tahun  = request('tahun');
        $stok   = request('stok');

        $books = Buku::when($search, function ($query, $search) {
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('penulis', 'like', "%{$search}%")
                ->orWhere('penerbit', 'like', "%{$search}%");
        })
            ->when($tahun, function ($query, $tahun) {
                $query->whereYear('tahun_terbit', $tahun);
            })
            ->when($stok, function ($query, $stok) {
                if ($stok === 'tersedia') {
                    $query->where('stok', '>', 0);
                } elseif ($stok === 'habis') {
                    $query->where('stok', '<=', 0);
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $kategoris = Kategori::all();

        // Ambil daftar tahun unik buat opsi dropdown
        $tahunList = Buku::selectRaw('YEAR(tahun_terbit) as tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');

        return view('index', compact('books', 'kategoris', 'tahunList'));
    }

    public function showCategory(Kategori $kategori)
    {
        $books = $kategori->buku;

        return view('index', compact('books'));
    }
}
