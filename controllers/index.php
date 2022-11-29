<?php
Class Controller_Index Extends Controller_Base {
	
  public $layouts = 'first_layouts';

  function index() {
    $model = new Model_Tasks();
    if (!empty($_GET['sortby']) && in_array($_GET['sortby'], array('executor', 'deadline', 'donedate', 'status'))) {

      $model->setSortby($_GET['sortby']);
    }
    if (!empty($_GET['sortdir']) && in_array($_GET['sortdir'], array('ASC', 'DESC'))) {

      $model->setSortDirection($_GET['sortdir']);
    }
    $tasks = $model->getTasks();
    $message = '';
    $this->template->vars('sortby', $model->getSortby());
    $this->template->vars('sortdir', $model->getSortDirection());

    $this->template->vars('tasks', $tasks);
    $this->template->vars('message', $message);
    $this->template->view('index');
  }

}