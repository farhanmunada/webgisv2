<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kopi Temanggung') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            .coffee-accent { color: #8B4513; }
            .bg-coffee { background-color: #8B4513; }
            .border-coffee { border-color: #8B4513; }
            .focus-coffee:focus { border-color: #8B4513; ring-color: #8B4513; }
        </style>
    </head>
    <body class="antialiased bg-white text-black">
        @include('partials.toast')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden sm:rounded-3xl">
                <div class="mb-8 flex flex-col items-center">
                    <a href="/" class="mb-4">
                        <div class="w-16 h-16 bg-coffee rounded-2xl flex items-center justify-center shadow-lg shadow-amber-900/20">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </a>
                    <h1 class="text-2xl font-bold text-slate-900">Selamat Datang</h1>
                    <p class="text-slate-500 text-sm mt-1">WebGIS Kopi Temanggung</p>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
