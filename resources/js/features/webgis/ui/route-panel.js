export const RoutePanel = {
    element: document.getElementById('route-info-panel'),

    show(distance, duration) {
        if (!this.element) return;
        document.getElementById('route-distance').textContent = distance;
        document.getElementById('route-duration').textContent = duration;
        this.element.classList.remove('hidden');
    },

    hide() {
        if (this.element) this.element.classList.add('hidden');
    }
};
