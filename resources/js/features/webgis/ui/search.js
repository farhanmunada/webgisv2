import { debounce } from '../utils/debounce.js';

export const Search = {
    element: null,

    init(onSearch) {
        this.element = document.getElementById('search-input');
        if (!this.element) return;
        this.element.addEventListener('input', debounce((e) => {
            onSearch(e.target.value.toLowerCase());
        }, 300));
    }
};
