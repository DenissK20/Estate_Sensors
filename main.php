<?php
require 'models.php';

$app = new \atk4\ui\App('Darbības');
$app->initLayout('Centered');

$button = $app->add(['Button','Log out','blue']);
$button->link('index.php');
