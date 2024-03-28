<?php

class Page {
    /**
     *  This function will display component that was transmitted by name of file in ./views/components
     * @param string $name of component's file
     * @return void
     */
    public static function part($name) {
        $path = "./views/components/{$name}.php";
        if(file_exists($path)) {
            include $path;
        } else {
            echo "Компонент {$name} не найден";
        }
    }
}