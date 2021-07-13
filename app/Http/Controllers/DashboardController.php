<?php

namespace App\Http\Controllers;

use App\Model\Author;
use App\Model\Jurnal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $author = Author::count();
        $jurnal = Jurnal::count();
        return view('backend.dashboard', compact('author', 'jurnal'));
    }
}
