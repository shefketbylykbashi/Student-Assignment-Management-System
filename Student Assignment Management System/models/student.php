<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("user.php");

class student extends user
{

  private $rollnumber;
  private $cid;

  public function __construct($id, $fullname, $mobilenumber, $email, $password, $rollnumber, $cid)
  {
    parent::__construct($id, $fullname, $mobilenumber, $email, $password);
    $this->rollnumber = $rollnumber;
    $this->cid = $cid;
  }

  public function getRollNr()
  {
    return $this->rollnumber;
  }

  public function setRollNr($rollnumber)
  {
    $this->rollnumber = $rollnumber;
  }

  public function getCid(){
    return $this->cid;
  }

  public function setCid($cid){
    $this->cid = $cid;
  }

}