<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        echo 'Selamat Datang';
    }

    public function about()
    {
        echo 'NIM : 2141720025 <br> Nama : Agus Prayogi';
    }

    public function articles($id)
    {
        echo 'Halaman artikel dengan ID ' . $id;
    }
}
