<?php
require 'models.php';

$app = new \atk4\ui\App('Ielogoties sistēmā');
$app->initLayout('Centered');



$user_login = new Users_login($db);
  $form = $app->layout->add('Form');
$form->setModel(new Users_login($db),['login','password']);
$form->buttonSave->set('Sign in');
$form->onSubmit(function($form)  {
  $users_login->tryLoadBy('login',$form->model['login']);
  If ($users_login['password'] == $form->model['password']) {
    $_SESSION['user_login_id'] = $users_login->id;
    return new \atk4\ui\jsExpression('document.location="main.php"');
  } else {
    $person->unload();
    $er = (new \atk4\ui\jsNotify('No such user.'));
    $er->setColor('red');
    return $er;
  }
});
