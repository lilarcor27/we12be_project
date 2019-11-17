<?php

include "db_info.php";

if(!isset($_GET["pname"])) // 1. GET pname 자체가 없을 경우
	accessedWrong();


$pname = stringSanitaze($_GET["pname"], $conn);

$sqlquery = "SELECT * FROM lilarcor27.page_content WHERE person='$pname'";
$result_set = mysqli_query($conn, $sqlquery);

if(!$result_set) // 2. SQL 데이터베이스에 없을 경우
	accessedWrong();

mysqli_close($conn);

function accessedWrong() {
	mysqli_close($conn);
	die("You accessed a wrong page.");
}

?>