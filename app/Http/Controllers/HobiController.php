<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Hobi',
            'hobbies' => Hobi::all()
        ];
        return view('hobi.index', $data);
    }

    public function create()
    {
        return view('hobi.form-hobi', ["title" => "Tambah Hobi", "url_form" => url('/hobi'),]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:75',
            'deskripsi' => 'required|max:255',
        ]);

        Hobi::create($request->except('_token'));
        return redirect('/hobi')->with('status', 'Data Hobi Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $hobs = Hobi::find($id);
        return view('hobi.form-hobi', ["title" => "Edit Hobi", "url_form" => url('/hobi/' . $id), "hobs" => $hobs]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:75',
            'deskripsi' => 'required|max:255',
        ]);

        Hobi::where('id_hobi', $id)->update($request->except('_token', '_method'));
        return redirect('/hobi')->with('status', 'Data Hobi Berhasil DiUpdate!');
    }

    public function destroy($id)
    {
        Hobi::where('id_hobi', $id)->delete();
        return redirect('/hobi')->with('status', 'Data Hobi Berhasil Dihapus!');
    }
}
