<?php 
class calendario {

  protected $db_query;
  protected $db_result;
  protected $db_row;

  // Listado de eventos
  public function listado($connection) {
    $this -> connection = $connection;
    $this -> db_query = "SELECT * FROM courses";

    try {
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_array = array();
      $i = 0;

      while($db_row = $db_result -> fetch(PDO::FETCH_BOTH)) {
        $db_array[$i] = $db_row;
        $i++;
      }

      echo json_encode(array("success" => 1, "result" => $db_array));

      $db_result -> CloseCursor();

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }

  // Nuevo evento
  public function nuevo($connection) {
    $this -> connection = $connection;

    $this -> db_query = "INSERT INTO courses (name, description, date_start, date_end, active,  start, end) VALUES (:name, :description,  :date_start, :date_end, :active, :start, :end)";

    $inicio = strtotime(substr($_REQUEST["start"], 6, 4) . "-" . substr($_POST["start"], 3, 2) . "-" . substr($_POST["start"], 0, 2) . " "  . substr($_POST["start"], 10, 6)) * 1000;

    $final  = strtotime(substr($_POST["end"], 6, 4)."-" . substr($_POST["end"], 3, 2) . "-" . substr($_POST["end"], 0, 2) . " " . substr($_POST["end"], 10, 6)) * 1000;

    $link = $url. "/views/modulos/evento-detalles.php";

    try {
      $db_result = $connection -> prepare($this -> db_query);

      $db_result -> bindValue(":name", $_POST['title']);
      $db_result -> bindValue(":description", $_POST["body"]);
      $db_result -> bindValue(":active", 1);
      $db_result -> bindValue(":class", $_POST["class"]);
      $db_result -> bindValue(":start", $inicio);
      $db_result -> bindValue(":end", $final);
      $db_result -> bindValue(":start_normal", $_POST["start"]);
      $db_result -> bindValue(":end_normal", $_POST["end"]);

      $db_result -> execute();

      $this -> db_query = "SELECT MAX(id_course) AS id_course FROM courses";
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_file = $db_result -> fetch(PDO::FETCH_ASSOC);
      $id_event = $db_file['id'];

      $link = $url. "/views/modulos/evento-detalles.php?id=$id_event";

      $this -> db_query = "UPDATE courses SET name = '$link' WHERE id_course = '$id_event'";
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_result -> CloseCursor();

      header("location:index.php?nuevo=ok"); 

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }

  // Eliminar evento
  public function eliminar($connection) {
    $this -> connection = $connection;
    $this -> db_query ="DELETE FROM courses WHERE id_courses = :id";

    try {
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> bindValue(":id", $_GET["id"]);
      $db_result -> execute();

      $db_result -> CloseCursor();

      header("location:index.php?eliminar=ok");

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }
}