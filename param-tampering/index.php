<!DOCTYPE html>
<html>
<head><title>Parameter Tampering Challenge</title></head>
<body>
    <h2>Parameter Tampering Challenge</h2>
    <form method="POST">
        <input type="hidden" name="role" value="user">
        <input type="text" name="username" placeholder="Username">
        <button type="submit">Login</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $role = $_POST['role'] ?? 'user';
        if ($role === 'admin') {
            echo 'Flag: OWASP_CTF_PARAM_008';
        } else {
            echo 'Access denied';
        }
    }
    ?>
</body>
</html>