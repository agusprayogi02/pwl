<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($nama = '')
    {
        return view('profile', ['title' => 'Profile', 'nama' => $nama]);
    }
}
