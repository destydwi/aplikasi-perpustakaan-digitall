<?php
include "koneksi.php";

// Pastikan session telah dimulai


// Set status peminjaman
$status_peminjaman = 'dipinjam';

if (!empty($_SESSION['cart'])) {
    // Mengambil kode peminjaman terbesar
    $query = mysqli_query($koneksi, "SELECT max(kode_peminjaman) as kodeTerbesar FROM tb_peminjaman");
    $data = mysqli_fetch_array($query);
    $kodeTerbesar = $data['kodeTerbesar'];
    
    // Mengambil angka dari kode peminjaman terbesar, menggunakan substr dan diubah ke integer
    $urutan = (int) substr($kodeTerbesar, 3, 3);
    
    // Menambahkan 1 untuk mendapatkan nomor urut berikutnya
    $urutan++;
    
    // Membentuk kode peminjaman baru
    $huruf = "PMJ";
    $kode_peminjaman = $huruf . sprintf("%03s", $urutan);

    // Looping untuk setiap buku dalam keranjang
    foreach ($_SESSION['cart'] as $key_produk => $val_produk) {
        $id_buku = mysqli_real_escape_string($koneksi, $val_produk['id_buku']);

        // Tetapkan tanggal peminjaman dan tanggal pengembalian
        $tanggal_peminjaman = date('Y-m-d');
        $tanggal_pengembalian = date('Y-m-d', strtotime('+7 days'));

        // Dapatkan id user dari session (jika tidak ada, beri nilai NULL)
        $id_user = isset($_SESSION['tb_user']['id_user']) ? $_SESSION['tb_user']['id_user'] : NULL;

        // Masukkan data peminjaman buku ke dalam database
        $query = "INSERT INTO tb_peminjaman (id_user, id_buku, kode_peminjaman, tanggal_peminjaman, tanggal_pengembalian, status, qty) 
          VALUES ('$id_user', '$id_buku', '$kode_peminjaman', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman', 1)";

        mysqli_query($koneksi, $query);
    }

    // Setelah data dimasukkan, hapus keranjang belanja
    unset($_SESSION['cart']);

    // Tampilkan pesan sukses dan redirect ke halaman buku
    echo '<script>alert("Anda berhasil meminjam buku");location.href="buku.php"</script>';
} else {
    // Jika keranjang kosong, tampilkan pesan error
    echo '<script>alert("Keranjang belanja kosong");location.href="keranjang.php"</script>';
}
?>
