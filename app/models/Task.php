<?php

  class Task{

    public $id;
    protected $username;
    protected $status;
    protected $starterDate;
    protected $finalDate;

    //GETTER'S
    protected function getId(){
      return $this->id;
    }
    protected function getUsername(){
      return $this->username;
    }
    protected function getStatus(){
      return $this->status;
    }
    protected function getStarterDate(){
      return $this->starterDate;
    }
    protected function getFinalDate(){
      return $this->finalDate;
    }

    //SETTER'S
    public function setUsername($username){
      $this->username = $username;
    }
    protected function setStatus($status){
      $this->status = $status;
    }
    protected function setStarterDate($starterDate){
      $this->starterDate = $starterDate;
    }
    protected function setFinalDate($finalDate){
      $this->finalDate = $finalDate;
    }
  }

?>