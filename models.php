<?php
require 'vendor/autoload.php';

session_start();

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=estatesensors;host=localhost','root','');

class Users extends \atk4\data\Model {
  public $table = 'users';
function init() {
  parent::init();
  $this->addField('first_name');
  $this->addField('last_name');
  $this->addField('user_type');
  $this->hasOne('users_login_id', new Users_login);

}
}

class Users_login extends \atk4\data\Model {
  public $table = 'users_login';
function init() {
  parent::init();
  $this->addField('login');
  $this->addField('password',['type'=>'password']);
  $this->addField('is_active');

}
}
