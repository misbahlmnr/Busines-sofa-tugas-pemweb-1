<?php
require_once 'Database.php';
class Crud extends Database {
  // function get
  public function get($table, $conditions = []) {
    $where = "";
    if (!empty($conditions)) {
      $where = "WHERE " . implode(" AND ", $conditions);
    }
    $sql = "SELECT * FROM $table $where";
    $stmt = $this->koneksi->prepare($sql);
    $stmt->execute();
    return $stmt;
  }

  // function post
  public function post($table, $data) {
    $fields = implode(", ", array_keys($data));
    $placeholders = ":" . implode(", :", array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
    $stmt = $this->koneksi->prepare($sql);
    foreach ($data as $key => $value) {
      $stmt->bindValue(":$key", $value);
    }
    return $stmt->execute();
  }

  // function put
  public function put($table, $data, $conditions) {
    $set = "";
    $where = "";
    if (!empty($data)) {
      $set = "SET " . implode(", ", array_map(function($key) {
        return "$key = :$key";
      }, array_keys($data)));
    }
    if(!empty($conditions)) {
      $where = "WHERE " . implode(" AND ", $conditions); 
    }

    $sql = "UPDATE $table $set $where";

    $stmt = $this->koneksi->prepare($sql);
    foreach($data as $key => $value) {
      $stmt->bindValue(":$key", $value);
    }
    return $stmt->execute();
  }

  public function delete($table, $conditions) {
    $where = "";
    if (!empty($conditions)) {
        $where = "WHERE " . implode(" AND ", $conditions);
    }
    $sql = "DELETE FROM $table $where";
    $stmt = $this->koneksi->prepare($sql);
    return $stmt->execute();
}
}