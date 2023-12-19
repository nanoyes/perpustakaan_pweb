<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username_reg = $_POST['username_reg'];
    $password_reg = $_POST['password_reg'];

    // Gunakan MD5 untuk menyimpan password (tidak disarankan)
    $hashed_password = md5($password_reg);
    $query_reg = "INSERT INTO users (username, password) VALUES ('$username_reg', '$hashed_password')";
    $result_reg = $koneksi->query($query_reg);

    if ($result_reg) {
        $registration_message = "Registrasi berhasil!";
    } else {
        $registration_error = "Registrasi gagal. Cek kembali data registrasi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fce4ec; /* Pink background color */
}

.container {
    width: 300px;
    margin: auto;
    margin-top: 100px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

label {
    margin-bottom: 5px;
}

input {
    margin-bottom: 10px;
    padding: 8px;
}

button {
    padding: 10px;
    background-color: #e91e63; /* Pink button color */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #ad1457; /* Darker pink on hover */
}

a {
    text-decoration: none;
    color: #880e4f; /* Pink link color */
    margin-top: 10px;
    display: block;
}

h2 {
    margin-bottom: 15px;
    text-align: center;
    color: #880e4f; /* Pink heading color */
}

    </style>
    <title>Registration Page</title>
</head>
<body>
    <div class="container">
        <h2>Registrasi</h2>
        <?php
        if (isset($registration_message)) {
            echo "<p style='color: green;'>$registration_message</p>";
        } elseif (isset($registration_error)) {
            echo "<p style='color: red;'>$registration_error</p>";
        }
        ?>
        <form method="post" action="">
            <label for="username_reg">Username:</label>
            <input type="text" name="username_reg" required><br>

            <label for="password_reg">Password:</label>
            <input type="password" name="password_reg" required><br>

            <button type="submit" name="register">Register</button>
        </form>
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
    </div>
</body>
</html>
