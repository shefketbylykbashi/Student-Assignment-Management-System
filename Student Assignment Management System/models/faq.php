<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class faq {

  private $id;
  private $question;
  private $answer;

  public function __construct($id, $question , $answer)
  {
    $this-> id = $id;
    $this->question = $question;
    $this->answer = $answer;
  }


  public function getId()  {
      return $this->id;
  }

  public function getQuestion() {
    return $this-> question;
  }

  public function  getAnswer() {
    return $this->answer;
  }


  public function setId($id)  {
    $this->id = $id;
}

public function setQuestion($question) {
   $this-> question = $question;
}

public function setAnswer($answer) {
   $this->answer = $answer;
}




}