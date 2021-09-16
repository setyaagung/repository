<?php

namespace App\Http\Controllers;

use App\Model\Author;
use App\Model\Edisi;
use App\Model\Jurnal;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $countJurnal = Jurnal::count();
        $countAuthor = Author::count();
        $edisis = Edisi::orderBy('tema', 'ASC')->get();
        if ($request->has('search')) {
            $jurnals = Jurnal::where('judul', 'LIKE', '%' . $request->search . '%')->orderBy('tahun_terbit', 'DESC')->paginate(8);
        } else {
            $jurnals = Jurnal::orderBy('tahun_terbit', 'DESC')->paginate(8);
        }
        return view('welcome', compact('jurnals', 'countJurnal', 'countAuthor', 'edisis'));
    }
    public function detail($id, $tanggal)
    {
        $edisis = Edisi::orderBy('tema', 'ASC')->get();
        $jurnal = Jurnal::findOrFail($id);
        $tanggal = $jurnal->tanggal_terbit;
        return view('detail', \compact('jurnal', 'tanggal', 'edisis'));
    }

    public function edisi($id)
    {
        $edisi = Edisi::findOrFail($id);
        $jurnals = Jurnal::where('id_edisi', $edisi->id_edisi)->paginate(8);
        $edisis = Edisi::orderBy('tema', 'ASC')->get();
        return view('edisi', compact('edisi', 'jurnals', 'edisis'));
    }
}
