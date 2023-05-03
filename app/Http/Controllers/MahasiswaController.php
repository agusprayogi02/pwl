<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::all();
        return view('mahasiswa.mahasiswa', ['mhs' => $mhs, "title" => "Mahasiswa"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis = Prodi::all();
        $kelas = Kelas::all();
        return view('mahasiswa.form-mahasiswa', ["title" => "Tambah Mahasiswa", "url_form" => url('/mahasiswa'), 'prodis' => $prodis, 'kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|size:10|unique:mahasiswas,nim',
            'nama' => 'required|max:50',
            'jk' => 'required|size:1|in:L,P',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'id_prodi' => 'required',
            'kelas_id' => 'required',
        ]);

        Mahasiswa::create($request->except('_token'));
        return redirect('/mahasiswa')->with('status', 'Data Mahasiswa Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('prodi', 'kelas')->find($id);
        return view('mahasiswa.detail', ['mhs' => $mahasiswa, 'title' => 'Detail Mahasiswa']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        $prodis = Prodi::all();
        $kelas = Kelas::all();
        return view('mahasiswa.form-mahasiswa', ["title" => "Edit Mahasiswa", "url_form" => url('/mahasiswa/' . $id), "mhs" => $mhs, 'prodis' => $prodis, 'kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|size:10|unique:mahasiswas,nim,' . $id,
            'nama' => 'required|max:50',
            'jk' => 'required|size:1|in:L,P',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'id_prodi' => 'required',
            'kelas_id' => 'required',
        ]);

        Mahasiswa::where('id', $id)->update($request->except('_token', '_method'));
        return redirect('/mahasiswa')->with('status', 'Data Mahasiswa Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('id', $id)->delete();
        return redirect('/mahasiswa')->with('status', 'Data Mahasiswa Berhasil Dihapus!');
    }
}
