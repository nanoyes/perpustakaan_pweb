<?php
include 'koneksi.php';
$id = $_GET['id']; // ID dari buku yang akan dihapus
$sql = "DELETE FROM buku WHERE buku_id=$id";
if ($mysqli->query($sql) === TRUE) {
 header("Location: read.php"); // Redirect ke tampilan Read setelah berhasil hapus data
 exit;
} else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
?>
