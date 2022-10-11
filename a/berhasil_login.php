<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style7.css">
    <title>Berhasil Login</title>
</head>
<body background="92.JPG">
    <div class="container-logout">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
             
            <div class="input-group">
            <a href="index1.php" class="btn">Silahkan isi data mahasiswa

            <div class="input-group">
            <a href="logout.php" class="btn">logout 
            </a>
           
            </div>
        </form>
    </div>
</body>
</html>
