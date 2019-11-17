<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway|Julius+Sans+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/lang.css">
<link rel="stylesheet" href="css/reply.css">
<link rel="stylesheet" href="css/page.css">
<link rel="stylesheet" href="css/p_tetsuya.css">
<style>

html {
	font-size: 16px;
	overflow-x: hidden;
	height: 100%;
	background-color: rgb(250, 250, 245);
}

body {
	overflow-x: hidden;
	min-height: 100%;
}

h2 {
	padding: 30px 0 30px 0;
	font-size: 1.2rem;
	letter-spacing: 1.4px;
	line-height: 1.6rem;
	font-family: "Raleway", sans-serif;
}

</style>
</head>
<body>
<?php
	if($_GET["id"] !== "3") die("error: wrong id");
?>
<div class="board board_appear" id="tetsuya" data-contentnum="3">
	<div class="helper">
		<div class="helper_icon"></div>
	</div>
	<div class="form_delete_container">
		<div class="form_delete_wrapper">
			<form method="post" action="php/reply_delete.php">
				<input type="hidden" id="pname2" name="pname" value="something">
				<input type="hidden" id="form_replyid" name="reply_id" value="0">
				<input type="hidden" id="content_id" name="content_id" value="something">
				<div class="form_delete_text">
					<h1>something</h1>
				</div>
				<div class="form_delete_pwinput">
					<input type="text" name="pw_check" required placeholder="write your password.">
				</div>
				<div class="form_delete_submit">
					<input type="submit">
				</div>
				<div class="form_delete_cancel">
					X
				</div>
			</form>
		</div>
	</div>
	<div class="logo_wrapper">
		<img src="../image/logo-we12be.png" height="17px"></img>
	</div>
	<div class="progress_wrapper fold">
		<div class="progress_index">
			<div class="progress_index_text"></div>
		</div>
		<div class="progress_bar_con">
			<div class="progress_bar">
				<div class="progress_bar_tracker"></div>
				<div class="progress_bar_text"></div>
			</div>
		</div>
		<div class="progress_text_con">
			<div class="progress_text selected" data-indexnum="1">Begin</div>
			<div class="progress_text" data-indexnum="4">Just started</div>
			<div class="progress_text" data-indexnum="99">In the works</div>
			<div class="progress_text" data-indexnum="99">Almost there</div>
			<div class="progress_text" data-indexnum="99">Done</div>
		</div>
	</div>
	<div class="page_wrapper">
		<div class="page" id="p1">
			<div class="p1_border">
				<div class="p1_title">
					<h1>Skydiver's story</h1><br>
				</div>
				<div class="p1_subtitle">
					<h1>Tetsuya's goal</h1><br>
					<h1>Do 500 Times </h1><br>
				</div>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<p class="lang lang_en">
					Past days<br>
					I lived in Canada
				</p>
				<p class="lang lang_kr">
					과거<br>
					캐나다에 살았습니다.
				</p>
				<img src="image/tetsuya/3.jpg" width="100%"></img>
				<img src="image/tetsuya/4.jpg" width="100%"></img>
				<img src="image/tetsuya/5.jpg" width="100%"></img>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<p class="lang lang_en">
					Travel around the world<br>
				</p>
				<p class="lang lang_kr">
					전세계 탐험<br>
				</p>
				<img src="image/tetsuya/12.jpg" width="100%"></img>
				<img src="image/tetsuya/13.jpg" width="100%"></img>
				<img src="image/tetsuya/14.jpg" width="100%"></img>
				<img src="image/tetsuya/15.jpg" width="100%"></img>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<p class="lang lang_en">
					Goal<br>
					Do 500 Skydivings
				</p>
				<p class="lang lang_kr">
					목표<br>
					스카이 다이빙 500회 달성
				</p>
				<img src="image/tetsuya/1.jpg" width="100%"></img>
				<img src="image/tetsuya/2.jpg" width="100%"></img>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<?php include "php/reply_read.php"; ?>
				<?php include "php/reply_input.php"; ?>
			</div>
		</div>
	<div class="page_index">1</div>
	</div>
	<div class="navi_wrapper">
		<div class="navi_button navi_forward"></div>
		<div class="navi_button navi_backward"></div>
	</div>
</div>
<?php include "php/reply_result.php"; ?>
<script src="js/page.js"></script>
<script src="js/check_language.js"></script>
<?php include "php/check_lang.php"; ?>
</body>
</html>