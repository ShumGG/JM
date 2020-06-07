<?php

$user = json_decode(file_get_contents('php://input'),true);

//echo json_encode($user["user"]);

echo $user["user"]  . " " . "como estas";

?>