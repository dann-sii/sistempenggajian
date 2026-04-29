<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PotonganGajiController extends Controller
{
    public function index(Request $request)
    {
        $allPotongan = [
            ['id' => 1, 'nama' => 'Potongan BPJS Kesehatan', 'tarif' => 50000.00, 'tipe_potongan' => 'Tetap', 'status' => 'Aktif'],
            ['id' => 2, 'nama' => 'Potongan BPJS Ketenagakerjaan', 'tarif' => 30000.00, 'tipe_potongan' => 'Tetap', 'status' => 'Aktif'],
            ['id' => 3, 'nama' => 'Denda Keterlambatan', 'tarif' => 15000.00, 'tipe_potongan' => 'Kondisional', 'status' => 'Aktif'],
        ];

        $search = $request->query('search');
        if ($search) {
            $allPotongan = array_values(array_filter($allPotongan, function($p) use ($search) {
                return stripos((string) $p['nama'], $search) !== false;
            }));
        }

        return view('admin_keuangan.potongan_gaji.potongan_gaji', compact('allPotongan', 'search'));
    }
}
