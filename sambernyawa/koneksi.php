<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "coba_transtrack"; 
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>