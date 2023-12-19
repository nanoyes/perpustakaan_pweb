<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Buku Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .dashboard-links {
            margin: 20px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Dashboard Buku Perpustakaan</h1>
    </header>

    <div class="dashboard-links">
        <a href="create.php">Tambah Buku Baru</a>
    </div>

    <?php
    include 'koneksi.php';

    // Hapus buku jika parameter 'action' dan 'id' ada dalam URL
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query SQL untuk menghapus buku berdasarkan ID
        $deleteSql = "DELETE FROM buku WHERE buku_id=$id";

        // Periksa apakah query berhasil dijalankan
        if ($mysqli->query($deleteSql) === TRUE) {
            echo "<div style='color: green; margin: 10px;'>Buku berhasil dihapus.</div>";
        } else {
            echo "<div style='color: red; margin: 10px;'>Error: " . $mysqli->error . "</div>";
        }
    }

    // Query SQL untuk menampilkan semua data buku
    $query = "SELECT * FROM buku";
    $result = $mysqli->query($query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Periksa apakah ada data buku
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Action</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["buku_id"] . "</td>";
                echo "<td>" . $row["judul"] . "</td>";
                echo "<td>" . $row["pengarang"] . "</td>";
                echo "<td>" . $row["penerbit"] . "</td>";
                echo "<td>" . $row["tahun_terbit"] . "</td>";
                echo "<td><a href='update.php?id=" . $row["buku_id"] . "'>Edit</a> | <a href='read.php?action=delete&id=" . $row["buku_id"] . "'>Hapus</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<div style='color: #333; margin: 10px;'>Tidak ada data buku.</div>";
        }
    } else {
        echo "<div style='color: red; margin: 10px;'>Error: " . $mysqli->error . "</div>";
    }

    // Tutup koneksi database
    $mysqli->close();
    ?>

</body>

</html>
