<?php
include("koneksi.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query untuk menghapus data peminjaman
    $query = "DELETE FROM tb_peminjaman WHERE id_peminjaman = '$id'";
    $result = mysqli_query($koneksi, $query);
    echo '<script> alert("Data peminjaman berhasil dihapus"); location.href="laporan.php";</script>';           
}else{
    echo '<script> alert("Maaf, data peminjaman gagal dihapus")</script>';


}
exit();
?>