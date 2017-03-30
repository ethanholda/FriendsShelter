<?
function checkPassword(&$db,$email,$password) {
	$sql="select user_id from users where email='$email' and password='$password'";
	$result=$db->query($sql);
	$data=$db->next_record();

	if ($db->num_rows()>0) return $data->user_id;
	else return 0;
}

function setPassword($email,$password) {
	setcookie("email_cookie",$email);
	setcookie("password_cookie",$password);
}

function getUserData(&$db,$user_id) {
	$sql="select * from users where user_id=$user_id";
	$result=$db->query($sql);
	
	if ($db->num_rows()>0) {
		return $db->next_record();
	} else {
		return 0;
	}
}

// mimics register globals for php 5.4+
// (not a great idea, but...)
foreach (array_merge($_GET, $_POST, $_COOKIE) as $key => $val) {
  global $$key;
  $$key = addslashes($val);
}
?>
