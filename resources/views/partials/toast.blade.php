@if(session('success') || session('error') || session('warning') || session('info'))
<div id="toast-container" class="fixed top-24 left-1/2 -translate-x-1/2 z-[100] flex flex-col gap-3 pointer-events-none transition-all duration-500">
    @if(session('success'))
    <div class="toast-item pointer-events-auto flex items-center gap-3 px-6 py-4 bg-emerald-900/90 backdrop-blur-md text-white rounded-2xl shadow-2xl shadow-emerald-900/20 border border-emerald-500/20 animate-slide-up">
        <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <span class="text-sm font-bold tracking-tight">{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="toast-item pointer-events-auto flex items-center gap-3 px-6 py-4 bg-rose-900/90 backdrop-blur-md text-white rounded-2xl shadow-2xl shadow-rose-900/20 border border-rose-500/20 animate-slide-up">
        <div class="w-8 h-8 rounded-full bg-rose-500 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
        </div>
        <span class="text-sm font-bold tracking-tight">{{ session('error') }}</span>
    </div>
    @endif

    @if(session('warning'))
    <div class="toast-item pointer-events-auto flex items-center gap-3 px-6 py-4 bg-amber-900/90 backdrop-blur-md text-white rounded-2xl shadow-2xl shadow-amber-900/20 border border-amber-500/20 animate-slide-up">
        <div class="w-8 h-8 rounded-full bg-amber-500 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <span class="text-sm font-bold tracking-tight">{{ session('warning') }}</span>
    </div>
    @endif
</div>
@endif

<script>
    window.showToast = (message, type = 'success') => {
        let container = document.getElementById('toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toast-container';
            container.className = 'fixed top-24 left-1/2 -translate-x-1/2 z-[100] flex flex-col gap-3 pointer-events-none transition-all duration-500';
            document.body.appendChild(container);
        }

        const bgColor = {
            'success': 'bg-emerald-900/90 border-emerald-500/20 shadow-emerald-900/20',
            'error': 'bg-rose-900/90 border-rose-500/20 shadow-rose-900/20',
            'warning': 'bg-amber-900/90 border-amber-500/20 shadow-amber-900/20',
            'info': 'bg-slate-900/90 border-slate-500/20 shadow-slate-900/20'
        }[type];

        const icon = {
            'success': '<svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>',
            'error': '<svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>',
            'warning': '<svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
            'info': '<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
        }[type];

        const toast = document.createElement('div');
        toast.className = `toast-item pointer-events-auto flex items-center gap-3 px-6 py-4 ${bgColor} backdrop-blur-md text-white rounded-2xl shadow-2xl border animate-slide-up`;
        toast.innerHTML = `
            <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center shrink-0">${icon}</div>
            <span class="text-sm font-bold tracking-tight">${message}</span>
        `;

        container.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(-20px)';
            setTimeout(() => toast.remove(), 500);
        }, 4000);
    };

    document.addEventListener('DOMContentLoaded', () => {
        const toasts = document.querySelectorAll('.toast-item');
        toasts.forEach(toast => {
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-20px)';
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        });
    });
</script>

<style>
    @keyframes slide-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-up { animation: slide-up 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>
