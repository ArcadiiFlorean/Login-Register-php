<?php
session_start(); 

include ( 'db.php');

$sql = "SELECT * FROM events";
$result = $conn->query($sql);  

?>

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p>Data Eveniment: " . $row['event_date'] . "</p>";
        
        // Display comments for each event
        $event_id = $row['id'];
        $comment_sql = "SELECT * FROM comments WHERE event_id = '$event_id'";
        $comment_result = $conn->query($comment_sql);
        
        echo "<h4>Comments:</h4>";
        if ($comment_result->num_rows > 0) {
            while ($comment_row = $comment_result->fetch_assoc()) {
                echo "<p>" . $comment_row['comment'] . "</p>";
            }
        } else {
            echo "<p>No comments yet.</p>";
        }

        // Comment form
        if (isset($_SESSION['user_id'])) {
            echo '<form method="POST" action="comment.php">
                    <input type="hidden" name="event_id" value="' . $event_id . '">
                    <textarea name="comment" required></textarea><br>
                    <button type="submit">Add Comment</button>
                  </form>';
        }
        echo "</div>";
    }
} else {
    echo "No events found.";
}

$conn->close();
?>
