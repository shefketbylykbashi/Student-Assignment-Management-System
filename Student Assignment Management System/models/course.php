<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Course
{
    private $cid;
    private $branch;
    private $coursename;


    public function __construct($cid, $branch, $coursename)
    {
        $this->cid = $cid;
        $this->branch = $branch;
        $this->coursename = $coursename;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBranch()
    {
        return $this->branch;
    }

    public function getCourseName()
    {
        return $this->coursename;
    }

    public function setId($id)
    {
         $this->id = $id;
    }

    public function setBranch($branch)
    {
         $this->branch = $branch;
    }

    public function setCourseName($coursename)
    {
        $this->coursename = $coursename;
    }



}