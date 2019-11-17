<?php

function writeLog($conn, $content) {
	$sqlquery = "INSERT INTO lilarcor27.log (time, content) VALUES (NOW(), '$content')";
	mysqli_query($conn, $sqlquery);
}

?>