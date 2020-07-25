<?php

// Load Config
require_once '../app/config/config.php';

// Autoload Libraries
spl_autoload_register(function ($libraryFileName) {
  require_once '../app/libraries/' . $libraryFileName . '.php';
});
