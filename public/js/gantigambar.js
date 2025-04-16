// Menangani klik gambar untuk buka input file
document.addEventListener('DOMContentLoaded', () => {
    const profilePhoto = document.getElementById('profile-photo');
    const imageInput = document.getElementById('profile-image-input');

    if (profilePhoto && imageInput) {
        profilePhoto.addEventListener('click', () => {
            imageInput.click();
        });

        // Preview gambar setelah dipilih
        imageInput.addEventListener('change', event => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePhoto.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Notifikasi sukses
    const notif = document.getElementById('notif-success');
    if (notif) {
        notif.classList.add('show');
        setTimeout(() => {
            notif.classList.remove('show');
        }, 4000);
    }
});
