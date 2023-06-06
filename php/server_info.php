<?php
	if(strpos($_SERVER['REMOTE_ADDR'], "192.168.") !== false) // 내부망에서 접속할 경우
		$server_ip = $_SERVER['REMOTE_ADDR'];
	else
		$server_ip = "lilarcor277.dothome.co.kr";
?>