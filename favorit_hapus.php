<?php
include("koneksi.php");

if(isset($_GET["id_koleksi"])) {
    $id = $_GET["id_koleksi"];

    // Query untuk menghapus koleksi
    $query = "DELETE FROM tb_koleksi WHERE id_koleksi = $id";
    $result = mysqli_query($koneksi, $query);
    if($result) {
        echo '<script> alert("Koleksi berhasil dihapus"); location.href="favorit.php";</script>';           
    } else {
        echo '<script> alert("Maaf, terjadi kesalahan saat menghapus koleksi")</script>';
    }
} else {
    echo '<script> alert("Maaf, parameter id_koleksi tidak ditemukan")</script>';
}
exit();
?>
