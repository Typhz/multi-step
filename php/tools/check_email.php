<?php
  require_once("../config/config.php");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  
  $data = json_decode(file_get_contents("php://input"));
  $email = $data->email;
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  if (isset($row)) {
    echo json_encode(array("status" => "error", "message" => true, "text" => "Email já cadastrado"));
  } else {
    echo json_encode(array("status" => "success", "message" => false, "text" => "Email disponível"));
  }
?>