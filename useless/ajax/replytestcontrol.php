<?php
  if(isset($_POST["content"])) {
    $content = (isset($_POST["content"])) ? $_POST["content"] . " and success" : "fail";
    $myarray = ["content" => $content];
    echo json_encode($myarray);
  }
?>
