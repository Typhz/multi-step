<?php
  require_once("../config/config.php");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  
  $data = json_decode(file_get_contents("php://input"));
  if(!empty($data -> cnpj)){
    $cnpj = $data -> cnpj;
    $cnpj = str_replace(array('.', '-', '/'), '', $cnpj);
    $sql = "SELECT * FROM users WHERE cnpj = '$cnpj'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row)) {
      echo json_encode(array("status" => "error", "message" => true, "text" => "CNPJ já cadastrado"));
    } else {
      echo json_encode(array("status" => "success", "message" => false, "text" => "CNPJ disponível", "cnpj" => $cnpj));
    }
  }
?>