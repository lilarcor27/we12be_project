<?php

include "db_info.php";

if(!isset($_GET["pname"])) {
	mysqli_close($conn);
	die("something wrong: pname isnt set.");
}
$person = $_GET["pname"];

$person = stringSanitaze($person, $conn);

$sqlquery = "SELECT * FROM lilarcor27.page_content WHERE person='$person'";
$result_set = mysqli_query($conn, $sqlquery);
$row = mysqli_fetch_array($result_set);

if(!$row) {
	mysqli_close($conn);
} else {
	do {
		if($row['page_num'] == 1) {
			$c1 = $row['content1'];
			$c2 = $row['content2'];
			$c3 = $row['content3'];
			echo "
				<div class='page' id='p1'>
					<div class='p1_border'>
						<div class='p1_title'>
							<h1>
								$c1
							</h1><br>
						</div>
						<div class='p1_subtitle'>
							<h1>
								$c2
							</h1><br>
							<h1>
								$c3
							</h1><br>
						</div>
					</div>
				</div>
			";
		} else {
			$c1 = $row['content1'];
			$c2 = $row['content2'];
			$c3 = $row['content3'];
			$f1 = $row['file1'];
			$f2 = $row['file2'];
			$f3 = $row['file3'];
			echo "
				<div class='page'>
					<div class='content_wrapper'>
			";
			if($f1)
				echo "
					<img src='image/$person/$f1' width='100%'></img>
					
				";
			echo "<h2>$c1</h2>";
			
			if($f2)
				echo "
					<img src='image/$person/$f2' width='100%'></img>
					
				";
			echo "<h2>$c2</h2>";
			
			if($f3)
				echo "
					<img src='image/$person/$f3' width='100%'></img>
					
				";
			echo "<h2>$c3</h2>";
			echo "
					</div>
				</div>
			";
		}
	} while($row = mysqli_fetch_array($result_set));
}

echo "
	<div class='page'>
		<div class='content_wrapper'>
			<div class='headline'>
				Coming soon
			</div>
		</div>
	</div>
";

mysqli_close($conn);

?>