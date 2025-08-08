import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Dropdown menu click handler
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.dropdown-toggle').forEach(function (toggle) {
    toggle.addEventListener('click', function (e) {
      e.preventDefault();
      const dropdown = toggle.closest('.dropdown');
      if (dropdown) {
        dropdown.classList.toggle('open');
      }
    });
  });

  // Optional: close dropdown when clicking outside
  document.addEventListener('click', function (e) {
    document.querySelectorAll('.dropdown.open').forEach(function (dropdown) {
      if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('open');
      }
    });
  });
});
