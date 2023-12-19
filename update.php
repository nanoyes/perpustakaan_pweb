<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Query SQL untuk update data buku berdasarkan ID
    $updateSql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit' WHERE buku_id=$id";

    // Periksa apakah query berhasil dijalankan
    if ($mysqli->query($updateSql) === TRUE) {
        // Arahkan pengguna kembali ke halaman read.php setelah berhasil edit
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $updateSql . "<br>" . $mysqli->error;
    }
}

$id = $_GET['id'];

// Query SQL untuk mengambil data buku berdasarkan ID
$sql = "SELECT * FROM buku WHERE buku_id=$id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Buku</title>
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
        <h2>Edit Buku</h2>
        <form action="" method="POST">
            Judul: <input type="text" name="judul" value="<?php echo $row['judul']; ?>"><br>
            Pengarang: <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>"><br>
            Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"><br>
            Tahun Terbit: <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>"><br>
            <input type="hidden" name="id" value="<?php echo $row['buku_id']; ?>">
            <input type="submit" value="Update">
        </form>
    </body>

    </html>
<?php
} else {
    echo "Data tidak ditemukan.";
}

$mysqli->close();
?>
