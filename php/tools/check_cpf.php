<?php
  require_once("../config/config.php");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");

  $data = json_decode(file_get_contents("php://input"));
  if(!empty($data -> cpf)){
    $cpf = $data -> cpf;
    $cpf = str_replace(array('.', '-'), '', $cpf);
    $sql = "SELECT * FROM users WHERE cpf = '$cpf'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row)) {
      echo json_encode(array("status" => "error", "message" => true, "text" => "CPF já cadastrado"));
    } else {
      echo json_encode(array("status" => "success", "message" => false, "text" => "CPF disponível"));
    }
  }
?>