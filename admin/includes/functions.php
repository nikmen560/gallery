<?php 
spl_autoload_register(function ($class) {
    $class = strtolower($class);
    $path = "{$class}.php";
    if(file_exists($path)) {
        require_once($path);
    } else {
        die("file '{$class}.php' was not found");
    }
});

function redirect($location) {
    header("Location: /gallery/$location");
}

?>