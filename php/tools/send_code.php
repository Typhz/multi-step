<?php 
  require __DIR__ . '/../vendor/twilio-php-main/src/Twilio/autoload.php';
  use Twilio\Rest\Client;
  session_start();
  require_once("../config/config.php");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  
  $data = json_decode(file_get_contents("php://input"));

  if(!empty($data -> cel)){
    $userNumber = $data -> cel;
    $userNumber = str_replace(array('(', ')', ' ', '-'), '', $userNumber);
    $sid = 'ACd1222d52917b79c4a109a3d622012054';
    $token = '56922f859002c37ab0292c1e868cd390';
    $code = rand(1000, 9999);
    $client = new Client($sid, $token);
    $client->messages->create(
      '+55' . $userNumber,
      array(
        'from' => "+19034947952",
        'body' => "Seu código de verificação é: ".$code
      )
    );
    $_SESSION['code'] = array(
      'code' => $code,
      'user_number' => $userNumber
    );
    echo json_encode(array("status" => "success", "message" => true, "text" => "Código enviado", "cel" => $userNumber));
  }
?>