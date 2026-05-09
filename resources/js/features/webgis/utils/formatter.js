export const Formatter = {
    currency(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value);
    },
    truncate(text, length = 30) {
        if (!text) return '';
        return text.length > length ? text.substring(0, length) + '...' : text;
    }
};
