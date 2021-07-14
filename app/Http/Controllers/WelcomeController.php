<?php

namespace App\Http\Controllers;

use App\Model\Jurnal;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $jurnals = Jurnal::where('judul', 'LIKE', '%' . $request->search . '%')->orderBy('tahun_terbit', 'DESC')->paginate(8);
        } else {
            $jurnals = Jurnal::orderBy('tahun_terbit', 'DESC')->paginate(8);
        }
        return view('welcome', compact('jurnals'));
    }
}
