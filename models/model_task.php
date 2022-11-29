<?php
Class Model_Task {

  public $id;
  public $title;
  public $executor;
  public $description;
  public $deadline;
  public $status;

  //private $data;
  private $errors = array();

  private $executors = array('Alex', 'John', 'Ivanov', 'Sidorov');
  private $statuses = array('In Progress', 'Done');

  public function __construct($id)
  {
    $this->table_name = 'tasks';
    $this->primary_key = 'id';
    $this->query = new Model_Query();

    if ($id > 0) {

      $this->getTask( $id );
    }

    $this->all_executors = $this->executors;
    $this->all_statuses = $this->statuses;

    $this->errors = array();
  }

  public function createTask( $params = array() ) {

    if (empty($params['title'])) {

      $this->errors[] = 'Please, input Title.';
    }
    if (empty($params['description'])) {

      $this->errors[] = 'Please, input Description.';
    }
    if (empty($params['executor'])) {

      $this->errors[] = 'Please, input Executor.';
    }
    if (empty($params['deadline'])) {

      $this->errors[] = 'Please, input Deadline.';
    }
    if (empty($params['status'])) {

      $this->errors[] = 'Please, input Status.';
    }

    if (!empty($this->errors)) { return 0; }

    $sql = 'INSERT INTO `' . $this->table_name . '` (`title`, `description`, `executor`, `deadline`, `status`) 
    VALUES(:title, :description, :executor, :deadline, :status)';

    $status = 'In Progress'; // default status;

    $data = array(':title' => $params['title'], ':description' => $params['description'], ':executor' => $params['executor'], 
    ':deadline' => $params['deadline'], ':status' => $params['status']);

    $result = $this->query->insert($sql, $data);

    return $result;
  }

  public function updateTask( $params = array() ) {

    if (empty($params['title'])) {

      $this->errors[] = 'Please, input Title.';
    }
    if (empty($params['description'])) {

      $this->errors[] = 'Please, input Description.';
    }
    if (empty($params['executor'])) {

      $this->errors[] = 'Please, input Executor.';
    }
    if (empty($params['deadline'])) {

      $this->errors[] = 'Please, input Deadline.';
    }
    if (empty($params['status'])) {

      $this->errors[] = 'Please, input Status.';
    }

    if (!empty($this->errors)) { return 0; }

    $data = array(':title' => $params['title'], ':description' => $params['description'], ':executor' => $params['executor'], 
    ':deadline' => $params['deadline'], ':status' => $params['status'], ':id' => $params['id']);

    if ('Done' == $params['status']) {

      $sql = 'UPDATE `' . $this->table_name . '` SET 
      `title` = :title, 
      `description` = :description, 
      `executor` = :executor, 
      `deadline` = :deadline, 
      `donedate` = :donedate,
      `status` = :status
       WHERE `id` = :id';

      $data['donedate'] = date('Y-m-d');
    }
    else {

      $sql = 'UPDATE `' . $this->table_name . '` SET 
      `title` = :title, 
      `description` = :description, 
      `executor` = :executor, 
      `deadline` = :deadline, 
      `status` = :status
       WHERE `id` = :id';
    }

    $result = $this->query->update($sql, $data);

    return $result;
  }

  public function getTask( $id ) {

    $data = $this->query->loadSingle('tasks', 'id', $id);

    if (!empty($data)) {
      $this->id = $data['id'];
      $this->title = $data['title'];
      $this->executor = $data['executor'];
      $this->description = $data['description'];
      $this->deadline = $data['deadline'];
      $this->donedate = $data['donedate'];
      $this->status = $data['status'];
    }

    return $this;
  }

  public function getErrorMessage() {

    return implode(', ', $this->errors);
  }

  public function deleteTask() {

    $sql = 'DELETE FROM `' . $this->table_name . '` WHERE id = :id';
    $data = array(':id' => $this->id);

    $result = $this->query->deleteRecord($sql, $data);
    return $result;
  }
}