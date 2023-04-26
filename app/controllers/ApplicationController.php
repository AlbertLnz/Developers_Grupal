<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
	
  private $persistenciaJson;

  public function __construct(){
    $this->persistenciaJson = new jsonPersistance();
  }

	public function indexAction(){
		$this->view->allTasks = $this->persistenciaJson->getAllTasks();
	}

  public function viewOneTaskAction(){
    $this->view->oneTask = $this->persistenciaJson->getOneTask($_POST['task']);
  }

}
