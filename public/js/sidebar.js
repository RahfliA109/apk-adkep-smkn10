document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('closed');
        mainContent.classList.toggle('expanded');
        toggleBtn.innerHTML = sidebar.classList.contains('closed') ? '☰' : '☰'; 
    });

    // Responsive behavior
    function handleResize() {
        if (window.innerWidth <= 768) {
            sidebar.classList.add('closed');
            mainContent.classList.add('expanded');
            toggleBtn.innerHTML = '☰';
        } else {
            sidebar.classList.remove('closed');
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