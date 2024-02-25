<?php
include("koneksi.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query untuk menghapus ulasan
    $query = "DELETE FROM tb_ulasan WHERE id_ulasan = '$id'";
    $result = mysqli_query($koneksi, $query);
    echo '<script> alert("Ulasan berhasil dihapus"); location.href="ulasan.php";</script>';           
}else{
    echo '<script> alert("Maaf, ulasan gagal dihapus")</script>';


}
exit();
?>