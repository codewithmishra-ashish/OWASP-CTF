<?php
try {
    $pdo = new PDO('mysql:host=sql.freedb.tech;dbname=users', 'freedb_root_owasp', 'rtWHhdnSN!h!7EF');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed');
}
$userId = $_GET['id'] ?? 1;
$stmt = $pdo->prepare('SELECT username FROM users WHERE id = ?');
$stmt->execute([$userId]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head><title>IDOR Challenge</title></head>
<body>
    <h2>IDOR Challenge</h2>
    <form>
        <input type="number" name="id" value="<?php echo $userId; ?>">
        <button type="submit">View Profile</button>
    </form>
    <?php if ($user): ?>
        <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
        <?php if ($userId == 2): ?>
            <p>Flag: OWASP_CTF_IDOR_005</p>
        <?php endif; ?>
    <?php else: ?>
        <p>User not found</p>
    <?php endif; ?>
</body>
</html>