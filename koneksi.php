<?php
$host = 'localhost';
$username = 'root'; // Sesuaikan dengan username MySQL Anda
$password = ''; // Biasanya tidak ada password di instalasi lokal
$dbname = 'perpustakaan_pweb';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
