<?php
require '../db/config.php';

function clean($str) {
	$conn=db();
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysqli_real_escape_string($conn,$str);
}

function login($username){
    $conn = db();
    $sql = "SELECT * FROM user WHERE username='$username' AND status=1 ORDER BY id DESC LIMIT 1";
    return $conn->query($sql);
}

?>
