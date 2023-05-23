<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MahasiswaMataKuliah;
use App\Models\Matkul;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class   MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::paginate(3);
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|dimensions:max_width=100,max_height=100',
            'jk' => 'required|size:1|in:L,P',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'id_prodi' => 'required',
            'kelas_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $photo = $request->file('image')->store('photos', 'public');
            $request->merge([
                'photo' => $photo
            ]);
        }

        Mahasiswa::create($request->except('_token', 'image'));
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
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|dimensions:max_width=100,max_height=100',
            'jk' => 'required|size:1|in:L,P',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'id_prodi' => 'required',
            'kelas_id' => 'required',
        ]);

        $mhs = Mahasiswa::where('id', $id)->first();
        if ($request->hasFile('image')) {
            if ($mhs->photo && Storage::exists('public/' . $mhs->photo)) {
                Storage::delete('public/' . $mhs->photo);
            }
            $photo = $request->file('image')->store('photos', 'public');
            $request->merge([
                'photo' => $photo
            ]);
        }

        $mhs->update($request->except('_token', '_method', 'image'));
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

    public function nilai($nim)
    {
        $mhs = Mahasiswa::with('prodi', 'kelas')->where('nim', $nim)->first();
        $nilai = MahasiswaMataKuliah::with('matkul')->where('mahasiswa_id', $mhs->id)->get();
        return view('mahasiswa.nilai', ['mhs' => $mhs, "title" => "Nilai Mahasiswa", 'nilai' => $nilai, 'cetak' => false]);
    }

    public function show_nilai($nim)
    {
        $mhs = Mahasiswa::with('prodi', 'kelas')->where('nim', $nim)->first();
        $matkul = Matkul::all();
        return view('mahasiswa.form-nilai', ['mhs' => $mhs, "matkul" => $matkul, "title" => "Tambah Nilai Mahasiswa"]);
    }

    public function create_nilai(Request $request, $nim)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nilai' => 'required|string|min:1|max:2',
        ]);

        $mhs = Mahasiswa::where('nim', $nim)->first();
        $mhs = MahasiswaMataKuliah::create([
            'mahasiswa_id' => $mhs->id,
            'kode_matkul' => $request->kode_matkul,
            'nilai' => $request->nilai,
        ]);
        return redirect('/mahasiswa')->with('status', 'Data Nilai Mahasiswa Berhasil Ditambahkan!');
    }

    public function cetak_pdf($nim)
    {
        $mhs = Mahasiswa::with('prodi', 'kelas')->where('nim', $nim)->first();
        $nilai = MahasiswaMataKuliah::with('matkul')->where('mahasiswa_id', $mhs->id)->get();
        $pdf = PDF::loadview('mahasiswa.nilai', ['mhs' => $mhs, 'nilai' => $nilai, 'cetak' => true]);
        return $pdf->stream();
    }
}
