<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // $stored_hash = hash("sha256", "34250003024812");
  $user_input = (array) json_decode(file_get_contents("php://input"), TRUE);
  $input = $user_input["input"];
  $desired = $user_input["desired"];

  if ($input == $desired) {
    echo "Congratulations, you understand type juggling!";
  } else {
    echo "Incorrect, user input = $input, desired = $desired\n";
  }
} else {
  header("Location: clownworld.html");
}
