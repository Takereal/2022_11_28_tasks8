<?php

class Model_Query
{
  private $db;

  public function __construct()
  {
     $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

     //print "\n" . '<br/>$this->table_name = ' . $this->table_name; exit;
  }

  public function query($sql, $data = array())
  {
    $query = $this->db->prepare($sql);
    $query->execute($data);
    return $query->fetchAll();
  }
  public function insert($sql, $data = array())
  {
    $query = $this->query($sql, $data);
    return $this->db->lastInsertId();
  }
  public function update($sql, $data = array())
  {
    $query = $this->db->prepare($sql);
    $query->execute($data);

    return $query->rowCount();
  }
  public function deleteRecord($sql, $data = array())
  {
    $query = $this->db->prepare($sql);
    $query->execute($data);

    return $query->rowCount();
  }

  public function loadSingle($table_name, $primary_key, $id)
  {

    $sql = "SELECT * FROM $table_name WHERE `" . $primary_key . "` = " . (int)$id;
    $rows = $this->query($sql);
    if (!empty($rows) && is_array($rows)) {

      return $rows[0];
    }
    return array();
  }

  public function loadAll($table_name, $sortby, $direction = 'ASC')
  {

    $sql = "SELECT * FROM $table_name ORDER BY `" . $sortby . "` " . $direction;
    return $this->query($sql);
  }
} 