<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        echo 'Selamat Datang Di Website Saya';
    }

    public function news($news = null)
    {
        echo 'Halaman News ' . $news;
    }
}
