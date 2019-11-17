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
<link rel="stylesheet" href="css/p_junyeong.css">
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
	
	if($_GET["id"] !== "2") die("error: wrong id");
?>
<div class="board board_appear" id="junyeong" data-contentnum="2">
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
		<?php //include "php/page_content_read.php"; ?>
		
		<div class="page" id="p1">
			<div class="p1_border">
				<div class="p1_title">
					<h1>Balance Will Skyrocket</h1><br>
				</div>
				<div class="p1_subtitle">
					<h1>Junyeong's goal</h1><br>
					<h1>Make $1,000 in stock.</h1><br>
				</div>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<img src="image/junyeong/9.jpg" width="100%"></img>
				
				<h2>If I were asked to choose a friend for my life, I would choose a computer. When I was in kindergarten, I tried to make a StarCraft map, I started making flash games in elementary school, and I started making game with programming in middle school, and I tried to develop an app in high school. and I was the top of computer club in high school. I loved computers so much, but after I decided to choose studying between studying and computer in high school, the computer wasn't important for me. In the meantime, I met someone in New Zealand who's enlightened, also he affect me. and I managed to try my computer again.</h2>
				
				<img src="image/junyeong/6.jpg" width="100%"></img>
				<img src="image/junyeong/8.jpg" width="100%"></img>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<h2>In fact, my goal is to make 10 billion won (NZD 13 Million). I had a conflict in high school with real problems and what I wanted to do, and I thought it would continue to come to my life. So I got away from the problem of living and I had that goal in mind because I wanted to do what I wanted to do. For other reasons, I want to contribute to others. It's hard for everyone around us to live, and it makes me happy to think that I can give them a little happiness. For these two reasons, I want to make 10 billion won.<br></h2>
				<img src="image/junyeong/13.jpg" width="100%"></img>
				<img src="image/junyeong/15.jpg" width="100%"></img>
				<h2>The picture above is Maldives, the place I want to visit the most. I would be very happy if I went to Maldives with my loved ones.<br></h2>
				<h2>So when I thought about how to make a lot of money, I came up with three answers in Korea. Stocks, real estate sales, and business. Among them, I'm studying stocks that are easy to access and can start with with less money.<br></h2>
				<h2>First of all, in order to make big money, my stock skills must be supported. So I decided to make NZD1000 with NZD350 as a short term goal and I am in the process now.<br></h2>
			</div>
		</div>
		<div class="page">
			<div class="content_wrapper">
				<h2>I'm embarrassed, but I have to disclose my account yield.<br></h2>
				<img src="image/junyeong/16.jpg" width="100%"></img>
				<h2>Although half of the money has been blown away, I think the KRW 150K (approx. NZD 200) lost now will be worth more than $1 Million in the future.<br></h2>
			</div>
		</div>
		<!--
		<h2>사실 제 목표는 100억 원 (NZD 13 Million) 만들기입니다. 저는 고등학교 때 현실적 문제와 내가 하고 싶은 문제에서 갈등했었고, 이런 문제가 내 삶을 계속해서 찾아올 것이라고 생각했습니다. 그래서 먹고 사는 문제에서 벗어나서 내가 하고 싶은 것을 하고 싶은 마음에 그러한 목표를 갖게 되었습니다. 다른 이유로는 타인에게 베풀고 싶은 마음입니다. 우리 주변 사람들 모두가 살아가는 문제로 힘든데, 내가 그들에게 작은 행복을 줄 수 있다는 생각을 하면 가슴이 벅차오릅니다. 이러한 두 가지 이유로 저는 100억 원을 만들고 싶습니다.<br></h2>
				<img src="image/junyeong/13.jpg" width="100%"></img>
				<img src="image/junyeong/15.jpg" width="100%"></img>
				<h2>위 사진은 제가 가장 가보고 싶은 곳, 몰디브입니다. 내가 사랑하는 사람들과 몰디브에 간다면 정말 행복할 것 같습니다.<br></h2>
				<h2>그래서 큰 돈을 벌 방법이 어떤 것이 있을까 생각해 보니, 제가 사는 대한민국에서는 3가지 답이 떠올랐습니다. 주식, 부동산, 사업입니다. 그 중 접근이 쉽고 적은 돈으로도 시작할 수 있는 주식을 공부하고 있습니다.<br></h2>
				<h2>우선 큰 돈을 벌기 위해서는 나의 주식 실력이 뒷받침되어야 합니다. 그래서 단기적 목표로 NZD350으로 NZD1000을 정했으며, 지금 그 과정 속에 있습니다.<br></h2>
		<h2>부끄럽지만, 제 계좌 수익률을 공개하겠습니다.<br></h2>
				<img src="image/junyeong/16.jpg" width="100%"></img>
				<h2>비록 원금의 절반이 날아갔지만, 저는 지금 잃은 KRW 150K (approx. NZD 200) 가 미래의 1 Million 이상의 가치를 할 것이라고 생각합니다.<br></h2>
		-->
		<div class="page">
			<div class="content_wrapper">
				<?php include "php/reply_read.php"; ?>
				<?php include "php/reply_input.php"; ?>
			</div>
		</div>
	<div class="page_index">0</div>
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