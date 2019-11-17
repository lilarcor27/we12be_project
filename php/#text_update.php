<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
$pname = $_POST['person'];
$page_num = $_POST['page_num'];
$text_num = $_POST['text_num'];
$content = $_POST['content'];

include "db_info.php";
include "string_sanitaze.php";

if(!$conn) {
	mysqli_close($conn);
	die("db problem");
}
$content = str_replace("\n", "<br>", $content);
$content = stringSanitaze($content, $conn);

$sqlquery = "UPDATE lilarcor27.page_content SET content$text_num='$content' WHERE person='$pname' AND page_num=$page_num";
mysqli_query($conn, $sqlquery);

mysqli_close($conn);

echo "
	After 3 seconds, return to the previous page. <br>
	Please refresh after returning.
	<script>
		setTimeout(function() {history.go(-1);}, 3000);
	</script>
";
?>
</body>
</html>