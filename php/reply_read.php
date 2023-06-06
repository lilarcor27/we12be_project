<?php
echo "<div class='reply_container'>";

include "db_info.php";

$sqlquery = "SELECT * FROM lilarcor277.reply WHERE reply_status=1 AND content_index='$pname' ORDER BY id DESC";
$result_set = mysqli_query($conn, $sqlquery);

$row = mysqli_fetch_array($result_set);

if(!$row) {
	echo "<div class='reply_wrapper'> There is no reply. </div>";
} else {
	do {
		echo "<div class='reply_wrapper' style='opacity: 1' data-replynum='";
		echo $row['id'];
		echo "'>";
			echo "<div class='reply_nickname'>";
				echo $row['nickname'];
			echo "</div>";
			echo "<div class='reply_content'>";
				echo "<h1>" . $row['content'] . "</h1>";
			echo "</div>";
			echo "<div class='reply_date'>";
				echo "<h1>" . $row['date'] . "</h1>";
			echo "</div>";
			echo "<div class='reply_delete'>X</div>";
		echo "</div>";
	} while($row = mysqli_fetch_array($result_set));
}
echo "</div>";
mysqli_close($conn);

?>
