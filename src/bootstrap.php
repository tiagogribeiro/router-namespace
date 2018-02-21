<?php
require '../vendor/autoload.php';

require __DIR__.'/settings.php';

$app = new \Slim\App($settings);

require __DIR__.'/container.php';
require __DIR__.'/middleware.php';
