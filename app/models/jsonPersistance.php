<?php

  include 'Task.php';

  class jsonPersistance implements jsonPersistanceInterface{

    protected Array $jsonArray = array();
    private $numTasksEliminate = 0;

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

    function deleteOneTask($id){
      $this->numTasksEliminate += 1;

      $originalPositionInArray = $this->searchTaskPosition($id);

      unset($this->jsonArray[$originalPositionInArray]);
      $this->jsonArray = array_values($this->jsonArray); //reordena los indices
      $this->putJson($this->jsonArray);
    }

    function asignId(){
      $numTasksHistory = count(array_merge($this->jsonArray, $this->numTasksEliminate));
      return $numTasksHistory;
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