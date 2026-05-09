import { debounce } from '../utils/debounce.js';

export const Search = {
    element: document.getElementById('search-input'),

    init(onSearch) {
        if (!this.element) return;
        this.element.addEventListener('input', debounce((e) => {
            onSearch(e.target.value.toLowerCase());
        }, 300));
    }
};
