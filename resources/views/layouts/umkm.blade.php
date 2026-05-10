<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kopi Temanggung') }} - Dashboard UMKM</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="antialiased bg-slate-50 text-slate-900" x-data="{ sidebarOpen: false }">
        @include('partials.toast')
        <div class="min-h-screen flex">
            <!-- Sidebar Desktop -->
            <aside class="hidden lg:flex flex-col w-72 bg-white border-r border-slate-200">
                <div class="h-20 flex items-center px-8 border-b border-slate-100">
                    <a href="/" class="w-8 h-8 bg-[#8B4513] rounded-lg flex items-center justify-center mr-3 hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7"></path></svg>
                    </a>
                    <span class="text-xl font-black text-slate-900 tracking-tight">UMKM Panel</span>
                </div>
                <nav class="flex-1 p-6 space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('dashboard') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('umkm.profile.edit') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('umkm.profile.*') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Edit Profil UMKM
                    </a>
                    <a href="{{ route('umkm.products.index') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('umkm.products.*') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        Kelola Produk
                    </a>
                    
                    <div class="pt-10">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-bold text-rose-600 hover:bg-rose-50 rounded-2xl transition-colors text-left">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </nav>
            </aside>

            <!-- Sidebar Mobile Overlay -->
            <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-40 lg:hidden bg-slate-900/50 backdrop-blur-sm" @click="sidebarOpen = false"></div>
            
            <!-- Sidebar Mobile -->
            <aside x-show="sidebarOpen" x-cloak 
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="-translate-x-full"
                   x-transition:enter-end="translate-x-0"
                   x-transition:leave="transition ease-in duration-300"
                   x-transition:leave-start="translate-x-0"
                   x-transition:leave-end="-translate-x-full"
                   class="fixed inset-y-0 left-0 z-50 w-72 bg-white lg:hidden">
                <div class="h-20 flex items-center justify-between px-8 border-b border-slate-100">
                    <span class="text-xl font-black text-slate-900">UMKM Panel</span>
                    <button @click="sidebarOpen = false" class="text-slate-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
                <nav class="p-6 space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('dashboard') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Dashboard</a>
                    <a href="{{ route('umkm.profile.edit') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('umkm.profile.*') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Edit Profil UMKM</a>
                    <a href="{{ route('umkm.products.index') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('umkm.products.*') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Kelola Produk</a>
                    <form method="POST" action="{{ route('logout') }}" class="pt-4">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 text-sm font-bold text-rose-600">Logout</button>
                    </form>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col h-screen overflow-hidden">
                <header class="h-20 bg-white border-b border-slate-100 flex items-center justify-between px-4 sm:px-8 shrink-0">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="lg:hidden mr-4 text-slate-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button>
                        <h2 class="font-black text-xl text-slate-800 leading-tight">{{ $header ?? 'Dashboard' }}</h2>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <a href="/" class="flex items-center gap-2 px-6 py-3 bg-[#8B4513] text-white rounded-2xl text-xs font-black shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 uppercase tracking-widest">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7"></path></svg>
                            Kembali ke Peta
                        </a>
                    </div>
                </header>

                <main class="flex-1 overflow-y-auto p-4 sm:p-8 bg-slate-50">
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center shadow-sm">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 l2 2 a1 1 0 001.414 0 l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-sm font-bold">{{ session('success') }}</span>
                        </div>
                    @endif
                    
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
