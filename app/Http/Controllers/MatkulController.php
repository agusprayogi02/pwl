<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Mata Kuliah',
            'matkuls' => \App\Models\Matkul::all()
        ];
        return view('matkul.index', $data);
    }
}
