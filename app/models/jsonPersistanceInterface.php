<?php

interface jsonPersistanceInterface{

    public function getAllTasks();
    public function getOneTask($id);
    public function addTask(Task $task);
    public function asignId();
    public function deleteOneTask($id);
    public function searchTaskPosition($id);
    public function putJson($tasks);
}


?>