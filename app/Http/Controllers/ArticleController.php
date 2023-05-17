<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all();
        return view('artikel.index', ['data' => $data, 'title' => "List Artikel"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create', ['title' => "Tambah Artikel"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }
        Artikel::create([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'gambar' => $image_name,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
        ]);
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('artikel.edit', ['article' => Artikel::where('id_artikel', $id)->first(), 'title' => "Edit Artikel"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $artikel = Artikel::where('id_artikel', $id)->first();
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && file_exists(storage_path('app/public/' . $artikel->gambar))) {
                Storage::delete('public/' . $artikel->gambar);
            }
            $image_name = $request->file('gambar')->store('images', 'public');
        }

        Artikel::where('id_artikel', $id)->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'gambar' => $image_name ?? $artikel->gambar,
        ]);
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Artikel::where('id_artikel', $id)->delete();
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus');
    }

    public function cetak_pdf()
    {
        $articles = Artikel::all();
        $pdf = PDF::loadView('artikel.articles_pdf', ['articles' => $articles]);
        return $pdf->stream();
    }
}
