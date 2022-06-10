<?php
  session_start();
  require_once("../config/config.php");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  
  $data = json_decode(file_get_contents("php://input"));
  $name = @$data -> name;
  $email = @$data -> email;
  $password = @$data -> password;
  $confirm_password = @$data -> confirm_password;
  $cpf = @$data -> cpf;
  $cpf = str_replace(array('.', '-', '/'), '', $cpf);
  $data_nasc = @$data -> data_nasc;
  $cep = @$data -> cep;
  $street = @$data -> street;
  $city = @$data -> city;
  $state = @$data -> state;
  $tel = @$data -> tel;
  $cel = @$data -> cel;
  $code = @$data -> code;

  if (empty($name) && empty($email) && empty($password) && empty($confirm_password) && empty($cpf) && empty($data_nasc) && empty($cep) && empty($street) && empty($city) && empty($state) && empty($cel) && empty($code)) {
    echo json_encode(array("status" => "error", "message" => true, "text" => "Preencha todos os campos"));
  }
  else if ($password != $confirm_password) {
    echo json_encode(array("status" => "error", "message" => true, "text" => "As senhas não conferem"));
  }
  else if (strlen($password) < 6) {
    echo json_encode(array("status" => "error", "message" => true, "text" => "A senha deve ter no mínimo 6 caracteres"));
  }
  else if (strlen($cpf) < 11) {
    echo json_encode(array("status" => "error", "message" => true, "text" => "O CNPJ deve ter 14 dígitos"));
  }  
  else if (strlen($cep) < 8) {
    echo json_encode(array("status" => "error", "message" => true, "text" => "O CEP deve ter 8 dígitos"));
  }
  else if (strlen($cel) < 11) {
    echo json_encode(array("status" => "error", "message" => true, "text" => "O Celular deve ter 11 dígitos"));
  }
  else {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row)) {
      echo json_encode(array("status" => "error", "message" => true, "text" => "Email já cadastrado"));
    }
    else {
      $sql = "SELECT * FROM users WHERE cpf = '$cpf'";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);
      if (isset($row)) {
        echo json_encode(array("status" => "error", "message" => true, "text" => "CPF já cadastrado"));
      }
      else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password, cpf, nasc, cep, street, city, state, tel, cel) VALUES ('$name', '$email', '$password', '$cpf', '$data_nasc', '$cep', '$street', '$city', '$state', '$tel', '$cel')";
        $result = mysqli_query($con, $sql);
        if ($result) {
          echo json_encode(array("status" => "success", "message" => false, "text" => "Cadastro realizado com sucesso"));
          session_destroy();
        }
        else {
          //return mysql error
          echo json_encode(array("status" => "error", "message" => true, "text" => "Erro ao cadastrar", "error" => mysqli_error($con)));
        }
      }
    }
  }
?>

