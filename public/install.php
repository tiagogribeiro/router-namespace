<?php
require '../bootstrap.php';

use Router\WorkSpaceRepository;
use Router\ServerRepository;

echo "<h1>Create tables.</h1>";
WorkSpaceRepository::create();
ServerRepository::create();
