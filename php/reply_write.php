<?php

$nickname = $_POST["nickname"];
$password = $_POST["password"];
$content = $_POST["content"];
$pname = $_POST["pname"];
$time = time();
$userip = $_SERVER["REMOTE_ADDR"];

// Sanitaze
include "db_info.php";
include "server_info.php";
include "string_sanitaze.php";

$nickname = stringSanitaze($nickname, $conn);
$password = stringSanitaze($password, $conn);
$content = stringSanitaze($content, $conn);
$pname = stringSanitaze($pname, $conn);
	
if(isset($nickname) && isset($password) && isset($content)) {
	$sqlquery = 
//	"INSERT INTO lilarcor27.reply (nickname, password, content, content_index, date) " . 
//	"VALUES ('$nickname', '$password', '$content', '$id', NOW())";
	"INSERT INTO lilarcor27.reply (nickname, password, content, content_index, date, reply_status, ip) " . 
	"VALUES ('$nickname', '$password', '$content', '$pname', NOW(), 1, '$userip')";

	if(!mysqli_query($conn, $sqlquery)) {
		mysqli_close($conn);
		die($sqlquery);
	}
}

mysqli_close($conn);

global $server_ip;
header("Location: http://$server_ip/person_book.php?pname=$pname&istriggered=3&time=$time");

?>