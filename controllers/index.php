<?php
Class Controller_Index Extends Controller_Base {
	
  public $layouts = 'first_layouts';

  function index() {
    $model = new Model_Tasks();
    $tasks = $model->getTasks();
    $message = '';
    $this->template->vars('tasks', $tasks);
    $this->template->vars('message', $message);
    $this->template->view('index');
  }

}