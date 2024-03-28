<?php

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