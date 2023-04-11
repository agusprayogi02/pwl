<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
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


    public function create()
    {
        return view('matkul.form-matkul', ["title" => "Tambah Mata Kuliah", "url_form" => url('/matkul'),]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:75',
            'deskripsi' => 'required|max:225',
            'sks' => 'required|max:20|numeric',
            'semester' => 'required|max:8|numeric',
            'dosen' => 'required|max:50',
        ]);
        $kode = ['kode_matkul' => 'MT' . rand(100, 999)];
        Matkul::create(array_merge($request->except('_token'), $kode));
        return redirect('/matkul')->with('status', 'Data Mata Kuliah Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $matkul = Matkul::find($id);
        return view('matkul.form-matkul',  ["title" => "Edit Mata Kuliah", "url_form" => url('/matkul/' . $id), "matkul" => $matkul]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:75',
            'deskripsi' => 'required|max:225',
            'sks' => 'required|max:20|numeric',
            'semester' => 'required|max:8|numeric',
            'dosen' => 'required|max:50',
        ]);

        Matkul::where('kode_matkul', $id)->update($request->except(['_token', '_method']));
        return redirect('/matkul')->with('status', 'Data Mata Kuliah Berhasil DiUpdate!');
    }

    public function destroy($id)
    {
        Matkul::where('kode_matkul', $id)->delete();
        return redirect('/matkul')->with('status', 'Data Mata Kuliah Berhasil Dihapus!');
    }
}
