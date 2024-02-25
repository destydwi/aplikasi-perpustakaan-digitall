<?php
include "koneksi.php";

// Pastikan parameter id_buku ada
if(isset($_GET['id_buku'])){
    $id_buku = $_GET['id_buku'];

    $id_user = $_SESSION['tb_user']['id_user'];

    // Periksa apakah buku sudah ada dalam koleksi favorit pengguna
    $check_query = "SELECT COUNT(*) AS total FROM tb_koleksi WHERE id_user = $id_user AND id_buku = $id_buku";
    $check_result = mysqli_query($koneksi, $check_query);
    $check_data = mysqli_fetch_assoc($check_result);

    if($check_data['total'] > 0) {
        // Jika buku sudah ada dalam koleksi, beri respons kepada pengguna
        echo "<script>
               alert('Buku sudah ada dalam koleksi favorit Anda');
               location.href='favorit.php';
             </script>";
    } else {
        // Jika buku belum ada dalam koleksi, tambahkan buku ke koleksi favorit
        $insert_query = "INSERT INTO tb_koleksi (id_user, id_buku) VALUES ($id_user, $id_buku)";
        mysqli_query($koneksi, $insert_query);

        // Beri respons kepada pengguna bahwa buku telah ditambahkan ke favorit
        echo "<script>
               alert('Selamat Anda berhasil menambahkan buku ke favorit');
               location.href='favorit.php';
             </script>";
    }
} else {
    // Beri respons bahwa parameter id_buku tidak ditemukan
    echo "ID buku tidak ditemukan!";
}
?>
