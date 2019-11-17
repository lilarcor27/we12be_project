<form method='post' action='php/reply_write.php'>
	<input type="hidden" id="pname_reply" name="pname" value="something">
	<div class="form_wrapper">
		<div class="form_nickpass">
			<input type="text" name="nickname" required placeholder="이름" maxlength="10"><div class="form_error"></div>
			<input type="text" name="password" required placeholder="비번" maxlength="10"><div class="form_error"></div>
		</div>
		<div class="form_textbox">
			<textarea rows="4" name="content" required placeholder="내용"></textarea><div class="form_error">
		</div>	
		<div class="form_submit">
				<input type="submit">
		</div>
	</div>
</form>