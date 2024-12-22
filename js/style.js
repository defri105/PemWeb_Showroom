// Change navbar color on scroll
window.onscroll = function() {
    const navbar = document.getElementById("navbar");
    if (window.pageYOffset > 100) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
};

const navInput = document.querySelector('.navigation input');
const menu = document.querySelector('.navigation .menu');

navInput.addEventListener('change', () => {
    if (navInput.checked) {
        // Tambahkan kelas z-index-visible
        menu.classList.add('z-index-visible');
        
        // Tunggu sedikit sebelum memulai animasi opacity
        setTimeout(() => {
            menu.classList.add('visible');
        }, 50); // Delay 50ms agar perubahan z-index terlihat dulu
    } else {
        // Hapus kelas untuk animasi keluar
        menu.classList.remove('visible');
        
        // Tunggu hingga animasi selesai sebelum menghapus z-index
        setTimeout(() => {
            menu.classList.remove('z-index-visible');
        }, 300); // Delay sesuai durasi animasi opacity
    }
});