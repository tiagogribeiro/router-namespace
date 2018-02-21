<?php
require '../src/bootstrap.php';

use Router\WorkSpaceRepository;

echo "<h1>Create tables.</h1>";
\Router\Model\WorkSpace\WorkSpaceRepository::install();

echo "<h2> Permitir leitura e escrita em: </h2>";
echo "public/storage </br>";
echo "logs </br>";
