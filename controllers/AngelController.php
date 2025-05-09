<?php

namespace Controllers;

class AngelController
{
  private $requestMethod;

  public function __construct($requestMethod)
  {
    $this->requestMethod = $requestMethod;
    session_start();
  }

  public function processRequest()
  {
    switch ($this->requestMethod) {
      case 'GET':
        $response = $this->getUserInfo();
        break;
      case 'POST':
        $response = $this->attemptLogon();
        break;
      default:
        $response = $this->notFoundResponse();
    }
    header($response['status_code_header']);
    if ($response['body']) {
      echo $response['body'];
    }
  }

  private function getUserInfo()
  {
    $response['status_code_header'] = 'HTTP/1.1 200';
    return $response;
  }

  private function attemptLogon()
  {
    // $stored_hash = hash("sha256", "34250003024812");
    $stored_hash = "0e92299296652799688472441889499080435414654298793501210067779366";

    $user_input = (array) json_decode(file_get_contents("php://input"), TRUE);
    $input_password = $user_input["password"];
    $hashed_input = hash("sha256", $input_password);
    $response['body'] = ("stored hash: " . $stored_hash . "\ninput: " . $hashed_input);

    // VULNERABILITY: Using '==' to compare can turn both strings to integers, so the hash starting with 0e will cause juggling.

    if ($hashed_input == $stored_hash) {
      $response['status_code_header'] = 'HTTP/1.1 200 Success';
      $response['body'] = "Welcome admin, flag is: pracsec{hawk_tuah}";
      error_log("yay");
      return $response;
    } else {
      $response['status_code_header'] = 'HTTP/1.1 200 Success';
      return $response;
      // return $this->notFoundResponse();
    }
  }

  private function notFoundResponse()
  {
    $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
    $response['body'] = null;
    return $response;
  }
}
