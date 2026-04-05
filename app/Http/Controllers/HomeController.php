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

        $books = Buku::when($search, function ($query, $search) {
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('penulis', 'like', "%{$search}%")
                ->orWhere('penerbit', 'like', "%{$search}%");
        })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();



        return view('index', compact('books',));
    }

    public function showCategory(Kategori $kategori)
    {
        $books = $kategori->buku;

        return view('index', compact('books'));
    }
}
