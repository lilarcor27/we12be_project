<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php

	// 기본설정
	
ini_set("post_max_size","5M");
ini_set("upload_max_filesize","5M");

include "db_info.php";
include "string_sanitaze.php";

	// 변수 설정

$pname = $_POST['person'];
$page_num = $_POST['page_num'];
$pname = stringSanitaze($pname, $conn);
$page_num = stringSanitaze($page_num, $conn);

$file_dir = "../image/$pname/"; // 파일 디렉션
$allowed_ext = array("jpg", "jpeg", "gif", "png"); // 가능 확장자

uploadFile($_FILES['myfile1']);
uploadFile($_FILES['myfile2']);
uploadFile($_FILES['myfile3']);

mysqli_close($conn);

	// 메인 종료

	// 함수 라인

function uploadFile($myfile) {
	if(!isset($myfile) || $myfile["name"] == null)
		return;
	
	$file_error = $myfile["error"];
	$file_name = $myfile["name"];
	$file_tmpname = $myfile["tmp_name"];
	$file_md5 = md5($file_name);
	$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
	
	if(!is_dir($file_dir)) // 디렉션이 없으면 디렉션을 만든다
		mkdir($file_dir);
	
	if($file_error != UPLOAD_ERR_OK) {
		switch($file_error) {
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				echo "파일이 너무 큽니다. ($file_error)";
				break;
			case UPLOAD_ERR_NO_FILE:
				echo "파일이 첨부되지 않았습니다. ($file_error)";
				break;
			default:
				echo "파일이 제대로 업로드되지 않았습니다. ($file_error)";
		}
		mysqli_close($conn);
		exit;
	}
	
	if(!in_array($file_ext, $allowed_ext)) {// 확장자 검사
		mysqli_close($conn);
		die("확장자 불허");
	}

	move_uploaded_file($file_tmpname, "$file_dir/$file_md5.$file_ext");
	
	file_compressor("$file_md5.$file_ext", $file_dir, 70);
	
	$sqlquery = "UPDATE lilarcor27.page_content SET file$file_num='$file_md5.$file_ext' WHERE person='$pname' AND page_num=$page_num";
	mysqli_query($conn, $sqlquery);
}

function file_compressor($source, $dir, $quality) {
	$info = getimagesize("$dir$source");
	
	if($info["mime"] == "image/jpeg") 
		$image = imagecreatefromjpeg("$dir$source");
	else if($info["mime"] == "image/gif") 
		$image = imagecreatefromgif("$dir$source");
	else if($info["mime"] == "image/png") 
		$image = imagecreatefrompng("$dir$source");
	
	imagejpeg($image, "$dir$source", $quality);
}

?>
</body>
</html>