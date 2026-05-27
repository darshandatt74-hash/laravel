import './bootstrap';

import '../css/app.css';
import Alpine from 'alpinejs';

window.themeData = () => ({
    theme: 'dark',

    init() {
        const stored = localStorage.getItem('adminTheme');
        this.theme = stored ? stored : (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        document.documentElement.classList.toggle('dark', this.theme === 'dark');
    },

    setTheme(value) {
        this.theme = value;
        localStorage.setItem('adminTheme', value);
        document.documentElement.classList.toggle('dark', value === 'dark');
    },

    isActive(value) {
        return this.theme === value;
    }
});

window.Alpine = Alpine;

Alpine.start();

