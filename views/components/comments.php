<?php
/**
 * This script reads comments from a file and displays them in a styled card format.
 */

// Read comments from the file
$comments = file_get_contents('./handlers/comments.txt');

// Split the comments into an array
$commentsArray = explode("\n", $comments);

// Wrap the output in a div and set the width to 75% and automatic centering
echo "<div style='width: 75%; margin: 0 auto;'>";

// Loop through each comment
foreach ($commentsArray as $comment) {
    // Skip empty comments
    if (!empty($comment)) {
        // Display the comment in a styled card
        echo "<div class='card mb-2' style='border-radius: 10px;'><div class='card-body'>$comment</div></div>";
    }
}

// Close the wrapper div
echo "</div>";