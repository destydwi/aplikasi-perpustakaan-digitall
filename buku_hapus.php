<?php
include("koneksi.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query untuk menghapus data buku 
    $query = "DELETE FROM tb_buku WHERE id_buku = '$id'";
    $result = mysqli_query($koneksi, $query);
    echo '<script> alert("Data berhasil dihapus"); location.href="buku.php";</script>';           
}else{
    echo '<script> alert("Maaf,data gagal dihapus")</script>';


}
exit();
?>