<?php
/**
 * Registers an email account
 * And logs them in
**/

include __DIR__ . "/../../common/helpers.php";

$json = getJSON();

$success = false;

// If the JSON contains the non-empty properties, add an account
if (hasStrings($json, ["name", "email", "password"])) {
    $name = $json->name;
    $email = $json->email;
    $password = $json->password;
    $user = new User();
    // Check login and return response
    $success = $user->create($name, $email, $password);
}
$response = array(
    "success" => $success,
    "id" => $user->getUserID()
    );

echo json_encode($response);

?>