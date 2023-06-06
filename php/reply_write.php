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
$replynum = null;

if($nickname && $password && $content) {
	$sqlquery =
//	"INSERT INTO lilarcor277.reply (nickname, password, content, content_index, date) " .
//	"VALUES ('$nickname', '$password', '$content', '$id', NOW())";
	"INSERT INTO lilarcor277.reply (nickname, password, content, content_index, date, reply_status, ip) " .
	"VALUES ('$nickname', '$password', '$content', '$pname', $time, 1, '$userip')";

	if(!mysqli_query($conn, $sqlquery)) {
		mysqli_close($conn);
		die($sqlquery);
	}

	$sqlquery = "SELECT * FROM lilarcor277.reply WHERE nickname='$nickname' AND date=$time";
	$result_set = mysqli_query($conn, $sqlquery);
	$row = mysqli_fetch_array($result_set);
	if($row) {
		$replynum = $row["id"];
	} else {
		die("there's no reply.");
	}
}

mysqli_close($conn);

$write_result_set = ["result" => "100", "date" => $time, "replynum" => $replynum];
echo json_encode($write_result_set);
?>
