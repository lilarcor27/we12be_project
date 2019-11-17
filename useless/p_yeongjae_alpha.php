<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway|Julius+Sans+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/lang.css">
<link rel="stylesheet" href="css/reply.css">
<link rel="stylesheet" href="css/page.css">
<link rel="stylesheet" href="css/page_update.css">
<link rel="stylesheet" href="css/p_yeongjae.css">
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
	include "php/string_sanitaze.php";

	if($_GET["id"] !== "1") die("error: wrong id");
?>
<div class="board board_appear" id="yeongjae" data-contentnum="1">
	<div class="helper">
		<div class="helper_icon"></div>
	</div>
	<div class="form_delete_container">
		<div class="form_delete_wrapper">
			<form method="post" action="php/reply_delete.php">
				<input type="hidden" id="pname_delete" name="pname" value="something">
				<input type="hidden" id="form_replyid" name="reply_id" value="0">
				<input type="hidden" id="content_id" name="content_id" value="something">
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
	<div class="form_update_container">
		<div class="form_update_wrapper">
			<form method="post" action="page_update_con.php">
				<input type="hidden" id="pname_update" name="pname" value="something">
				<input type="hidden" id="page_num" name="page_num" value="something">
				<div class="form_update_pwinput">
					<input type="text" name="pw_check" required placeholder="write your password.">
				</div>
				<div class="form_update_submit">
					<input type="submit">
				</div>
				<div class="form_update_cancel">
					X
				</div>
			</form>
		</div>
	</div>
	<div class="logo_wrapper">
		<img src="../image/logo-we12be.png" id="logo" height="17px"></img>
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
		<div class="page" id="p1" data-pagenum="1">
			<div class="p1_border">
				<div class="p1_title">
					<h1>Dominic's Story</h1><br>
				</div>
				<div class="p1_subtitle">
					<h1>Goal<br><br>
						· 인터뷰 100명<br>
					</h1>
					
					<p style="font-size: 0.9rem"><br>&nbsp;&nbsp;&nbsp;(누군가에게 도움이 되는 것)</p>
					
				</div>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<div class="headline">
					나의 20대
				</div>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<img src="image/yeongjae/11.jpg" width="100%"></img>
				<h2>
					필리핀과 캐나다에서 생활하며 너무나 귀중한 사람들을 만났고
				</h2>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<img src="image/yeongjae/14.jpg" width="100%"></img>
				<h2>
					나의 첫번째 도전 in Canada
				</h2>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<img src="image/yeongjae/5.jpg" width="100%"></img>
				<img src="image/yeongjae/12.jpg" width="100%"></img>
				<img src="image/yeongjae/7.jpg" width="100%"></img>
				<h2>
					나의 두번째 도전 in Canada
				</h2>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<img src="image/yeongjae/6.jpg" width="100%"></img>
				<img src="image/yeongjae/13.jpg" width="100%"></img>
				<h2>
					내가 좋아하고 잘 할 수 있는걸 하기
				</h2>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<div class="headline">
					나의 목표
				</div>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<h2>
					1) 인터뷰 100명<br>
					2) 심리학 공부<br>
				</h2>
				<img src="image/yeongjae/9.jpg" width="100%"></img>
				<h2>
					3) 취미생활 가지기 (미술, 카메라, 운동)<br>
				</h2>
				<img src="image/yeongjae/8.jpg" width="100%"></img>
				<h2>
					4) 세계 일주
				</h2>
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