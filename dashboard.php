<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
        <!-- Isi halaman dashboard di sini -->
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
