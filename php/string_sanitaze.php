<?php
	function stringSanitaze($data, $sql=null) {
		$tmp = trim($data);
		$tmp = htmlspecialchars($tmp);
		if($sql) 
			$tmp = mysqli_real_escape_string($sql, $data);
			
		return $tmp;
	}
?>