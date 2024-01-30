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
function getDropDownCompany($selected) {
	$conn=db();
	$sql = "SELECT id,code,name FROM company WHERE status = '1' ORDER BY name ASC";

	$result = $conn->query($sql);

	$txt_result="";
	while ($row  = $result -> fetch_array()){
		$txt_result .= "<option ".($row[1] == $selected ? 'selected':'')." value=\"".$row[1]."\">".$row[2]."</option>";
	}

	return $txt_result;
}

function addUser($name,$ic,$email,$phone_no,$company,$role,$username,$password){
	$conn = db();
	$sql = "INSERT INTO user(name,ic,email,phone_no,company,role,username,password) VALUES ('$name,$ic,$email,$phone_no,$company,$role,$username,$password')";
	$result = $conn->query($sql);
	return $result;
}


?>

