<?php
$conn = new mysqli('localhost', 'root', '', 'voting_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
if ( isset($_POST['candidate'])) {
    $candidate = $conn->real_escape_string($_POST['candidate']);
    $sql = "INSERT INTO votes ( candidate) VALUES ('$candidate')";
    if ($conn->query($sql) === TRUE) {
        echo "Vote cast successfully.";
    } else {
        echo "Error: Unable to cast the vote. " . $conn->error;
    }
} else {
    echo "Error: Invalid session or no candidate selected.";
}
$conn->close();
?>