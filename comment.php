<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('db.php');

    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['event_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (user_id, event_id, comment) VALUES ('$user_id', '$event_id', '$comment')";

    if ($conn->query($sql) === TRUE) {
        header("Location: events.php"); // Redirect to events page after comment is added
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
