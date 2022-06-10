<?php
  require_once("../config/config.php");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");

  $data = json_decode(file_get_contents("php://input"));

  if(!empty($data -> name) && !empty($data -> email)){
    //check email is valid
    if(!filter_var($data -> email, FILTER_VALIDATE_EMAIL)){
      echo json_encode(array("status" => "error", "message" => true, "text" => "Email inválido"));
    }
    else{
      $name = $data -> name;
      $email = $data -> email;
      $result_marketing = mysqli_query($con, "SELECT * FROM marketing WHERE email = '$email'");
      $count_marketing = mysqli_num_rows($result_marketing);
      if ($count_marketing == 1) {
      } else {
        $sql = "INSERT INTO marketing (name, email) VALUES ('$name', '$email')";
        $result = mysqli_query($con, $sql);
      }
    }
  }
?>