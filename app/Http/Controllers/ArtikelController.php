<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::all();
        return view('artikel.index', ['data' => $data, 'title' => "List Artikel"]);
    }
}
