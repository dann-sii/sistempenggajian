<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Penggajian - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "San Francisco Pro", "SF Pro Text", "SF Pro Display", system-ui, ui-sans-serif, sans-serif;
        }
    </style>
</head>
<body class="bg-carbon-black-50 text-carbon-black-950 antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white border-b border-carbon-black-200 h-16 flex items-center justify-between px-8 shadow-sm">
                <div class="flex items-center space-x-4">
                    <span class="bg-black-forest-700 text-white px-3 py-1 rounded-md text-sm font-bold uppercase tracking-widest">
                        Sahabat Ternak
                    </span>
                </div>
                <div class="flex items-center space-x-3 text-sm text-carbon-black-700">
                    <span class="opacity-60 italic">Halo,</span>
                    <span class="font-black uppercase tracking-widest bg-carbon-black-50 px-3 py-1 rounded-full text-xs">ADMIN</span>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-10">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
