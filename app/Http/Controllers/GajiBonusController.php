<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GajiBonusController extends Controller
{
    public function index(Request $request)
    {
        $gajiBonus = [
            ['id' => 1, 'batas_normal' => 25, 'satuan' => 'Hari', 'nama' => 'Bonus Kehadiran Full', 'tarif' => 500000.00, 'status' => 'Aktif', 'keterangan' => 'Diberikan jika hadir penuh sebulan'],
        ];

        return view('admin_keuangan.gaji_bonus.gaji_bonus', compact('gajiBonus'));
    }
}
