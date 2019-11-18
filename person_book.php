<!DOCTYPE html>
<?php
	include "php/string_sanitaze.php";
	include "php/check_page_info.php";
//	$pname is just set from above php file.
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway|Julius+Sans+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/lang.css">
<link rel="stylesheet" href="css/reply.css">
<link rel="stylesheet" href="css/page.css">
<link rel="stylesheet" href="css/page_update.css">
<link rel="stylesheet" href="css/p_<?php echo $pname; ?>.css">
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

</style>
</head>
<body>
<div class="board board_appear" id="<?php echo $pname ?>" data-contentnum="2">
	<div class="loading">
		<img src="image/logo_1x1.png" width="200px" />
		<h2 style="color: white">Loading</h2>
	</div>
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
		<img src="image/logo-we12be.png" id="logo" height="17px"></img>
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
		<?php include "php/page_content_read.php"; ?>

		<div class="page">
			<div class="content_wrapper">
				<?php include "php/reply_read.php"; ?>
				<div class="form_wrapper">
					<div class="form_nickpass">
						<input type="text" id="reply_nickname" required placeholder="이름" maxlength="10"><div class="form_error"></div>
						<input type="text" id="reply_password" required placeholder="비번" maxlength="10"><div class="form_error"></div>
					</div>
					<div class="form_textbox">
						<textarea rows="4" id="reply_content" required placeholder="내용"></textarea><div class="form_error">
					</div>
					<div class="form_submit">
						<button id="reply_submit">Submit</button>
					</div>
				</div>
			</div>
		</div>
	<div class="page_index">0</div>
	</div>
	<div class="navi_wrapper">
		<div class="navi_button navi_backward"></div>
		<div class="navi_button navi_forward"></div>
	</div>
</div>
<?php include "php/reply_result.php"; ?>
<script src="js/page.js"></script>
<script src="js/check_language.js"></script>
<script src="js/write_reply_ajaxquery.js"></script>

</script>
<?php include "php/check_lang.php"; ?>
</body>
</html>
