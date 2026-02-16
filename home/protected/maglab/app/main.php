<?php

// Suppress deprecation warnings to prevent output buffer issues
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 0);

require __DIR__ . '/../config/config.php';
require __DIR__ . "/../vendor/autoload.php";
#require __DIR__ . "/../lib/mthaml/Runtime/AttributeList.php";
#require __DIR__ . "/../lib/mthaml/Runtime/AttributeInterpolation.php";
#require __DIR__ . "/../lib/mthaml/Runtime.php";

$app = new \Slim\App();

$static_controller = new Controllers\Main\Primary($app);

$app->run();
