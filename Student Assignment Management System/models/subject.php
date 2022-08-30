<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Subject
{
    private $id;
    private $cid;
    private $subjectfname;
    private $subjectshname;
    private $subjectcode;

    public function __construct($id, $cid, $subjectfname, $subjectshname, $subjectcode)
    {
        $this->id = $id;
        $this->cid = $cid;
        $this->subjectfname = $subjectfname;
        $this->subjectshname = $subjectshname;
        $this->subjectcode = $subjectcode;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getCid()
    {
        return $this->cid;
    }

    public function getSFName()
    {
        return $this->subjectfname;
    }

    public function getSSHName()
    {
        return $this->subjectshname;
    }
    public function getSCode()
    {
        return $this->subjectcode;
    }

    public function setId($id)
    {
         $this->id = $id;
    }

    public function setCid($cid)
    {
         $this->cid = $cid;
    }

    public function setSFName($sfname)
    {
        $this->subjectfname = $sfname;
    }

    public function setSSHName($subjectshname)
    {
        $this->subjectshname = $subjectshname;
    }
    public function setSCode($subjectcode)
    {
        $this->subjectcode = $subjectcode;
    }


}