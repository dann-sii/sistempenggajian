<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        return view('admin_keuangan.penggajian.penggajian');
    }
}
