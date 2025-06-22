<?php
require '../config/Database.php';

$db = new Database();
$conn = $db->connect();

$message = "";

if ($_POST) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        header("Location: login.php");
    } catch (PDOException $e) {
        $message = "Username sudah digunakan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh">
    <div class="card p-4 shadow" style="width: 350px;">
        <h4 class="text-center mb-3">Daftar</h4>
        <?php if ($message): ?>
            <div class="alert alert-danger"><?= $message ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-2">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-success w-100" type="submit">Daftar</button>
            <a href="login.php" class="d-block text-center mt-2">Sudah punya akun?</a>
        </form>
    </div>
</body>
</html>
