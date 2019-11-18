<?php
	echo "<script>\n";
		if(isset($_GET["lang"]))
			echo ($_GET["lang"] === "kor") ? "checkLanguage('kor');" : "checkLanguage('eng');";
		else
			echo "checkLanguage('eng');";
	echo "</script>\n";
?>
