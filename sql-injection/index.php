<?php
try {
    $pdo = new PDO('mysql:host=sql.freedb.tech;dbname=users', 'freedb_root_owasp', 'rtWHhdnSN!h!7EF');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $pdo->query($query);
    if ($result->rowCount() > 0) {
        echo 'Flag: OWASP_CTF_SQLI_004';
    } else {
        echo 'Login failed.';
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>SQL Injection Challenge</title></head>
<body>
    <h2>SQL Injection Challenge</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>
</html>