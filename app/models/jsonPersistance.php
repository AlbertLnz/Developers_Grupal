<?php

  include 'Task.php';

  class jsonPersistance implements jsonPersistanceInterface{

    protected Array $jsonArray = array();
    private Array $numTasksEliminate = array();

    function __construct(){
      if(file_exists(dirname(__DIR__).'\..\web\json\task_table.json')){
        $this->jsonArray = json_decode(file_get_contents(dirname(__DIR__).'\..\web\json\task_table.json'), true);
      }
    }

    function getAllTasks(){
      return $this->jsonArray;
    }

    function getOneTask($id){
      $task = new Task();
      $position=0;
      $search=false;

      do{
        if($this->jsonArray[$position]->id == $id){
          $task = $this->jsonArray[$position];
          $search = true;
        }
      }while($search == false || ($position == count($this->jsonArray)-1));

      return $task;
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
      return $numTasksEliminate;
    }

    function putJson($tasks){
      file_put_contents(dirname(__DIR__).'\..\web\json\task_table.json', json_encode($tasks, JSON_PRETTY_PRINT));
    }
  }

?>