document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('closed');  // Toggle status closed pada sidebar
        mainContent.classList.toggle('expanded');
    });

    // Responsif behavior
    function handleResize() {
        if (window.innerWidth <= 768) {
            sidebar.classList.add('closed');  // Sidebar otomatis tertutup pada layar kecil
            mainContent.classList.add('expanded');
        } else {
            sidebar.classList.remove('closed');  // Sidebar terbuka pada layar besar
            mainContent.classList.remove('expanded');
        }
    }

    window.addEventListener('resize', handleResize);
    handleResize(); // Initial check
});


function toggleDropdown() {
    const menu = document.getElementById('dropdownMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}

// Tutup saat klik di luar
window.addEventListener('click', function(e) {
    if (!e.target.closest('.dropdown-container')) {
        document.getElementById('dropdownMenu').style.display = 'none';
    }
});