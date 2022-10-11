<?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "mahasiswa";
 
$conn = mysqli_connect("localhost","root","","mahasiswa");
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>