<?php
date_default_timezone_set('America/Lima');
class Conexion
{
  private $conn;

  function __construct()
  {
    $host = 'localhost';
    $user = 'jersson';
    $pass = 'jersson';
    $db   = 'delivery';

    $this->conn = new mysqli($host, $user, $pass, $db);

    if ($this->conn->connect_errno) {
      echo "Error al contenctar a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error;
      exit();
    }

    #echo $this->conn->host_info . " ANTARES";
    return $this->conn;
  }

  public function ConsultaSin($sql)
  {
    # Sirve para: INSERT, UPDATE, DELETE
    try {
      $this->conn->query($sql);
      $res = TRUE;
    } catch (Exception $e) {
      echo 'Excepción: ',  $e->getMessage();
      $res = FALSE;
    }

    return $res;
    mysqli_close($this->conn);
  }

  function ConsultaCon($sql)
  {
    # Sirve para: SELECT
    try {
      $result = $this->conn->query($sql);
    } catch (Exception $e) {
      echo 'Excepción: ',  $e->getMessage();
    }

    return $result;
    mysqli_close($this->conn);
  }

  function ConsultaArray($sql)
  {
    # Sirve para: SELECT convertido en array
    try {
      $result = $this->conn->query($sql);
    } catch (Exception $e) {
      echo 'Excepción: ',  $e->getMessage();
    }

    $data = $result->fetch_array (MYSQLI_ASSOC);
    return $data;
    mysqli_close($this->conn);
  }
}
