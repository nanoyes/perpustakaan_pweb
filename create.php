<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: read.php"); // Redirect ke tampilan Read setelah berhasil tambah data
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <h2>Tambah Buku Baru</h2>
    <form action="create.php" method="POST">
        Judul: <input type="text" name="judul"><br>
        Pengarang: <input type="text" name="pengarang"><br>
        Penerbit: <input type="text" name="penerbit"><br>
        Tahun Terbit: <input type="text" name="tahun_terbit"><br>
        <input type="submit" value="Tambah">
    </form>
</body>

</html>
