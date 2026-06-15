<x-admin-layout>
    <x-slot name="header">
        Kelola Hasil Panen
    </x-slot>

    <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h3 class="text-xl font-bold text-slate-900">Produksi Kopi Temanggung</h3>
            <p class="text-slate-500 text-sm mt-1">Data produksi Robusta dan Arabika per kecamatan.</p>
        </div>
        <a href="{{ route('admin.hasil-panen.create') }}" class="px-4 sm:px-6 py-2.5 sm:py-3 bg-[#8B4513] text-white rounded-xl sm:rounded-2xl text-[10px] sm:text-xs font-black shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 flex items-center gap-2 uppercase tracking-widest w-full sm:w-auto justify-center">
            <svg class="w-3.5 h-3.5 sm:w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
            Tambah Data Panen
        </a>
    </div>

    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden max-w-5xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-3 sm:px-8 py-3.5 sm:py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Kecamatan</th>
                        <th class="px-3 sm:px-8 py-3.5 sm:py-5 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Robusta (Ton)</th>
                        <th class="px-3 sm:px-8 py-3.5 sm:py-5 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Arabika (Ton)</th>
                        <th class="px-3 sm:px-8 py-3.5 sm:py-5 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($hasil_panen as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-3 sm:px-8 py-3.5 sm:py-5">
                                <span class="font-bold text-slate-800 group-hover:text-[#8B4513] transition-colors uppercase tracking-tight text-xs sm:text-sm">{{ $item->kecamatan }}</span>
                            </td>
                            <td class="px-3 sm:px-8 py-3.5 sm:py-5 text-right font-bold text-slate-600 text-xs sm:text-sm">{{ number_format($item->hasil_robusta, 1, ',', '.') }}</td>
                            <td class="px-3 sm:px-8 py-3.5 sm:py-5 text-right font-bold text-slate-600 text-xs sm:text-sm">{{ number_format($item->hasil_arabika, 1, ',', '.') }}</td>
                            <td class="px-3 sm:px-8 py-3.5 sm:py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.hasil-panen.edit', $item) }}" class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.hasil-panen.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center text-slate-400 italic">Belum ada data hasil panen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
