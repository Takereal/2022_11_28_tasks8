<?php
Class Model_Tasks {

  private $sortby;
  private $direction;

  public function __construct() {

    $this->query = new Model_Query();
    $this->sortby = 'id';
    $this->direction = 'ASC';
  }

  public function setSortby( $sortby ) {

    $this->sortby = $sortby;
  }
  public function setSortDirection( $direction ) {

    $this->direction = $direction;
  }
  public function getSortby() {

    return $this->sortby;
  }
  public function getSortDirection() {

    return $this->direction;
  }

  public function getTasks(){

    $list = array();
    $data = $this->query->loadAll('tasks', $this->sortby, $this->direction);
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