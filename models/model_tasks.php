<?php
Class Model_Tasks {

  public function __construct() {

    $this->query = new Model_Query();
  }

  public function getTasks(){

    $list = array();
    $data = $this->query->loadAll('tasks', 'id');
    foreach ($data as $row) {

      $task = (object)$row;

      if ('Done' == $task->status) {

        $task->canEdit = false;
      }
      else {
        $task->canEdit = true;
      }

      $list[] = $task;
    }
    return $list;
  }	

}