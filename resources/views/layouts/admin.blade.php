<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kopi Temanggung') }} - Admin</title>

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
                    <div class="w-8 h-8 bg-[#8B4513] rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke-width="2"></path></svg>
                    </div>
                    <span class="text-xl font-bold text-slate-900 tracking-tight">Admin Panel</span>
                </div>
                <nav class="flex-1 p-6 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.dashboard') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        1. Dashboard
                    </a>
                    <a href="{{ route('admin.umkm.index') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.umkm.index') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        2. Kelola UMKM
                    </a>
                    <a href="{{ route('admin.umkm.approval.index') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.umkm.approval.*') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        3. Approval UMKM
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.products.*') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        4. Daftar Produk
                    </a>
                    <a href="{{ route('admin.hasil-panen.index') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.hasil-panen.*') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        5. Kelola Hasil Panen
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.categories.*') ? 'bg-amber-50 text-[#8B4513] rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl' }}">
                        6. Kelola Kategori
                    </a>
                    <div class="pt-10 space-y-2">
                        <a href="/" class="flex items-center px-4 py-3 text-sm font-bold text-[#8B4513] bg-amber-50 rounded-2xl hover:bg-amber-100 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali ke Peta
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-bold text-rose-600 hover:bg-rose-50 rounded-2xl transition-colors text-left">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
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
                    <span class="text-xl font-bold text-slate-900">Admin Panel</span>
                    <button @click="sidebarOpen = false" class="text-slate-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
                <nav class="p-6 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.dashboard') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Dashboard</a>
                    <a href="{{ route('admin.umkm.index') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.umkm.index') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Kelola UMKM</a>
                    <a href="{{ route('admin.umkm.approval.index') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.umkm.approval.*') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Approval UMKM</a>
                    <a href="{{ route('admin.products.index') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.products.*') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Daftar Produk</a>
                    <a href="{{ route('admin.hasil-panen.index') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.hasil-panen.*') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Kelola Hasil Panen</a>
                    <a href="{{ route('admin.categories.index') }}" class="block px-4 py-3 text-sm font-bold {{ request()->routeIs('admin.categories.*') ? 'text-[#8B4513] bg-amber-50 rounded-2xl' : 'text-slate-500' }}">Kelola Kategori</a>
                    <div class="pt-6 space-y-2">
                        <a href="/" class="block px-4 py-3 text-sm font-bold text-[#8B4513] bg-amber-50 rounded-2xl">Kembali ke Peta</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-bold text-rose-600 hover:bg-rose-50 rounded-2xl transition-colors text-left">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col h-screen overflow-hidden">
                <header class="h-20 bg-white border-b border-slate-100 flex items-center justify-between px-4 sm:px-8 shrink-0">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="lg:hidden mr-4 text-slate-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button>
                        <h2 class="font-bold text-xl text-slate-800 leading-tight">{{ $header ?? 'Admin' }}</h2>
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
                        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
