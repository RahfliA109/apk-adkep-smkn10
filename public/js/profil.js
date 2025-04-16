    window.addEventListener('DOMContentLoaded', () => {
        const notif = document.getElementById('notif-success');
        if (notif) {
            notif.classList.add('show');
            setTimeout(() => {
                notif.classList.remove('show');
            }, 4000); // Auto-cl
        }
    });
//INI JS UNTUK NOTIF DELETE