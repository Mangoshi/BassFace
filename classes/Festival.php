<?php
class Festival {
  public $id;
  public $title;
  public $description;
  public $location;
  public $start_date;
  public $end_date;
  public $contact_name;
  public $contact_email;
  public $contact_phone;
  public $image_id;

  public function __construct() {
    $this->id = null;
  }

  public function save() {
    try {
      $db = new DB();
      $db->open();
      $conn = $db->get_connection();

      $params = [
          ":name" => $this->name,
          ":description" => $this->description,
          ":location" => $this->location,
          ":start_date" => $this->start_date,
          ":end_date" => $this->end_date,
          ":contact_name" => $this->contact_name,
          ":contact_email" => $this->contact_email,
          ":contact_phone" => $this->contact_phone,
          ":image_id" => $this->image_id
      ];
      $sql = "INSERT INTO festivals (" .
          "name, description, location, start_date, end_date, contact_name, contact_email, contact_phone, image_id" .
          ") VALUES (" .
          ":name, :description, :location, :start_date, :end_date, :contact_name, :contact_email, :contact_phone, :image_id" .
          ")";
      $stmt = $conn->prepare($sql);
      $status = $stmt->execute($params);

      if(!$status) {
        $error_info = $stmt->errorInfo();
        $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
        throw new Exception("Database error executing database query: " . $message);
      }

      if ($stmt->rowCount() !== 1) {
        throw new Exception("Failed to save festival.");
      }

      if ($this->id === null) {
        $this->id = $conn->lastInsertId();
      }
    }
    finally {
      if ($db !== null && $db->is_open()) {
        $db->close();
      }
    }
  }

  public function delete() {
    throw new Exception("Not yet implemented");
  }

  public static function findAll() {
    $festivals = array();

    try {
      $db = new DB();
      $db->open();
      $conn = $db->get_connection();

      $select_sql = "SELECT * FROM festivals";
      $select_stmt = $conn->prepare($select_sql);
      $select_status = $select_stmt->execute();

      if (!$select_status) {
        $error_info = $select_stmt->errorInfo();
        $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
        throw new Exception("Database error executing database query: " . $message);
      }

      if ($select_stmt->rowCount() !== 0) {
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        while ($row !== FALSE) {
          $festival = new Festival();
          $festival->id = $row['id'];
          $festival->title = $row['title'];
          $festival->description = $row['description'];
          $festival->location = $row['location'];
          $festival->start_date = $row['start_date'];
          $festival->end_date = $row['end_date'];
          $festival->contact_name = $row['contact_name'];
          $festival->contact_email = $row['contact_email'];
          $festival->contact_phone = $row['contact_phone'];
          $festival->image_id = $row['image_id'];
          $festivals[] = $festival;

          $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        }
      }
    }
    finally {
      if ($db !== null && $db->is_open()) {
        $db->close();
      }
    }

    return $festivals;
  }

  public static function findById($id) {
    $festival = null;

    try {
      $db = new DB();
      $db->open();
      $conn = $db->get_connection();

      $select_sql = "SELECT * FROM festivals WHERE id = :id";
      $select_params = [
          ":id" => $id
      ];
      $select_stmt = $conn->prepare($select_sql);
      $select_status = $select_stmt->execute($select_params);

      if (!$select_status) {
        $error_info = $select_stmt->errorInfo();
        $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
        throw new Exception("Database error executing database query: " . $message);
      }

      if ($select_stmt->rowCount() !== 0) {
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
          $festival = new Festival();
          $festival->id = $row['id'];
          $festival->title = $row['title'];
          $festival->description = $row['description'];
          $festival->location = $row['location'];
          $festival->start_date = $row['start_date'];
          $festival->end_date = $row['end_date'];
          $festival->contact_name = $row['contact_name'];
          $festival->contact_email = $row['contact_email'];
          $festival->contact_phone = $row['contact_phone'];
          $festival->image_id = $row['image_id'];
      }
    }
    finally {
      if ($db !== null && $db->is_open()) {
        $db->close();
      }
    }

    return $festival;
  }
}
?>
