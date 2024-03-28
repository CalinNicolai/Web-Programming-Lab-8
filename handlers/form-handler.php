<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $comment = $_POST['comment'] ?? '';
    $data = "$name: $comment\n";
    file_put_contents('./comments.txt', $data, FILE_APPEND);
    header("Location: /index.php");
    exit;
}
?>
