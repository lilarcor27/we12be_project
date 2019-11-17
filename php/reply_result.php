<?php
if(isset($_GET["istriggered"]) && time() - $_GET["time"] <= 7) {
	$istriggered = $_GET["istriggered"];
	if($istriggered == 3) {
		// 작성성공
		echo "<script>";
			echo "document.querySelector('.helper_icon').classList.add('write_success')";
		echo "</script>";
	} else if($istriggered == 2) {
		// 삭제성공
		echo "<script>";
			echo "document.querySelector('.helper_icon').classList.add('delete_success')";
		echo "</script>";
	} else if($istriggered == 1) {
		// 삭제실패
		echo "<script>";
			echo "document.querySelector('.helper_icon').classList.add('delete_fail')";
		echo "</script>";
	}
} else {
	// 삭제 관련없음
	echo "<script>";
		echo "document.querySelector('.helper_icon').classList.add('turnpage')";
	echo "</script>";
}
?>	