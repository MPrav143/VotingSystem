<?php
$conn = new mysqli('localhost', 'root', '', 'voting_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = htmlspecialchars($_POST['name']);
$rollNo = htmlspecialchars($_POST['rollNo']);
$details = htmlspecialchars($_POST['details']);
$sql = "INSERT INTO candidates (name, roll_no, details) VALUES ('$name', '$rollNo', '$details')";
if ($conn->query($sql) === TRUE) {
    echo "Candidate registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>