<?php
$servername = "mysql";
$username = "user";

// Check if the secret file exists and read the password
$password_file = '/run/secrets/mysql_user_password';
if (file_exists($password_file)) {
    $password = file_get_contents($password_file);
} else {
    die("Error: Password file not found.");
}

$dbname = "test_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, 
$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->query("SELECT name, email FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LEMP Stack</title>
</head>
<body>
    <h1>Welcome to the LEMP Stack</h1>
    <h2>User List</h2>
    <ul>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <li><?php echo htmlspecialchars($user['name']) . ' (' . 
htmlspecialchars($user['email']) . ')'; ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No users found</li>
        <?php endif; ?>
    </ul>
</body>
</html>

