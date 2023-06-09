<?php
include 'koneksi.php';
if (isset($_POST['Log In'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['passwd']);

    $checkQuery = "SELECT * FROM t_user WHERE email='$email'AND passwd='$password'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo '<script lang="javascript">';
        echo 'alert("email atau password salah, Silakan gunakan email password lain.")';
        echo '</script>';
    } else {
        $insertQuery = "INSERT INTO t_user (email, passwd) VALUES ('$email', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['daftar_success'] = true;
            header("Location: ../public/Home.html");
            exit();
        } else {
            echo "Terjadi kesalahan saat Log In: " . $conn->error;
        }
    }
}
?>