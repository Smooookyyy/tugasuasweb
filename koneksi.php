<?php
$conn = new mysqli("localhost", "root", "", "uasweb");
if($conn->connect_error) {
    die("Koneksi ke database Gagal: " . $conn->connect_error);
}
?>