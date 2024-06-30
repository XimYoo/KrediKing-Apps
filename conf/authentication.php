<?php
session_start();
include ('config.php');

$username = $_POST['username'];
$password = $_POST['Password'];

// Query untuk mencari user berdasarkan username, password, dan role admin
$query = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query) == 1){
    // Jika berhasil login sebagai admin
    header('location: ../krediKing'); // Redirect ke halaman setelah login sukses
    $_SESSION['nama'] = 'william';
    exit();
} else {
    // Jika login gagal, redirect kembali ke halaman login dengan pesan error
    header('location: ../index.php?error=1'); 
    exit();
}
?>