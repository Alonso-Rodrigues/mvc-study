<?php
// autoload - responsible for automatically loading classes
// the spl_autoload_register() function registers any number of autoloaders, allowing classes and interfaces to be loaded automatically
spl_autoload_register(function ($class) {
    // List of directories to search for classes
    $directories = [
        'library',
        'helpers'
    ];
    // Go through the directories looking for classes
    foreach ($directories as $directory) {
        // The constant __DIR__ returns the file directory
        // DIRECTORY_SEPATOR is the separator used to browse directories
        $file = (__DIR__ . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $class . '.php');
        // Checks if the class file exists
        if (file_exists($file)) :
            // Includes the file
            require_once $file;
        endif;
    }
});
