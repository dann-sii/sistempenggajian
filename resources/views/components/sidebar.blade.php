<aside class="w-64 bg-carbon-black-100 border-r border-carbon-black-200 flex flex-col shadow-inner">
    <!-- User Profile Area -->
    <div class="p-8 flex flex-col items-center border-b border-carbon-black-200">
        <div class="w-32 h-32 rounded-full border-4 border-hunter-green-200 overflow-hidden bg-white shadow-lg flex items-center justify-center p-1">
            <div class="w-full h-full rounded-full bg-carbon-black-50 flex items-center justify-center">
                <!-- Profile Placeholder -->
                <x-tabler-user class="w-20 h-20 text-carbon-black-300" />
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 py-4">
        @php
            $menuItems = [
                ['name' => 'Data Karyawan', 'route' => 'karyawan.index', 'icon' => 'users'],
                ['name' => 'Data Presensi', 'route' => 'presensi.index', 'icon' => 'calendar-check'],
                ['name' => 'Data Gaji Pokok', 'route' => 'gaji_pokok.index', 'icon' => 'cash'],
                ['name' => 'Data Gaji Lembur', 'route' => 'gaji_lembur.index', 'icon' => 'clock-play'],
                ['name' => 'Data Gaji Bonus', 'route' => 'gaji_bonus.index', 'icon' => 'gift'],
                ['name' => 'Data Potongan Gaji', 'route' => 'potongan_gaji.index', 'icon' => 'cash-off'],
                ['name' => 'Penggajian', 'route' => 'penggajian.index', 'icon' => 'report-money'],
                ['name' => 'Detail Penggajian', 'route' => 'detail_penggajian.index', 'icon' => 'file-analytics'],
                ['name' => 'Laporan Penggajian', 'route' => 'laporan_penggajian.index', 'icon' => 'file-description'],
            ];
        @endphp

        @foreach($menuItems as $item)
            @php
                $isActive = Route::currentRouteName() == $item['route'] || (isset($active) && $active == $item['name']);
            @endphp
            <a href="{{ $item['route'] !== '#' ? route($item['route']) : '#' }}" 
               class="flex items-center space-x-3 px-6 py-3 font-bold transition-all duration-200 border-l-4 
               {{ $isActive 
                    ? 'bg-hunter-green-500 text-white border-black-forest-700 shadow-md' 
                    : 'text-carbon-black-700 border-transparent hover:bg-hunter-green-50 hover:text-hunter-green-700 hover:border-hunter-green-300' }}">
                @php $iconName = "tabler-" . $item['icon']; @endphp
                <x-dynamic-component :component="$iconName" class="w-5 h-5" />
                <span>{{ $item['name'] }}</span>
            </a>
        @endforeach
    </nav>

    <!-- Logout Button -->
    <div class="p-4 border-t border-carbon-black-200">
        <button class="w-full bg-rose-700 text-white border border-rose-800 rounded py-2.5 font-bold uppercase tracking-widest hover:bg-rose-800 hover:shadow-lg transition-all duration-200 shadow-sm active:scale-95 flex items-center justify-center space-x-2">
            <x-tabler-logout class="w-5 h-5" />
            <span>KELUAR</span>
        </button>
    </div>
</aside>
