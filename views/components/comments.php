<?php
$comments = file_get_contents('./handlers/comments.txt');
$commentsArray = explode("\n", $comments);
echo "<div style='width: 75%; margin: 0 auto;'>"; // Обернуть вывод в div и задать ширину 75% и автоматическое центрирование
foreach ($commentsArray as $comment) {
    if (!empty($comment)) {
        echo "<div class='card mb-2' style='border-radius: 10px;'><div class='card-body'>$comment</div></div>"; // Добавить стиль для скругленных рамок
    }
}
echo "</div>"; // Закрыть обертку
?>
