<?php

	if(strpos($_SERVER['REMOTE_ADDR'], "192.168.") !== false) // 내부망에서 접속할 경우
		$SQL_servername = "lilarcor277.dothome.co.kr";
	else if(strpos($_SERVER['REMOTE_ADDR'], "::1") !== false)
		$SQL_servername = "lilarcor277.dothome.co.kr";
	else if(strpos($_SERVER['REMOTE_ADDR'], "127.0.0.1") !== false) // 핸드폰 내부수정망에서 접속할 경우
		$SQL_servername = "0.0.0.0";
	else // 외부망에서 접속(도메인으로) 할 경우
		$SQL_servername = "lilarcor277.dothome.co.kr";

	$SQL_servername = "localhost";
	$SQL_username = "lilarcor277";
	$SQL_password = "q1q2w3e4r!";

	// print $SQL_password
	// print $SQL_servername
	// print $SQL_username

	if($SQL_servername == "0.0.0.0") {
		$SQL_username = "root";
		$SQL_password = "";
	}

	$conn = mysqli_connect($SQL_servername, $SQL_username, $SQL_password);

	if(!$conn) {
		mysqli_close($conn);
		die("something wrong - connection" . $SQL_servername);
	}

?>
