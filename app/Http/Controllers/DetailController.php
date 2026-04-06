<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show(Buku $buku)
    {
        $book = $buku;
        return view('detail', compact('book'));
    }
}
