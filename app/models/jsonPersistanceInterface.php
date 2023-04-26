<?php

interface jsonPersistanceInterface{

    public function getAllTasks();
    public function getOneTask($id);
    public function addTask(Task $task);
    public function asignId();
    public function eliminateTask(Task $task);
    public function putJson($tasks);
}


?>