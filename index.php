<?php
require 'models.php';

$app = new \atk4\ui\App('Ielogoties sistēmā');
$app->initLayout('Centered');

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=estatesensors;host=localhost','root','');
