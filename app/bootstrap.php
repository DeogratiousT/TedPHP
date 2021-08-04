<?php
    // Load Config Files
    require_once 'config/config.php';
    require_once 'config/database.php';

    // Autoload Libraries
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });