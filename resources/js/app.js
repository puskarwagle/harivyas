import Alpine from 'alpinejs';
// import 'livewire-sortable';

window.Alpine = Alpine; // Optional: Makes Alpine globally available in the browser console for debugging
Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.querySelector('.theme-controller');
    const lightFace = document.getElementById('lightFace');
    const darkFace = document.getElementById('darkFace');

    function updateFaces() {
        if (toggle.checked) {
            lightFace.style.display = 'block';
            darkFace.style.display = 'none';
        } else {
            lightFace.style.display = 'none';
            darkFace.style.display = 'block';
        }
    }

    toggle.addEventListener('change', updateFaces);

    // Initial state on page load
    updateFaces();
});