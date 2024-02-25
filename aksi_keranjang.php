<?php
include "koneksi.php"; // Pastikan file koneksi.php di sini

// Inisialisasi $_SESSION['cart'] jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if(isset($_GET['id_buku'])) { // Periksa apakah parameter id_buku telah diset
    // Lakukan sanitasi parameter id_buku sebelum digunakan dalam kueri SQL
    $id_buku = mysqli_real_escape_string($koneksi, $_GET['id_buku']);
    
    $qry = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku = '$id_buku'");
    if($qry) {
        $data = mysqli_fetch_array($qry);

        // Logika untuk menambah buku ke keranjang
        if ($data) {
            // Cek apakah jumlah buku yang telah ditambahkan ke keranjang sudah maksimal
            if(count($_SESSION['cart']) < 2) { // Menggunakan 2 sebagai batas maksimal buku yang dapat dipinjam
                // Tambahkan buku ke keranjang
                $_SESSION['cart'][] = array(
                    'id_buku' => $data['id_buku'],
                    'judul' => $data['judul']
                );
            } else {
              echo "<script>alert('Keranjang sudah penuh. Anda tidak dapat menambahkan lebih banyak buku.'); 
              window.location='keranjang.php';</script>";

            }
        } else {
            echo "Buku tidak ditemukan.";
        }
    } else {
        echo "Terjadi kesalahan dalam mengambil data buku.";
    }
} else {
    echo "Parameter id_buku tidak ditemukan.";
}

header('Location: keranjang.php'); // Redirect ke halaman keranjang.php setelah berhasil menambahkan buku
exit(); // Penting untuk keluar setelah melakukan redirect
?>
