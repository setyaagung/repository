<?php

namespace App\Http\Controllers;

use App\Model\Author;
use App\Model\Jurnal;
use App\Model\JurnalAuthor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnals = Jurnal::orderBy('tahun_terbit', 'DESC')->get();
        return view('backend.jurnal.index', compact('jurnals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('backend.jurnal.create', compact('authors'));
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
            'judul' => 'required',
            'abstrak' => 'required',
            'kata_kunci' => 'required',
            'tahun_terbit' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/file/jurnal', $request->file('file'), $filename);
        }
        $jurnal = Jurnal::create($data);
        foreach (request()->id_author as $key => $value) {
            JurnalAuthor::create([
                'id_jurnal' => $jurnal->id_jurnal,
                'id_author' => request()->id_author[$key]
            ]);
        }
        return redirect()->route('jurnal.index')->with('create', 'Data jurnal berhasil ditambahkan');
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
        $jurnal = Jurnal::findOrFail($id);
        return view('backend.jurnal.edit', compact('jurnal'));
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
        $jurnal = Jurnal::findOrFail($id);
        $request->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'kata_kunci' => 'required',
            'tahun_terbit' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('file')) {
            Storage::delete($jurnal->file);
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/file/jurnal', $request->file('file'), $filename);
        }
        $jurnal->update($data);
        return redirect()->route('jurnal.index')->with('update', 'Data jurnal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        $jurnal->delete();
        Storage::delete($jurnal->file);
        return redirect()->route('jurnal.index')->with('delete', 'Data jurnal berhasil dihapus');
    }
}
