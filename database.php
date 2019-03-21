<? 

/**
* @author: Andrea Abrudsky
*/

require_once "config.php";

class Database {
    
  protected $conexion;
  //Conect db
  public function databaseConect()
  {
    $this->conexion = new mysqli(HOST, USER, PASS, DBNAME);
    if (mysqli_connect_error()) {
        die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
  }

  //disconect db
  public function logout()
  {
    if ($this->conexion) {
        mysqli_close($this->conexion);
    }

  }
  //Select query db
  public function querySelect($query) {
  //  error_log("Query ::::".$query);
    $result = $this->conexion->query($query);
    while ( $row = $result->fetch_object() ) {
      $results[] = $row;
    }
    return json_encode($results);
    $this->logout();
  }

  //Update 
  public function queryUpdate($query) {
    $status="";
    $result = $this->conexion->query($query);
    $status=mysqli_affected_rows($this->conexion);
    $status=array("status"=>$status);
    return json_encode($status);
    $this->logout();
  }

  //Insert rows
  public function insertRows($table, $column, $values){
    $sql = 'INSERT INTO '.$table.'('.$column.') VALUES '.$values.';';
    //error_log('SQL   '.$sql);
    if ($this->conexion->query($sql) == 1) {
        echo "<script>alert('Los nuevos productos fueron creados')</script>";
    } else {
      //echo "Error: " . $sql . "<br>" . $this->conexion->error;
    }

    $this->logout();
    
  }
}

?>