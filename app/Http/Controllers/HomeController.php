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
        $penulis   = request('penulis');

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
            ->when($penulis, function ($query, $penulis) {
                $query->where('penulis', $penulis); // ⬅️ ini inti nya
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $kategoris = Kategori::all();

        $penulisList = Buku::select('penulis')
            ->distinct()
            ->orderBy('penulis')
            ->pluck('penulis');

        return view('index', compact('books', 'kategoris', 'penulisList',));
    }

    public function showCategory(Kategori $kategori)
    {
        $books = $kategori->buku()->paginate(10);

        return view('index', compact('books'));
    }
}
