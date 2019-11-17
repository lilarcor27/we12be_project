<?php

$name = (isset($_POST["name"])) ? $_POST["name"] : "null";
$computed_name = $name . "asdf";
$myarray = ["name" => $name, "computed_name" => $computed_name];
echo json_encode($myarray);

?>