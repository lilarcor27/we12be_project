<?php

include "db_info.php";

if(!isset($_POST['pname']) || !isset($_POST['page_num'])) {
	mysqli_close($conn);
	die("access denied : variables are't set from page_update_form.php");
}

$pname = $_POST['pname'];
$page_num = $_POST['page_num'];

$sqlquery = "SELECT * FROM lilarcor277.page_content WHERE person='$pname' AND page_num=$page_num";

$result_set = mysqli_query($conn, $sqlquery);
$row = mysqli_fetch_array($result_set);

if(!$row) {
	$sqlquery2 = "INSERT INTO lilarcor277.page_content (person, page_num) VALUES ('$pname', $page_num)";
	mysqli_query($conn, $sqlquery2);
}

$file1 = $row["file1"];
$file2 = $row["file2"];
$file3 = $row["file3"];
$content1 = $row["content1"];
$content2 = $row["content2"];
$content3 = $row["content3"];
$content1 = str_replace("<br>", "\n", $content1);
$content2 = str_replace("<br>", "\n", $content2);
$content3 = str_replace("<br>", "\n", $content3);

echo "
	<div class='update_block_con'>
		<form enctype='multipart/form-data' action='php/page_update.php' method='post'>
			<input type='hidden' name='person' value='$pname'>
			<input type='hidden' name='page_num' value='$page_num'>
			
			<div class='update_block'>
				<img src='image/$pname/$file1' width='100%'></img>
				<input type='file' name='myfile1'>
			</div>
			
			<div class='update_block'>
				<textarea name='content1' cols='40' rows='20' maxlength='2000'>$content1</textarea>
			</div>
			
			<div class='update_block'>
				<img src='image/$pname/$file2' width='100%'></img>
				<input type='file' name='myfile2'>
			</div>
			
			<div class='update_block'>
				<textarea name='content2' cols='40' rows='20' maxlength='2000'>$content2</textarea>
			</div>
			
			<div class='update_block'>
				<img src='image/$pname/$file3' width='100%'></img>
				<input type='file' name='myfile3'>
			</div>
			
			<div class='update_block'>
				<textarea name='content3' cols='40' rows='20' maxlength='2000'>$content3</textarea>
			</div>
			
			<input type='submit'>
		</form>
	</div>
";

?>