<?php
session_start();
require_once('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $update_query = "UPDATE users SET nama = '$nama', email = '$email' WHERE id = '$user_id'";
    if (mysqli_query($conn, $update_query)) {
        header('Location: profile.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Pendaftaran PKL/Prakerin</title>
</head>
<body>
    <h2>Profile</h2>
    <form action="profile.php" method="POST">
        <input type="text" name="nama" value="<?= $user['nama'] ?>" required><br>
        <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
        <button type="submit">Update Profile</button>
    </form>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
