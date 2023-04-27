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

    function getOneTask($id){ //busqueda por id
      return $this->jsonArray[$this->searchTaskPosition($id)];
    }

    function updateOneTask(Array $task):void{ //busqueda por posicion de la tarea

      $this->jsonArray[$this->searchTaskPosition($task[0])]['username'] = $task[1];
      $this->jsonArray[$this->searchTaskPosition($task[0])]['taskDescription'] = $task[2];
      $this->jsonArray[$this->searchTaskPosition($task[0])]['status'] = $task[3];
      $this->jsonArray[$this->searchTaskPosition($task[0])]['starterDate'] = $task[4];
      $this->jsonArray[$this->searchTaskPosition($task[0])]['finalDate'] = $task[5];

      $this->putJson($this->jsonArray);
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

    function searchTaskPosition($id){
      $position=0;
      $search=false;

      do{
        if($id == $this->jsonArray[$position]['id']){
          $search = true;
          return $position;
        }
        $position++;
      }while($search == false || ($position == count($this->jsonArray)-1));

      return $position;
    }

    function putJson($tasks){
      file_put_contents(dirname(__DIR__).'\..\web\json\jsonTasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
    }
  }

?>