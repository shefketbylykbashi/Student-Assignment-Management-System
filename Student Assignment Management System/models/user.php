<?php

abstract class user
{
  protected $id;
  protected $fullname;
  protected $mobilenumber;
  protected $email;
  protected $password;


  public function __construct($id, $fullname, $mobilenumber, $email, $password)
  {
    $this->id = $id;
    $this->fullname = $fullname;
    $this->mobilenumber = $mobilenumber;
    $this->email = $email;
    $this->password = $password;
  }

  public function getId(){
    return $this->id;
  }

  public function getFName(){
    return $this->fullname;
  }

  public function getMobNr(){
    return $this->mobilenumber;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getPwd(){
    return $this->password;
  }


  public function setId($id){
     $this->id = $id;
  }

  public function setFName($fname){
     $this->fullname = $fname;
  }

  public function setMobNr($mobnr){
    $this->mobilenumber = $mobnr;
  }


  public function setEmail($email){
    $this->email = $email;
  }

  public function setPwd($password){
     $this->password = $password;
  }

  
}