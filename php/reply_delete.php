<?php

$reply_password = $_POST["pw_check"];
$reply_num = $_POST["reply_num"];
$pname = $_POST["pname"];
$result = 0;

include "db_info.php";
include "server_info.php";
include "string_sanitaze.php";

$reply_password = stringSanitaze($reply_password, $conn);
$reply_num = stringSanitaze($reply_num, $conn);
$pname = stringSanitaze($pname, $conn);

$sqlquery = "SELECT * FROM lilarcor27.reply WHERE id=$reply_num AND password='$reply_password'";
$result_set = mysqli_query($conn, $sqlquery);
$row = mysqli_fetch_array($result_set);
if($row) {
	$sqlquery = "UPDATE lilarcor27.reply SET reply_status=-1 WHERE id=$reply_num";
	mysqli_query($conn, $sqlquery);
	$result = 100;
}

mysqli_close($conn);

$delete_result_set = ["result" => $result];
echo json_encode($delete_result_set);
?>
