<?php

namespace App\Http\Controllers;

use App\Model\Edisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edisis = Edisi::orderBy('nama_edisi', 'ASC')->get();
        return view('backend.edisi.index', \compact('edisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.edisi.create');
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
            'nama_edisi' => 'required|string|unique:edisis',
            'issn' => 'required',
            'tahun_terbit' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_extension = $gambar->getClientOriginalExtension();
            $gambarname = time() . '.' . $gambar_extension;
            $data['gambar'] = Storage::putFileAs('public/file/gambar', $request->file('gambar'), $gambarname);
        }
        Edisi::create($data);
        return redirect()->route('edisi.index')->with('create', 'Data edisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edisi = Edisi::findOrFail($id);
        return view('backend.edisi.edit', \compact('edisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edisi = Edisi::findOrFail($id);
        $request->validate([
            'nama_edisi' => 'required|string|unique:edisis,nama_edisi,' . $id . ',id_edisi',
            'issn' => 'required',
            'tahun_terbit' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            Storage::delete($edisi->gambar);
            $gambar = $request->file('gambar');
            $gambar_extension = $gambar->getClientOriginalExtension();
            $gambarname = time() . '.' . $gambar_extension;
            $data['gambar'] = Storage::putFileAs('public/file/gambar', $request->file('gambar'), $gambarname);
        }
        $edisi->update($data);
        return redirect()->route('edisi.index')->with('update', 'Data edisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edisi = Edisi::findOrFail($id);
        $edisi->delete();
        return redirect()->route('edisi.index')->with('delete', 'Data edisi berhasil dihapus');
    }
}
