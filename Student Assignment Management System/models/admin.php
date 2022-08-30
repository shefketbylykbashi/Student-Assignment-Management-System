<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("user.php");

class admin extends user
{

  private $username;
  

  public function __construct($id, $fullname, $mobilenumber, $email, $password, $username)
  {
    parent::__construct($id, $fullname, $mobilenumber, $email, $password);
    $this->username = $username;
  }

  public function getUsername(){
    return $this->username;
  }

  public function setUsername($username){
    $this->username = $username;
  }

}