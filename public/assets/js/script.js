
document.addEventListener('DOMContentLoaded', function () {
    // Sembunyikan semua konten tab kecuali yang pertama
    document.querySelectorAll('.tab-content').forEach(function (content) {
        content.style.display = 'none';
    });

    // Tangani klik pada tab
    document.querySelectorAll('.tabs a').forEach(function (tabLink) {
        tabLink.addEventListener('click', function (event) {
            event.preventDefault();

            var tabId = this.getAttribute('href');

            // Sembunyikan semua konten tab
            document.querySelectorAll('.tab-content').forEach(function (content) {
                content.style.display = 'none';
            });

            // Tampilkan konten tab yang sesuai dengan tab yang diklik
            document.querySelector(tabId).style.display = 'block';

            // Hapus kelas 'active' dari semua tab dan tambahkan ke tab yang diklik
            document.querySelectorAll('.tabs a').forEach(function (link) {
                link.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
});
