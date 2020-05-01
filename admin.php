<?php
require 'models.php';

$app = new \atk4\ui\App('Admin');
$app->initLayout('Centered');

$button = $app->add(['Button','Log out','blue']);
$button->link('index.php');
