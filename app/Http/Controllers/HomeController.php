<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $books = Buku::orderBy('id', 'desc')->paginate(10);

        return view('index', compact('books'));
    }
}
