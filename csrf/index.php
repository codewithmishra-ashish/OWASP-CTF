<?php
try {
    $pdo = new PDO('mysql:host=sql.freedb.tech;dbname=users', 'freedb_root_owasp', 'rtWHhdnSN!h!7EF');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed');
}
session_start();
$_SESSION['user_id'] = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    if ($email === 'flag@ctf.com') {
        echo 'Flag: OWASP_CTF_CSRF_007';
    } else {
        echo 'Email updated';
    }
}
$stmt = $pdo->prepare('SELECT email FROM users WHERE id = ?');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head><title>CSRF Challenge</title></head>
<body>
    <h2>CSRF Challenge</h2>
    <form method="POST">
        <input type="text" name="email" placeholder="New email">
        <button type="submit">Update Email</button>
    </form>
</body>
</html>