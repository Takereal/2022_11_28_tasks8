<?php
Class Controller_Task Extends Controller_Base {
	
  public $layouts = 'edit_layouts';

  function index() {
    //print 'task';
    /*
    $model = new Model_Tasks();
    $tasks = $model->getTasks();
    $this->template->vars('tasks', $tasks);
    $this->template->view('index');
    */
  }

  function add() {

    if (!empty($_POST['discard'])) {

      header('Location: ./');
      exit;
    }
    
    $task = new Model_Task(0);
    $message = '';

    if (!empty($_POST['action']) && 'add' === $_POST['action']) {
      //
      // Actually add new task
      //
      $title = $_POST['title'];
      $description = $_POST['description'];
      $executor = $_POST['executor'];
      $deadline = $_POST['deadline'];
      $status = 'In Progress'; // default status

      $params = array('title' => $title, 'description' => $description, 'executor' => $executor, 
        'deadline' => $deadline, 'status' => $status);

      $result = $task->createTask( $params );

      if ( !empty($result) && preg_match('/^\d+$/', $result)) {
      
        $message = 'Done. Task #' . $result . ' added';
      }
      else {

        $message = 'Task not added. ' . $task->getErrorMessage();
      }
    }
      
    $this->template->vars('message', $message);
    $this->template->vars('task', $task);
    $this->template->view('add');
  }

  function edit() {

    if (!empty($_POST['discard'])) {

      header('Location: ./');
      exit;
    }
    if (empty($_GET['id']) || !preg_match('/^\d+$/', $_GET['id'])) {

      header('Location: ./');
      exit;
    }
    
    $id = (int)$_GET['id'];
    $task = new Model_Task($id);
    $message = '';

    if ( 'Done' == $task->status ) {
      // Already Done. Disable future editing
    }
    else {

      if (!empty($_POST['action']) && 'edit' === $_POST['action']) {
        //
        // Actually add new task
        //
        $title = $_POST['title'];
        $description = $_POST['description'];
        $executor = $_POST['executor'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];

        $params = array('title' => $title, 'description' => $description, 'executor' => $executor, 
          'deadline' => $deadline, 'status' => $status, 'id' => $id);

        $result = $task->updateTask( $params );

        if ( !empty($result) && preg_match('/^\d+$/', $result)) {
        
          $message = 'Done. Task #' . $id . ' updated';
        }
        else {

          $message = 'Task not updated. ' . $task->getErrorMessage();
        }

        $task = new Model_Task($id);
      }
    }
      
    $this->template->vars('message', $message);
    $this->template->vars('task', $task);
    $this->template->view('edit');
  }

  function deletetask() {

    if (empty($_GET['id']) || !preg_match('/^\d+$/', $_GET['id'])) {

      header('Location: ./');
      exit;
    }
    
    $id = (int)$_GET['id'];
    $task = new Model_Task($id);
    $result = $task->deleteTask();

    if ( !empty($result) && preg_match('/^\d+$/', $result)) {
    
      $message = 'Done. Task #' . $id . ' deleted';
    }
    else {

      $message = 'Task not deleted. ' . $task->getErrorMessage();
    }
      
    $this->template->vars('message', $message);
    $this->template->view('delete');
  }

}