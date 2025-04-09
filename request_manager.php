<?php
$endpoint = "http://localhost:11434/api/chat";
$model = "bridgeTroll";

$paramsFetch = json_decode(
  file_get_contents("php://input"),
  true
);
$messages = $paramsFetch;
error_log(  file_get_contents("php://input"));

$headers = [
  'Content-Type: application/json',
];

$data = [
  "model" => $model,
  "messages" => $messages,
  "stream" => false
];

error_log(json_encode($data));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
  $error = curl_error($ch);
  curl_close($ch);
  throw new Exception("Error sending message: " . $error);
}

curl_close($ch);
error_log($response);
$arrResponse = json_decode($response, true);
$resMessage = $arrResponse["message"];

$jsonResponse = json_encode(array("responseMessage" => $resMessage));
echo $jsonResponse;
exit;
