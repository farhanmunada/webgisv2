export const RoutePanel = {
    show(distance, duration) {
        const el = document.getElementById('route-info-panel');
        if (!el) return;
        
        const distEl = document.getElementById('route-distance');
        const durEl = document.getElementById('route-duration');
        if (distEl) distEl.textContent = distance;
        if (durEl) durEl.textContent = duration;
        
        el.classList.remove('hidden');
    },

    hide() {
        const el = document.getElementById('route-info-panel');
        if (el) el.classList.add('hidden');
    }
};
