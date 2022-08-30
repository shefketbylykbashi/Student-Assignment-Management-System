<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("user.php");

class teacher extends user
{

  private $empId;
  private $gender;
  private $dob;
  private $adresa;
  private $cid;

  public function __construct($id, $fullname, $mobilenumber, $email, $password, $empId, $gender, $dob, $adresa, $cid)
  {
    parent::__construct($id, $fullname, $mobilenumber, $email, $password);
    $this->empId = $empId;
    $this->gender = $gender;
    $this->dob = $dob;
    $this->adresa = $adresa;
    $this->cid = $cid;
  }

  public function getEmpId()
  {
    return $this->empId;
  }

  public function setEmpId($empId)
  {
    $this->empId = $empId;

    return $this;
  }

  public function getGender()
  {
    return $this->gender;
  }

  public function setGender($gender)
  {
    $this->gender = $gender;
  }

  public function getDOB()
  {
    return $this->dob;
  }

  public function setDob($dob)
  {
    $this->dob = $dob;
  }

  public function getAdresa()
  {
    return $this->adresa;
  }

  public function setAdresa($adresa)
  {
    $this->adresa = $adresa;
  }

  public function getCid(){
    return $this->cid;
  }

  public function setCid($cid){
    $this->cid = $cid;
  }
}