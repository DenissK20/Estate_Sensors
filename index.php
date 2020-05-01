<?php
require 'models.php';

$app = new \atk4\ui\App('Ielogoties sistēmā');
$app->initLayout('Centered');


$users = new Users($db);
$users_login = new Users_login($db);
  $form = $app->layout->add('Form');
$form->setModel(new Users_login($db),['login','password']);
$form->buttonSave->set('Sign in');
$form->onSubmit(function($form) use ($users_login) {
  $users_login->tryLoadBy('login',$form->model['login']);
  If ($users_login['password'] == $form->model['password']) {
    If ($users['user_type'] = 88) {
      return new \atk4\ui\jsExpression('document.location="admin.php"');
    } else {
      $_SESSION['users_login_id'] = $users_login->id;
      return new \atk4\ui\jsExpression('document.location="main.php"');
    }
  } else {
    $users_login->unload();
    $er = (new \atk4\ui\jsNotify('No such user.'));
    $er->setColor('red');
    return $er;
  }
});
