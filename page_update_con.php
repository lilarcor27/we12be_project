<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway|Julius+Sans+One|Amatic+SC&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css">

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<style>
#wrapper {
	position: relative;
	left: 0; top: 0;
	width: 100vw;
	display: flex;
	flex-direction: column;
}
.update_block_con {
	width: 100%;
	display: flex;
	flex-direction: column;
	overflow: hidden;
}
.update_block {
	display: flex;
	flex-direction: column;
	padding: 20px;
	border: 2px solid #949494;
	border-radius: 1rem;
	margin: 20px;
	background: #eeeeee;
	box-shadow: 4px 4px;
}
.gobackbutton {
	width: 100%;
	height: 5vh;
}
</style>
</head>
<body>

<button class="gobackbutton" onclick="{ history.go(-1); }">go back</button>
<div id="wrapper">
<?php 
	include "php/string_sanitaze.php";
	include "php/page_update_access.php";
	include "php/page_update_form.php";
?>
</div>
</body>
</html>