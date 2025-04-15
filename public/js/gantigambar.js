    // Fungsi untuk memicu input file ketika gambar profil diklik
    document.getElementById('profile-photo').onclick = function() {
        document.getElementById('gambar-input').click();
    };

    // Fungsi untuk menampilkan pratinjau gambar yang dipilih
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            // Mengubah sumber gambar menjadi pratinjau gambar yang dipilih
            document.getElementById('profile-photo').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
