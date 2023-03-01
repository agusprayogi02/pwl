<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuliahController extends Controller
{
    public function index()
    {
        return view('kuliah', ['title' => 'Pengalaman Kuliah']);
    }
}
