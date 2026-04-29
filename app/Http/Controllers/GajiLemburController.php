<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GajiLemburController extends Controller
{
    public function index(Request $request)
    {
        // Mock data for Gaji Lembur rules
        $gajiLembur = [
            ['id' => 1, 'nama' => 'Gaji Lembur per Jam', 'tarif' => 20000.00, 'keterangan' => 'Tarif standar lembur per jam', 'status' => 'Aktif'],
        ];

        return view('admin_keuangan.gaji_lembur.gaji_lembur', compact('gajiLembur'));
    }
}
