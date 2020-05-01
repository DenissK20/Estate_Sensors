<?php
require 'models.php';

$app = new \atk4\ui\App('Ielogoties sistēmā');
$app->initLayout('Centered');

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=estatesensors;host=localhost','root','');

$user_login = new User_login($db);
  $form = $app->layout->add('Form');
$form->setModel(new User_login($db),['login','password']);
$form->buttonSave->set('Sign in');
$form->onSubmit(function($form) use ($user_login) {
  $user_login->tryLoadBy('login',$form->model['login']);
  If ($user_login['password'] == $form->model['password']) {
    $_SESSION['user_login_id'] = $user_login->id;
    return new \atk4\ui\jsExpression('document.location="main.php"');
  } else {
    $person->unload();
    $er = (new \atk4\ui\jsNotify('No such user.'));
    $er->setColor('red');
    return $er;
  }
});
