<?php 
include "koneksi.php"
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori=$id");
?>
<script>
     alert('Hapus data berhasil');
     location.href = "kategori.php";
</script>