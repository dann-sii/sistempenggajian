@extends('layouts.app')

@section('title', 'Data Karyawan')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="space-y-6">
        <h1 class="text-4xl font-black uppercase tracking-tighter text-carbon-black-900 border-l-8 border-hunter-green-500 pl-4 py-1">
            DATA KARYAWAN
        </h1>
        
        <div class="flex justify-between items-end">
            <div class="flex items-end space-x-6">
                <!-- Status Filter -->
                <div class="relative min-w-48 shadow-sm rounded-lg border-2 border-carbon-black-200 focus-within:border-hunter-green-400 transition-colors bg-white overflow-hidden flex items-center">
                    <div class="pl-3 text-carbon-black-400">
                        <x-tabler-filter class="h-4 w-4" />
                    </div>
                    <select id="status-filter" class="w-full appearance-none bg-transparent pl-2 pr-10 py-2 text-carbon-black-300 font-bold uppercase tracking-wide text-xs cursor-pointer focus:outline-none">
                        <option value="">Status</option>
                        <option value="aktif" {{ request('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="inaktif" {{ request('status') === 'inaktif' ? 'selected' : '' }}>Inaktif</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-carbon-black-400 border-l border-carbon-black-100 ml-2">
                        <x-tabler-chevron-down class="h-4 w-4" />
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="flex shadow-sm rounded-lg overflow-hidden border-2 border-carbon-black-200 focus-within:border-hunter-green-400 transition-colors bg-white">
                    <input type="text" id="search" value="{{ request('search') }}" placeholder="Cari nama karyawan..." class="w-72 px-4 py-2 focus:outline-none text-carbon-black-800 placeholder-carbon-black-300 text-base font-medium" autocomplete="off">
                    <button id="search-btn" class="bg-carbon-black-50 px-4 py-2 border-l border-carbon-black-200 text-carbon-black-400 hover:text-hunter-green-600 hover:bg-hunter-green-50 transition-colors">
                        <x-tabler-search class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <button onclick="openModal()" class="bg-black-forest-700 text-white px-6 h-[42px] text-sm font-bold rounded-lg shadow-md hover:bg-black-forest-800 transition-all duration-200 flex items-center space-x-2 active:scale-95 group uppercase tracking-widest mb-0.5">
                <x-tabler-plus class="w-5 h-5" stroke-width="3" />
                <span>Tambah</span>
            </button>
        </div>
    </div>
    
    @if(session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <x-tabler-check class="h-5 w-5 text-emerald-500" />
                </div>
                <div class="ml-3">
                    <p class="text-sm font-bold text-emerald-800">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Data Table Container -->
    <div class="bg-white rounded-none shadow-xl border border-carbon-black-200 overflow-hidden relative">
        <table class="w-full border-collapse">
            <thead class="bg-carbon-black-50 border-b border-carbon-black-200 text-carbon-black-600">
                <tr>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center w-20">NO</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">NIK</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">NAMA</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">NPWP</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">ALAMAT</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">NO. TELP</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">STATUS</th>
                    <th class="px-6 py-4 text-sm font-black uppercase tracking-wider text-center">AKSI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-carbon-black-100">
                @foreach($karyawan as $k)
                    <tr class="hover:bg-hunter-green-50 transition-colors duration-150 group">
                        <td class="px-6 py-5 text-center text-base font-bold text-hunter-green-700 bg-carbon-black-50/50 w-20">{{ $k['id'] }}</td>
                        <td class="px-6 py-5 text-center text-base font-semibold text-carbon-black-800">{{ $k['nik'] }}</td>
                        <td class="px-6 py-5 text-justify text-base font-semibold text-carbon-black-900 group-hover:text-black-forest-700">{{ $k['nama'] }}</td>
                        <td class="px-6 py-5 text-center text-base font-semibold text-carbon-black-800">{{ $k['npwp'] }}</td>
                        <td class="px-6 py-5 text-justify text-base font-semibold text-carbon-black-800 max-w-xs truncate">{{ $k['alamat'] }}</td>
                        <td class="px-6 py-5 text-center text-base font-semibold text-carbon-black-800">{{ $k['no_telp'] }}</td>
                        <td class="px-6 py-5 text-center text-base">
                            @php
                                $statusColor = match($k['status']) {
                                    'Aktif' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    'Inaktif' => 'bg-rose-50 text-rose-700 border-rose-200',
                                    default => 'bg-gray-50 text-gray-700 border-gray-200',
                                };
                            @endphp
                            <span class="inline-flex px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border shadow-sm {{ $statusColor }}">
                                {{ $k['status'] }}
                            </span>
                        </td>
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
                        <a href="{{ $page > 1 ? request()->fullUrlWithQuery(['page' => $page-1]) : '#' }}" class="inline-flex items-center justify-center rounded-md border border-carbon-black-200 bg-white px-3 py-2 text-sm font-medium text-carbon-black-700 shadow-sm hover:bg-carbon-black-50 transition-all space-x-2 {{ $page <= 1 ? 'opacity-50 pointer-events-none' : '' }}">
                            <x-tabler-chevron-left class="h-4 w-4" />
                            <span>Sebelumnya</span>
                        </a>
                    </li>
                    @for($i = 1; $i <= $totalPages; $i++)
                        <li>
                            <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-md border text-sm font-medium shadow-sm transition-all {{ $page == $i ? 'bg-hunter-green-600 text-white shadow-hunter-green-200 border-hunter-green-600' : 'border-carbon-black-200 bg-white text-carbon-black-700 hover:bg-carbon-black-50' }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li>
                        <a href="{{ $page < $totalPages ? request()->fullUrlWithQuery(['page' => $page+1]) : '#' }}" class="inline-flex items-center justify-center rounded-md border border-carbon-black-200 bg-white px-3 py-2 text-sm font-medium text-carbon-black-700 shadow-sm hover:bg-carbon-black-50 transition-all space-x-2 {{ $page >= $totalPages ? 'opacity-50 pointer-events-none' : '' }}">
                            <span>Berikutnya</span>
                            <x-tabler-chevron-right class="h-4 w-4" />
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal Tambah Data Karyawan -->
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-carbon-black-900/50 backdrop-blur-sm transition-opacity opacity-0">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full mx-4 transform scale-95 transition-transform duration-300">
        <div class="px-6 py-5 border-b border-carbon-black-100 flex justify-between items-center">
            <h3 class="text-xl font-black uppercase tracking-wide text-carbon-black-900">Tambah Data Karyawan</h3>
            <button type="button" class="text-carbon-black-400 hover:text-rose-600 transition-colors" onclick="closeModal()">
                <x-tabler-x class="w-6 h-6" />
            </button>
        </div>
        
        <form action="{{ route('karyawan.store') }}" method="POST" id="form-tambah">
            @csrf
            <div class="px-6 py-6 space-y-5">
                <div class="grid grid-cols-2 gap-5">
                    <!-- NIK -->
                    <div class="space-y-1.5">
                        <label for="nik" class="text-xs font-bold uppercase tracking-widest text-carbon-black-600">NIK <span class="text-rose-500">*</span></label>
                        <input type="number" id="nik" name="nik" required class="w-full px-3 py-2.5 border border-carbon-black-200 rounded-lg focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm text-carbon-black-800 bg-carbon-black-50/50">
                    </div>
                    <!-- NAMA -->
                    <div class="space-y-1.5">
                        <label for="nama" class="text-xs font-bold uppercase tracking-widest text-carbon-black-600">Nama Lengkap <span class="text-rose-500">*</span></label>
                        <input type="text" id="nama" name="nama" required class="w-full px-3 py-2.5 border border-carbon-black-200 rounded-lg focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm text-carbon-black-800 bg-carbon-black-50/50">
                    </div>
                    <!-- NPWP -->
                    <div class="space-y-1.5">
                        <label for="npwp" class="text-xs font-bold uppercase tracking-widest text-carbon-black-600">NPWP <span class="text-rose-500">*</span></label>
                        <input type="text" id="npwp" name="npwp" required placeholder="00.000.000.0-000.000" class="w-full px-3 py-2.5 border border-carbon-black-200 rounded-lg focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm text-carbon-black-800 bg-carbon-black-50/50" oninput="formatNPWP(this)">
                    </div>
                    <!-- NO TELP -->
                    <div class="space-y-1.5">
                        <label for="no_telp" class="text-xs font-bold uppercase tracking-widest text-carbon-black-600">No. Telp</label>
                        <input type="tel" id="no_telp" name="no_telp" class="w-full px-3 py-2.5 border border-carbon-black-200 rounded-lg focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm text-carbon-black-800 bg-carbon-black-50/50">
                    </div>
                    <!-- ALAMAT (Full width) -->
                    <div class="space-y-1.5 col-span-2">
                        <label for="alamat" class="text-xs font-bold uppercase tracking-widest text-carbon-black-600">Alamat <span class="text-rose-500">*</span></label>
                        <textarea id="alamat" name="alamat" required rows="3" class="w-full px-3 py-2.5 border border-carbon-black-200 rounded-lg focus:outline-none focus:border-hunter-green-500 focus:ring-1 focus:ring-hunter-green-500 transition-colors text-sm text-carbon-black-800 bg-carbon-black-50/50"></textarea>
                    </div>
                    <!-- STATUS (Readonly) -->
                    <div class="space-y-1.5 col-span-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-carbon-black-600">Status</label>
                        <div class="px-3 py-2.5 bg-emerald-50 border border-emerald-200 rounded-lg flex items-center shadow-sm w-max">
                            <span class="text-xs font-black uppercase tracking-widest text-emerald-700">Aktif</span>
                            <input type="hidden" name="status" value="Aktif">
                        </div>
                        <p class="text-[10px] text-carbon-black-400 mt-1">Status otomatis diatur sebagai Aktif untuk data baru.</p>
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-4 bg-carbon-black-50 border-t border-carbon-black-100 flex justify-end space-x-3 rounded-b-xl">
                <button type="button" class="px-5 py-2.5 border border-carbon-black-300 text-carbon-black-600 text-sm font-bold uppercase tracking-wider rounded-lg hover:bg-carbon-black-100 transition-colors" onclick="closeModal()">Batal</button>
                <button type="submit" class="px-5 py-2.5 bg-hunter-green-600 text-white text-sm font-bold uppercase tracking-wider rounded-lg shadow-md hover:bg-hunter-green-700 hover:shadow-lg transition-all active:scale-95">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('status-filter');
        
        function updateOpacity() {
            if (statusFilter.value === "") {
                statusFilter.classList.remove('text-carbon-black-800');
                statusFilter.classList.add('text-carbon-black-300');
            } else {
                statusFilter.classList.remove('text-carbon-black-300');
                statusFilter.classList.add('text-carbon-black-800');
            }
        }

        statusFilter.addEventListener('change', function() {
            updateOpacity();
            let url = new URL(window.location.href);
            if (this.value) {
                url.searchParams.set('status', this.value);
            } else {
                url.searchParams.delete('status');
            }
            url.searchParams.set('page', 1);
            window.location.href = url.toString();
        });
        updateOpacity(); // Initial check

        const searchInput = document.getElementById('search');
        const searchBtn = document.getElementById('search-btn');

        function triggerSearch() {
            let url = new URL(window.location.href);
            if (searchInput.value.trim()) {
                url.searchParams.set('search', searchInput.value.trim());
            } else {
                url.searchParams.delete('search');
            }
            url.searchParams.set('page', 1);
            window.location.href = url.toString();
        }

        searchBtn.addEventListener('click', triggerSearch);
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                triggerSearch();
            }
        });
    });

    // Modal Control & Formatting JS
    const modal = document.getElementById('modal-tambah');
    const modalInner = modal.querySelector('div');
    
    window.openModal = function() {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalInner.classList.remove('scale-95');
            modalInner.classList.add('scale-100');
        }, 10);
    }

    window.closeModal = function() {
        modal.classList.add('opacity-0');
        modalInner.classList.remove('scale-100');
        modalInner.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.getElementById('form-tambah').reset();
        }, 300);
    }

    window.formatNPWP = function(input) {
        let val = input.value.replace(/\D/g, '');
        let formatted = '';
        if (val.length > 0) formatted += val.substring(0, 2);
        if (val.length > 2) formatted += '.' + val.substring(2, 5);
        if (val.length > 5) formatted += '.' + val.substring(5, 8);
        if (val.length > 8) formatted += '.' + val.substring(8, 9);
        if (val.length > 9) formatted += '-' + val.substring(9, 12);
        if (val.length > 12) formatted += '.' + val.substring(12, 15);
        input.value = formatted;
    }
</script>
@endpush
@endsection
