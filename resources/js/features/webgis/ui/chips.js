export const Chips = {
    container: null,

    render(categories, onChipClick) {
        this.container = document.getElementById('category-container');
        if (!this.container) return;
        this.container.innerHTML = '';

        categories.forEach(cat => {
            const btn = document.createElement('button');
            btn.className = 'chip whitespace-nowrap px-4 py-1.5 rounded-full bg-white border border-slate-200 text-sm font-medium shadow-sm hover:bg-slate-50 text-black';
            btn.textContent = cat.nama_kategori;
            btn.addEventListener('click', () => {
                this.setActive(btn);
                onChipClick(cat.nama_kategori);
            });
            this.container.appendChild(btn);
        });
    },

    setActive(activeBtn) {
        document.querySelectorAll('.chip').forEach(c => {
            c.classList.remove('active', 'bg-black', 'text-white');
            c.classList.add('bg-white', 'text-black');
        });
        activeBtn.classList.add('active', 'bg-black', 'text-white');
        activeBtn.classList.remove('bg-white', 'text-black');
    }
};
