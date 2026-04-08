@extends('layouts.app')

@section('title', 'Data Presensi')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="space-y-6">
        <h1 class="text-4xl font-black uppercase tracking-tighter text-carbon-black-900 border-l-8 border-hunter-green-500 pl-4 py-1">
            DATA PRESENSI
        </h1>
        
        <div class="flex justify-between items-end">
            <div class="flex items-end space-x-6">
                <!-- Search Name -->
                <div class="flex shadow-sm rounded-lg overflow-hidden border-2 border-carbon-black-200 focus-within:border-hunter-green-400 transition-colors bg-white">
                    <input type="text" id="search" placeholder="Cari nama karyawan..." class="w-72 px-4 py-2 focus:outline-none text-carbon-black-800 placeholder-carbon-black-300 text-base font-medium">
                    <button class="bg-carbon-black-50 px-4 py-2 border-l border-carbon-black-200 text-carbon-black-400 hover:text-hunter-green-600 hover:bg-hunter-green-50 transition-colors">
                        <x-tabler-search class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <button class="bg-black-forest-700 text-white px-6 h-[42px] text-sm font-bold rounded-lg shadow-md hover:bg-black-forest-800 transition-all duration-200 flex items-center space-x-2 active:scale-95 group uppercase tracking-widest mb-0.5">
                <x-tabler-plus class="w-5 h-5" stroke-width="3" />
                <span>Tambah</span>
            </button>
        </div>
    </div>

    <!-- Data Table Container -->
    <div class="bg-white rounded-none shadow-xl border border-carbon-black-200 overflow-hidden relative">
        <table class="w-full border-collapse">
            <thead class="bg-carbon-black-50 border-b border-carbon-black-200 text-carbon-black-600">
                <tr>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center w-20">NO</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">NAMA</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">TANGGAL</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">JAM MASUK</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">JAM KELUAR</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">KEHADIRAN</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">JAM LEMBUR</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">AKSI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-carbon-black-100">
                @foreach($presensi as $p)
                    <tr class="hover:bg-hunter-green-50 transition-colors duration-150 group">
                        <td class="px-6 py-5 text-center text-base font-bold text-hunter-green-700 bg-carbon-black-50/50 w-20">{{ $p['id'] }}</td>
                        <td class="px-6 py-5 text-justify text-base font-semibold text-carbon-black-900 group-hover:text-black-forest-700">{{ $p['nama'] }}</td>
                        <td class="px-6 py-5 text-center text-base font-semibold text-carbon-black-800">{{ date('d M Y', strtotime($p['tanggal'])) }}</td>
                        <td class="px-6 py-5 text-center text-base font-semibold text-carbon-black-800">{{ $p['jam_masuk'] }}</td>
                        <td class="px-6 py-5 text-center text-base font-semibold text-carbon-black-800">{{ $p['jam_keluar'] }}</td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center space-x-2.5">
                                @php
                                    $options = [
                                        'Hadir' => ['label' => 'H', 'accent' => 'accent-emerald-600'],
                                        'Izin' => ['label' => 'I', 'accent' => 'accent-amber-500'],
                                        'Sakit' => ['label' => 'S', 'accent' => 'accent-blue-500'],
                                        'Cuti' => ['label' => 'C', 'accent' => 'accent-purple-500'],
                                        'Alpha' => ['label' => 'A', 'accent' => 'accent-rose-600'],
                                    ];
                                    $currentStatus = $p['kehadiran'] === 'Alfa' ? 'Alpha' : $p['kehadiran'];
                                @endphp
                                @foreach($options as $val => $opt)
                                    <label class="flex items-center space-x-1 cursor-pointer group/radio" title="{{ $val }}">
                                        <input type="radio" name="kehadiran_{{ $p['id'] }}" value="{{ $val }}" 
                                            class="w-4 h-4 {{ $opt['accent'] }} cursor-pointer" 
                                            {{ $currentStatus === $val ? 'checked' : '' }} onclick="return false;">
                                        <span class="text-xs font-black text-carbon-black-500 group-hover/radio:text-carbon-black-900 transition-colors">{{ $opt['label'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-5 text-center text-base font-semibold text-carbon-black-800">{{ $p['jam_lembur'] }} Jam</td>
                        <td class="px-6 py-5 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="flex items-center space-x-1.5 px-3 py-1.5 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-all shadow-sm group/btn text-xs font-bold uppercase tracking-wider border border-amber-200" title="Lihat">
                                    <x-tabler-eye class="w-4 h-4" />
                                    <span>Detail</span>
                                </button>
                                <button class="flex items-center space-x-1.5 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-all shadow-sm group/btn text-xs font-bold uppercase tracking-wider border border-blue-200" title="Edit">
                                    <x-tabler-pencil class="w-4 h-4" />
                                    <span>Ubah</span>
                                </button>
                                <button class="flex items-center space-x-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-all shadow-sm group/btn text-xs font-bold uppercase tracking-wider border border-red-200" title="Hapus">
                                    <x-tabler-trash class="w-4 h-4" />
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination/Footer -->
        <div class="bg-carbon-black-50 border-t border-carbon-black-100 px-6 py-4 flex items-center justify-between">
            <nav role="navigation" aria-label="pagination" class="mx-auto flex w-full justify-center md:w-auto">
                <ul class="flex flex-row items-center gap-1">
                    <li>
                        <a href="{{ $page > 1 ? '?page='.($page-1) : '#' }}" class="inline-flex items-center justify-center rounded-md border border-carbon-black-200 bg-white px-3 py-2 text-sm font-medium text-carbon-black-700 shadow-sm hover:bg-carbon-black-50 transition-all space-x-2 {{ $page <= 1 ? 'opacity-50 pointer-events-none' : '' }}">
                            <x-tabler-chevron-left class="h-4 w-4" />
                            <span>Sebelumnya</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=1" class="inline-flex h-9 w-9 items-center justify-center rounded-md border text-sm font-medium shadow-sm transition-all {{ $page == 1 ? 'bg-hunter-green-600 text-white shadow-hunter-green-200 border-hunter-green-600' : 'border-carbon-black-200 bg-white text-carbon-black-700 hover:bg-carbon-black-50' }}">1</a>
                    </li>
                    <li>
                        <a href="?page=2" class="inline-flex h-9 w-9 items-center justify-center rounded-md border text-sm font-medium shadow-sm transition-all {{ $page == 2 ? 'bg-hunter-green-600 text-white shadow-hunter-green-200 border-hunter-green-600' : 'border-carbon-black-200 bg-white text-carbon-black-700 hover:bg-carbon-black-50' }}">2</a>
                    </li>
                    <li>
                        <span aria-hidden="true" class="flex h-9 w-9 items-center justify-center">
                            <x-tabler-dots class="h-4 w-4 text-carbon-black-400" />
                        </span>
                    </li>
                    <li>
                        <a href="{{ $page < 2 ? '?page='.($page+1) : '#' }}" class="inline-flex items-center justify-center rounded-md border border-carbon-black-200 bg-white px-3 py-2 text-sm font-medium text-carbon-black-700 shadow-sm hover:bg-carbon-black-50 transition-all space-x-2 {{ $page >= 2 ? 'opacity-50 pointer-events-none' : '' }}">
                            <span>Berikutnya</span>
                            <x-tabler-chevron-right class="h-4 w-4" />
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
