<?php

$nickname = (isset($_POST["nickname"])) ? $_POST["nickname"] : null;
$password = (isset($_POST["password"])) ? $_POST["password"] : null;
$content = (isset($_POST["content"])) ? $_POST["content"] : null;
$pname = (isset($_POST["pname"])) ? $_POST["pname"] : null;
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

if($nickname && $password && $content) {
	$sqlquery =
//	"INSERT INTO lilarcor27.reply (nickname, password, content, content_index, date) " .
//	"VALUES ('$nickname', '$password', '$content', '$id', NOW())";
	"INSERT INTO lilarcor27.reply (nickname, password, content, content_index, date, reply_status, ip) " .
	"VALUES ('$nickname', '$password', '$content', '$pname', $time, 1, '$userip')";

	if(!mysqli_query($conn, $sqlquery)) {
		mysqli_close($conn);
		die($sqlquery);
	}
}

mysqli_close($conn);

$result_set = ["result" => "100", "date" => $time];
echo json_encode($result_set);
?>
