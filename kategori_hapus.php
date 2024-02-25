<?php
include("koneksi.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query untuk menghapus kategori
    $query = "DELETE FROM tb_kategori WHERE id_kategori = '$id'";
    $result = mysqli_query($koneksi, $query);
    echo '<script> alert("Kategori berhasil dihapus"); location.href="kategori.php";</script>';           
}else{
    echo '<script> alert("Maaf, kategori gagal dihapus")</script>';
}
exit();
?>