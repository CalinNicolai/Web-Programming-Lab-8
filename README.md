Отчет по Восьмой лабораторной работе
===================================

1\. Инструкции по запуску проекта
---------------------------------

1. Клонируйте репозиторий:

   ```bash 
   git clone https://github.com/CalinNicolai/Web-Programming-Lab-8
   ```

2. Откройте проект в вашей среде разработки (например, PhpStorm).
3. Запустите сервер командой
   ```bash
   php -S localhost:8000
   ```

2\. Описание проекта
--------------------

В данной лабораторной работе были изучены механизмы работы в многокомпонентном проекте на языке PHP.

3\. Класс для подключения компонентов
---------------------------------------

```php
class Page {
    /**
     * Display the component specified by the file name in the ./views/components directory.
     *
     * @param string $name The name of the component's file
     * @return void
     */
    public static function part($name) {
        $path = "./views/components/{$name}.php";
        if(file_exists($path)) {
            include $path;
        } else {
            echo "Component {$name} not found";
        }
    }
}
```

4\. Проверка заполнения формы
---------------------------------

### Страница `./handlers/form-handler`

```php
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
```

5\. Основной файл `index.php` с подключениями
---------

```php
// Include the class that allows rendering components
require_once("./handlers/Page.php");

// Render the header component
Page::part("header");

// Render the form component
Page::part("form");

// Render the comments component
Page::part("comments");

// Render the footer component
Page::part("footer");

```

6\. Вывод
---------
В результате выполнения лабораторной работы был успешно получен начальный навык работы с компонентами в PHP проекте.
