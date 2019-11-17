<?php

include "db_info.php";

if(!isset($_POST["pname"]) || !isset($_POST["page_num"]) || !isset($_POST["pw_check"])) {
	mysqli_close($conn);
	die("access denied : variables aren't set.");
}

$pname = stringSanitaze($_POST["pname"], $conn);
$page_num = stringSanitaze($_POST["page_num"], $conn);
$password = stringSanitaze($_POST["pw_check"], $conn);

$sqlquery = "SELECT * FROM lilarcor27.account WHERE username='$pname' AND pw='$password'";
$result_set = mysqli_query($conn, $sqlquery);
$row = mysqli_fetch_array($result_set);

if(!$row){
	mysqli_close($conn);
	die("password wrong");
}

mysqli_close($conn);
?>