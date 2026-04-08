<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index(Request $request)
    {
        // Mock data for attendance based on wireframe columns
        $allPresensi = [
            ['id' => 1, 'nama' => 'Budi Santoso', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:00', 'jam_keluar' => '16:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 2, 'nama' => 'Siti Aminah', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:15', 'jam_keluar' => '16:15', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 3, 'nama' => 'Andi Wijaya', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:00', 'jam_keluar' => '16:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 4, 'nama' => 'Dewi Lestari', 'tanggal' => '2026-03-01', 'jam_masuk' => '00:00', 'jam_keluar' => '00:00', 'kehadiran' => 'Izin', 'jam_lembur' => '0'],
            ['id' => 5, 'nama' => 'Rizky Pratama', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:05', 'jam_keluar' => '16:05', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 6, 'nama' => 'Anita Sari', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:00', 'jam_keluar' => '16:30', 'kehadiran' => 'Hadir', 'jam_lembur' => '0.5'],
            ['id' => 7, 'nama' => 'Bambang Subianto', 'tanggal' => '2026-03-01', 'jam_masuk' => '00:00', 'jam_keluar' => '00:00', 'kehadiran' => 'Sakit', 'jam_lembur' => '0'],
            ['id' => 8, 'nama' => 'Eka Putri', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:10', 'jam_keluar' => '16:10', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 9, 'nama' => 'Faisal Rahman', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:00', 'jam_keluar' => '20:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '4'],
            ['id' => 10, 'nama' => 'Gita Permata', 'tanggal' => '2026-03-01', 'jam_masuk' => '08:00', 'jam_keluar' => '16:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 11, 'nama' => 'Hendra Wijaya', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:00', 'jam_keluar' => '16:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 12, 'nama' => 'Indah Kusuma', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:15', 'jam_keluar' => '16:15', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 13, 'nama' => 'Joko Susilo', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:00', 'jam_keluar' => '16:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 14, 'nama' => 'Kartini Putri', 'tanggal' => '2026-03-02', 'jam_masuk' => '00:00', 'jam_keluar' => '00:00', 'kehadiran' => 'Izin', 'jam_lembur' => '0'],
            ['id' => 15, 'nama' => 'Lukman Hakim', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:05', 'jam_keluar' => '16:05', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
            ['id' => 16, 'nama' => 'Maya Sari', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:00', 'jam_keluar' => '16:30', 'kehadiran' => 'Hadir', 'jam_lembur' => '0.5'],
            ['id' => 17, 'nama' => 'Nugroho Saputra', 'tanggal' => '2026-03-02', 'jam_masuk' => '00:00', 'jam_keluar' => '00:00', 'kehadiran' => 'Sakit', 'jam_lembur' => '0'],
            ['id' => 18, 'nama' => 'Oki Setiana', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:10', 'jam_keluar' => '16:40', 'kehadiran' => 'Hadir', 'jam_lembur' => '0.5'],
            ['id' => 19, 'nama' => 'Puji Astuti', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:00', 'jam_keluar' => '20:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '4'],
            ['id' => 20, 'nama' => 'Qomarudin', 'tanggal' => '2026-03-02', 'jam_masuk' => '08:00', 'jam_keluar' => '16:00', 'kehadiran' => 'Hadir', 'jam_lembur' => '0'],
        ];

        $page = (int) $request->get('page', 1);
        $perPage = 10;
        $presensi = array_slice($allPresensi, ($page - 1) * $perPage, $perPage);

        return view('presensi.index', compact('presensi', 'page'));
    }
}
