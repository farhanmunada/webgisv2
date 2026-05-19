export const Sidebar = {
    overlay: null,
    drawer: null,
    btnOpen: null,
    btnClose: null,

    init() {
        this.overlay = document.getElementById('sidebar-overlay');
        this.drawer = document.getElementById('sidebar-drawer');
        this.btnOpen = document.getElementById('menu-btn');
        this.btnClose = document.getElementById('close-sidebar');

        if (!this.overlay || !this.drawer) return;

        this.btnOpen?.addEventListener('click', () => this.open());
        this.btnClose?.addEventListener('click', () => this.close());
        this.overlay?.addEventListener('click', () => this.close());
    },

    open() {
        this.overlay.classList.remove('pointer-events-none', 'opacity-0');
        this.overlay.classList.add('opacity-100');
        this.drawer.classList.remove('-translate-x-full');
    },

    close() {
        this.overlay.classList.remove('opacity-100');
        this.overlay.classList.add('opacity-0', 'pointer-events-none');
        this.drawer.classList.add('-translate-x-full');
    }
};
