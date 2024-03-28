<?php
/**
 * This script handles form submissions and appends the submitted data to a comments.txt file.
 * If the request method is POST, it retrieves the name and comment fields from the form data,
 * appends them to the comments.txt file, and redirects the user to the index.php page.
 */

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the name and comment fields from the form data, or use an empty string if they are not set
    $name = $_POST['name'] ?? '';
    $comment = $_POST['comment'] ?? '';

    $errors = [];

    // Validate name to not contain numbers or special characters and be less than 30 characters
    if (!preg_match('/^[a-zA-Z ]{1,30}$/', $name)) {
        $errors[] = "Name should contain only letters and spaces, be less than 30 characters.";
    }

    // Validate comment to be at least 10 characters long
    if (strlen($comment) < 10) {
        $errors[] = "Comment should be at least 10 characters long.";
    }

    // Validate that the same user has not left more than one comment
    $comments = file_get_contents('./comments.txt');
    $lines = explode("\n", $comments);
    foreach ($lines as $line) {
        if (strpos($line, $name) !== false) {
            $errors[] = "You have already left a comment.";
            break;
        }
    }

    if (empty($errors)) {
        // Create a string with the name and comment, separated by a colon and a space
        $data = "$name: $comment\n";

        // Append the data to the comments.txt file
        file_put_contents('./comments.txt', $data, FILE_APPEND);

        // Redirect the user to the index.php page
        header("Location: /index.php");
        exit;
    } else {
        // Handle validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}