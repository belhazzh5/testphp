<?php
$host = 'mysql';  // use the container name, not localhost
$user = 'testuser';
$pass = 'TestPass123!';
$db   = 'testdb';

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected to MySQL database '$db'<br><br>";

// Create a sample table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(255)
)");

// Insert a sample row if empty
$conn->query("INSERT INTO messages (text) SELECT 'Hello from MySQL + PHP in Podman!' WHERE NOT EXISTS (SELECT * FROM messages)");

// Fetch and display
$result = $conn->query("SELECT * FROM messages");

echo "<b>📬 Messages in DB:</b><br>";
while ($row = $result->fetch_assoc()) {
    echo "📝 " . htmlspecialchars($row['text']) . "<br>";
}
$conn->close();
?>

