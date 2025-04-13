<!DOCTYPE html>
<html>
<head><title>XSS Reflected Challenge</title></head>
<body>
    <h2>XSS Reflected Challenge</h2>
    <form>
        <input type="text" name="query" placeholder="Enter query">
        <button type="submit">Search</button>
    </form>
    <?php
    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        if ($query === '<script>alert("owasp_manit_chapter")</script>') {
            echo 'Flag: OWASP_CTF_XSSREF_002';
        } else {
            echo "<p>Search: $query</p>";
        }
    }
    ?>
</body>
</html>