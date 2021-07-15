<?php

namespace App\Http\Controllers;

use App\Model\Author;
use App\Model\Jurnal;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $countJurnal = Jurnal::count();
        $countAuthor = Author::count();
        if ($request->has('search')) {
            $jurnals = Jurnal::where('judul', 'LIKE', '%' . $request->search . '%')->orderBy('tahun_terbit', 'DESC')->paginate(8);
        } else {
            $jurnals = Jurnal::orderBy('tahun_terbit', 'DESC')->paginate(8);
        }
        return view('welcome', compact('jurnals', 'countJurnal', 'countAuthor'));
    }
    public function detail($id, $tanggal)
    {
        $countJurnal = Jurnal::count();
        $countAuthor = Author::count();
        $jurnal = Jurnal::findOrFail($id);
        $tanggal = $jurnal->tanggal_terbit;
        return view('detail', \compact('jurnal', 'tanggal', 'countAuthor', 'countJurnal'));
    }
}
