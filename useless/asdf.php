<html>
<body>
<?php

if(!isset($_FILES["myfile"]))
	echo "없음";
else {
	echo "있음";
	if($_FILES["myfile"]['name'] == null)
		echo "널입니다.";
	
	echo $_FILES["myfile"]['name'];
}

?>


<form enctype='multipart/form-data' action='asdf.php' method='post'>
	<input type='file' name='myfile'>
	<input type='submit'>
</form>
</body>
</html>