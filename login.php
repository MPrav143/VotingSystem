<?php
$conn = new mysqli('localhost', 'root', '', 'voting_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rollNo = $_POST['rollNo'];
$password = $_POST['password'];

$sql = "SELECT password FROM users WHERE roll_no = '$rollNo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
    } else {
        echo "Invalid credentials.";
    }
} else {
    echo "User not found.";
}
$conn->close();
?>
