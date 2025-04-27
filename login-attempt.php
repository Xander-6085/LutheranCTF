<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // $stored_hash = hash("sha256", "34250003024812");
  $stored_hash = "0e92299296652799688472441889499080435414654298793501210067779366";

  $user_input = (array) json_decode(file_get_contents("php://input"), TRUE);
  $input_password = $user_input["password"];
  $hashed_input = hash("sha256", $input_password);

  // VULNERABILITY: Using '==' to compare can turn both strings to integers, so the hash starting with 0e will cause juggling.

  if ($hashed_input == $stored_hash) {
    echo "Welcome admin, flag is: pracsec{clown_juggling}\n";
    error_log("yay");
  } else {
    echo "Incorrect password\n";
  }
}
