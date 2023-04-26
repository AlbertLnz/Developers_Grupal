<?php

  include 'Task.php';

  class jsonPersistance implements jsonPersistanceInterface{

    protected Array $jsonArray = array();
    private Array $numTasksEliminate = array();

    function __construct(){
      if(file_exists(dirname(__DIR__).'\..\web\json\jsonTasks.json')){
        $this->jsonArray = json_decode(file_get_contents(dirname(__DIR__).'\..\web\json\jsonTasks.json'), true);
      }
    }

    function getAllTasks(){
      return $this->jsonArray;
    }

    function getOneTask($id){
      $position=0;
      $search=false;

      do{
        if($id == $this->jsonArray[$position]['id']){
          $search = true;
          return $this->jsonArray[$position];
        }
        $position++;
      }while($search == false || ($position == count($this->jsonArray)-1));
      
      return null;
    }

    function addTask(Task $task){
      $task->id = $this->asignId(); //public id (meh...)
      array_push($this->jsonArray, $task);
      $this->putJson($this->jsonArray);
    }

    function asignId(){
      $numTasksHistory = count(array_merge($this->jsonArray, $this->numTasksEliminate));
      return $numTasksHistory;
    }

    function eliminateTask(Task $task){
      $numTasksEliminate = array_push($numTasksEliminate, "1");
      unset($this->jsonArray[$task]);
      $this->putJson($this->jsonArray);
      return $numTasksEliminate;
    }

    function putJson($tasks){
      file_put_contents(dirname(__DIR__).'\..\web\json\jsonTasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
    }
  }

?>