<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "login_pweb"; // Sesuaikan dengan nama database Anda

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
