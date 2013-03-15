<?
include("includes/DB.inc");
include("includes/password.inc");

$dbh=new DB;

$user_id=checkPassword($dbh,$email_cookie,$password_cookie);

if ($user_id==0) {
	if (checkPassword($dbh,"setup",$password_in)==0) {
		header("Location: login.php");
	}
}

if ($user_id) {
	$data_user=getUserData($dbh,$user_id);
	$user_name=$data_user->first_name." ".$data_user->last_name;
} 

$sql="select first_name, last_name, email, phone_home, phone_work, phone_mobile, preferred_contact_method from users order by last_name";
$result=$dbh->query($sql);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>The Friends Shelter | Volunteer List</title>
<link href="includes/shelter_style.css" rel="stylesheet" type="text/css">
</head>

<body background="images/bg.gif" marginheight="0" marginwidth="0" leftmargin="0" topmargin="0">
&nbsp;<br>
<? include("includes/nav.php"); ?>
<br>
<table width="722" border="0" cellspacing="0" cellpadding="0">
  <!-- gray row -->
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="13" class="welcome"><? if ($user_id) echo "Welcome, $user_name"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <!-- spacer -->
  <tr> 
    <td><img src="images/clear.gif" width="15" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="98" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="98" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="98" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="98" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="98" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="98" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="98" height="1"></td>
    <td><img src="images/clear.gif" width="1" height="1"></td>
    <td><img src="images/clear.gif" width="15" height="1"></td>
  </tr>
 </table>

<table width="700" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td><img src="images/clear.gif" width="65" height="36"></td>
		<td><img src="images/clear.gif" width="10" height="1"></td>
		<td><img src="images/clear.gif" width="625" height="1"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" class="title"><span class="blue">Volunteer List</span></td>
	</tr>
	<tr>
		<td colspan="3"><img src="images/clear.gif" width="1" height="15"></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td class="content">		
			<table width="550" cellpadding="5" cellspacing=0>
				<tr>
					<td class="content"><b>Name</b></td>
					<td class="content"><b>Email Address</b></td>
					<td class="content"><b>Home Phone</b></td>
					<td class="content"><b>Work Phone</b></td>
					<td class="content"><b>Mobile Phone</b></td>
					<td class="content"><b>Primary Contact</b></td>
				</tr>
<? 
$c=0;
while ($data_volunteers=$dbh->next_record()) {
	if (($c%2)==0) $td_bgcolor="cccccc";
	else  $td_bgcolor="ffffff";
?>
				<tr>
					<td class="content" valign=top nowrap bgcolor=<? echo $td_bgcolor; ?>><? echo $data_volunteers->last_name.", ".$data_volunteers->first_name; ?></td>
					<td class="content" valign=top nowrap bgcolor=<? echo $td_bgcolor; ?>><a href="mailto:<? echo $data_volunteers->email; ?>"><? echo $data_volunteers->email; ?></a></td>
					<td class="content" valign=top nowrap bgcolor=<? echo $td_bgcolor; ?>><? echo $data_volunteers->phone_home; ?></td>
					<td class="content" valign=top nowrap bgcolor=<? echo $td_bgcolor; ?>><? echo $data_volunteers->phone_work; ?></td>
					<td class="content" valign=top nowrap bgcolor=<? echo $td_bgcolor; ?>><? echo $data_volunteers->phone_mobile; ?></td>
					<td class="content" valign=top nowrap bgcolor=<? echo $td_bgcolor; ?>><? echo $data_volunteers->preferred_contact_method; ?></td>
				</tr>
<? 
	$c++;
} 
?>
			</table>
		
		
		</td>
	</tr>
</table>

</body>
</html>
