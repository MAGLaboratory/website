<?php

if(!file_exists(__DIR__ . "/vendor/autoload.php")){
  fwrite(STDERR, "Missing src/vendor. Run composer install in src/ first (see README).\n");
  exit(1);
}
require __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . '/compilerlib/haml_compile.php';

$yieldFilter = new MtHaml\Filter\YieldContent();
$haml = new MtHaml\LayoutEnvironment('php', array('escape_attrs' => true, 'indent' => false), array('yield_content' => $yieldFilter));

define('TARGET', dirname(__DIR__) . '/home/protected/maglab/app/views');
chdir(__DIR__ . '/views');

saveDirectory();

