<?php
include 'koneksi.php';

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Gunakan MD5 untuk verifikasi password (tidak disarankan)
        if (md5($password) === $row['password']) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            $login_error = "Login gagal. Cek kembali username dan password.";
        }
    } else {
        $login_error = "Login gagal. Cek kembali username dan password.";
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
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($login_error)) { echo "<p style='color: red;'>$login_error</p>"; } ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <button type="submit" name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>
