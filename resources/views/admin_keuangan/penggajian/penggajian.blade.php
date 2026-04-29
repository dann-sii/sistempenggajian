@extends('layouts.app')

@section('title', 'Penggajian Karyawan')

@section('content')
    <div class="space-y-8">
        <!-- Page Header -->
        <div>
            <h1
                class="text-4xl font-black uppercase tracking-tighter text-carbon-black-900 border-l-8 border-hunter-green-500 pl-4 py-1">
                PENGGAJIAN KARYAWAN
            </h1>
        </div>

        <!-- Main Content: Side-by-side Layout -->
        <div class="flex gap-8">
            <!-- Left Column: Form Inputs -->
            <div class="w-[420px] flex flex-col gap-5 flex-shrink-0">
                <!-- Periode Bulan & Tahun -->
                <div class="grid grid-cols-2 gap-3">
                    <!-- Periode Bulan -->
                    <div class="relative">
                        <select
                            class="w-full appearance-none px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 cursor-pointer rounded shadow-sm">
                            <option value="" disabled selected>Periode Bulan</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-carbon-black-700">
                            <x-tabler-chevron-down class="h-4 w-4" />
                        </div>
                    </div>
                    <!-- Periode Tahun -->
                    <div class="relative">
                        <select
                            class="w-full appearance-none px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 cursor-pointer rounded shadow-sm">
                            <option value="" disabled selected>Periode Tahun</option>
                            <option>2025</option>
                            <option>2026</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-carbon-black-700">
                            <x-tabler-chevron-down class="h-4 w-4" />
                        </div>
                    </div>
                </div>
                <!-- Nama Karyawan -->
                <input type="text" placeholder="Nama Karyawan"
                    class="w-full px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 placeholder-carbon-black-900 rounded shadow-sm"
                    autocomplete="off">

                <!-- Jumlah Hari Kerja -->
                <input type="text" placeholder="Jumlah Hari Kerja"
                    class="w-full px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 placeholder-carbon-black-900 rounded shadow-sm"
                    autocomplete="off">

                <!-- Gaji Pokok -->
                <input type="text" placeholder="Gaji Pokok"
                    class="w-full px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 placeholder-carbon-black-900 rounded shadow-sm"
                    autocomplete="off">

                <!-- Lembur + Lamanya -->
                <div class="grid grid-cols-2 gap-3">
                    <div class="relative">
                        <select
                            class="w-full appearance-none px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 cursor-pointer rounded shadow-sm">
                            <option value="" disabled selected>Lembur</option>
                            <option>Ya</option>
                            <option>Tidak</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-carbon-black-700">
                            <x-tabler-chevron-down class="h-4 w-4" />
                        </div>
                    </div>
                    <input type="text" placeholder="Lamanya"
                        class="w-full px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 placeholder-carbon-black-900 rounded shadow-sm"
                        autocomplete="off">
                </div>

                <!-- Bonus -->
                <div class="relative">
                    <select
                        class="w-full appearance-none px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 cursor-pointer rounded shadow-sm">
                        <option value="" disabled selected>Bonus</option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-carbon-black-700">
                        <x-tabler-chevron-down class="h-4 w-4" />
                    </div>
                </div>

                <!-- Jenis Bonus + Pemakaian -->
                <div class="grid grid-cols-2 gap-3">
                    <div class="relative">
                        <select
                            class="w-full appearance-none px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 cursor-pointer rounded shadow-sm">
                            <option value="" disabled selected>Jenis Bonus</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-carbon-black-700">
                            <x-tabler-chevron-down class="h-4 w-4" />
                        </div>
                    </div>
                    <input type="text" placeholder="Pemakaian"
                        class="w-full px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 placeholder-carbon-black-900 rounded shadow-sm"
                        autocomplete="off">
                </div>

                <!-- Potongan -->
                <div class="relative">
                    <select
                        class="w-full appearance-none px-4 py-4 bg-carbon-black-300 border border-carbon-black-500 focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm font-black text-carbon-black-900 cursor-pointer rounded shadow-sm">
                        <option value="" disabled selected>Potongan</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-carbon-black-700">
                        <x-tabler-chevron-down class="h-4 w-4" />
                    </div>
                </div>
            </div>

            <!-- Right Column: Summary Box -->
            <div class="flex-1">
                <div
                    class="h-full bg-carbon-black-100 border border-carbon-black-400 rounded-md shadow-sm grid grid-rows-2">
                    <!-- Top Half -->
                    <div class="px-8 pt-8 md:px-10 md:pt-10">
                        <h3 class="text-[17px] font-black tracking-wide text-carbon-black-900">
                            TOTAL GAJI: <span id="total-gaji" class="font-semibold">-</span>
                        </h3>
                    </div>
                    <!-- Bottom Half -->
                    <div class="px-8 pt-8 md:px-10 md:pt-10">
                        <h3 class="text-[17px] font-black tracking-wide text-carbon-black-900">
                            TOTAL GAJI BERSIH: <span id="total-gaji-bersih" class="font-semibold">-</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bayar Gaji Button (Aligned Right) -->
        <div class="flex justify-end pt-4">
            <button
                class="bg-black-forest-700 text-white px-8 h-[42px] text-sm font-bold rounded-lg shadow-md hover:bg-black-forest-800 transition-all duration-200 active:scale-95 uppercase tracking-widest">
                PROSES
            </button>
        </div>
    </div>
@endsection