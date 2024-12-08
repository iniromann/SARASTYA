<?php
require_once('koneksi.php');
$query = "SELECT * FROM terms WHERE id = 1";
$result = mysqli_query($conn, $query);
$terms = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat dan Ketentuan</title>
</head>
<body>
    <h2>Syarat dan Ketentuan</h2>
    <p><?= nl2br($terms['content']) ?></p>
    <p><a href="register.php">Back to Register</a></p>
</body>
</html>
