<?php

  class Task{

    protected $id;
    protected $username;
    protected $taskDescription;
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
    protected function getTaskDescription(){
      return $this->taskDescription;
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
    public function setId($id){
      $this->id = $id;
    }
    public function setUsername($username){
      $this->username = $username;
    }
    public function setTaskDescription($taskDescription){
      $this->taskDescription = $taskDescription;
    }
    public function setStatus($status){
      $this->status = $status;
    }
    public function setStarterDate($starterDate){
      $this->starterDate = $starterDate;
    }
    public function setFinalDate($finalDate){
      $this->finalDate = $finalDate;
    }
  }

?>