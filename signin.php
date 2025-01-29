<?php
$conn = new mysqli('localhost', 'root', '', 'voting_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rollNo = $_POST['rollNo'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$sql = "INSERT INTO users (roll_no, name, password) VALUES ('$rollNo', '$name', '$password')";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>