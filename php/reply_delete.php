<?php

$reply_password = $_POST["pw_check"];
$reply_id = $_POST["reply_id"];
$pname = $_POST["pname"];
$isTriggered = 1;
$time = time();

include "db_info.php";
include "server_info.php";
include "string_sanitaze.php";

$reply_password = stringSanitaze($reply_password, $conn);
$reply_id = stringSanitaze($reply_id, $conn);
$pname = stringSanitaze($pname, $conn);

$sqlquery = "SELECT * FROM lilarcor27.reply WHERE id='$reply_id' AND password='$reply_password'";
$result_set = mysqli_query($conn, $sqlquery);
if($row = mysqli_fetch_array($result_set)) {
	$sqlquery = "UPDATE lilarcor27.reply SET reply_status=-1 WHERE id='$reply_id'";
	mysqli_query($conn, $sqlquery);
	$isTriggered = 2;
}

mysqli_close($conn);

global $server_ip;
header("Location: http://$server_ip/person_book.php?pname=$pname&istriggered=$isTriggered&time=$time");
?>