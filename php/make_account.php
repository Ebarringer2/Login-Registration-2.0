<?php
// form handling script - make account
$servername = "localhost";
$username = "elliott";
$password = "5ef938be";
$dbname = "accounts_DB";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$createDbSql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($createDbSql) === TRUE) {
    echo "Database created successfully or already exists<br>";
} else {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);
$createTableSql = "CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($createTableSql) === TRUE) {
    echo "Table created successfully or already exists<br>";
} else {
    die("Error creating table: " . $conn->error);
}

/* #### method to display the structure of the database
$describeTableSql = "DESCRIBE accounts";
$result = $conn->query($describeTableSql);

if ($result->num_rows > 0) {
    echo "<h2>Structure of 'accounts' table:</h2>";
    echo "<table border='1'><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    $insertSql = "INSERT INTO accounts (username, password) VALUES ('$username', '$pwd')";
    if ($conn->query($insertSql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
