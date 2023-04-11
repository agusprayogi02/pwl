<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Family',
            'families' => \App\Models\Family::all()
        ];
        return view('family.index', $data);
    }

    public function create()
    {
        return view('family.form-family', ["title" => "Tambah Keluarga", "url_form" => url('/keluarga'),]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:75',
            'alamat' => 'required|max:225',
            'phone' => 'required|max:20',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required|max:10',
            'agama' => 'required|max:10',
            'pekerjaan' => 'required|max:50',
            'pendidikan' => 'required|max:10',
            'jenis_kelamin' => 'required|max:1',
        ]);

        Family::create($request->except('_token'));
        return redirect('/keluarga')->with('status', 'Data Keluarga Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $family = Family::find($id);
        return view('family.form-family',  ["title" => "Edit Keluarga", "url_form" => url('/keluarga/' . $id), "family" => $family]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:75',
            'alamat' => 'required|max:225',
            'phone' => 'required|max:20',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required|max:10',
            'agama' => 'required|max:10',
            'pekerjaan' => 'required|max:50',
            'pendidikan' => 'required|max:10',
            'jenis_kelamin' => 'required|max:1',
        ]);

        Family::where('id_family', $id)->update($request->except(['_token', '_method']));
        return redirect('/keluarga')->with('status', 'Data Keluarga Berhasil DiUpdate!');
    }

    public function destroy($id)
    {
        Family::where('id_family', $id)->delete();
        return redirect('/keluarga')->with('status', 'Data Keluarga Berhasil Dihapus!');
    }
}
