<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h3>Halo, <?= htmlspecialchars($_SESSION['user']) ?> 👋</h3>
        <p>Selamat datang di dashboard!</p>
        <a href="auth/logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
