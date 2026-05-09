const headers = {
    'X-Requested-With': 'XMLHttpRequest',
    'Accept': 'application/json'
};

export const ApiService = {
    async fetchMarkers() {
        const res = await fetch('/api/markers', { headers });
        return res.json();
    },
    async fetchPolygons() {
        const res = await fetch('/data/polygons', { headers });
        if (!res.ok) throw new Error("Auth failed");
        return res.json();
    },
    async fetchHeatmap() {
        const res = await fetch('/data/heatmap', { headers });
        if (!res.ok) throw new Error("Auth failed");
        return res.json();
    },
    async fetchCategories() {
        const res = await fetch('/api/stats', { headers });
        return res.json();
    }
};
