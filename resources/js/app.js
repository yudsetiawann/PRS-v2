import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'; // <--- Tambahkan ini

Alpine.plugin(collapse); // <--- Daftarkan pluginnya

window.Alpine = Alpine;

Alpine.start();
