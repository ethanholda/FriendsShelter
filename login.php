<?
include("includes/DB.inc");
include("includes/password.inc");

$dbh= new DB;

if ($password_in) {	
	if (!$email_in) $email_in="setup";
	if (checkPassword($dbh,$email_in,$password_in)==0) {
		$no_login=true;
	} else {
		setPassword($email_in,$password_in);
		if ($email_in=="setup") {
			header("Location: profile.php");
		} else {		
			header("Location: calendar.php");
		}
	}
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>The Friends Shelter | About the Shelter</title>
<link href="includes/shelter_style.css" rel="stylesheet" type="text/css">
</head>

<body background="images/bg.gif" marginheight="0" marginwidth="0" leftmargin="0" topmargin="0">

<table width="722" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td><img src="images/clear.gif" width="16" height="60"></td>	
    <td><a href="index.html"><img src="images/logo.gif" width="142" height="16" border="0" alt="The Friends Shelter Homepage."></a></td>
		<td align="right">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td><img src="images/volunteer2.gif" width="60" height="59" alt="" border="0"  vspace="5" hspace="10"></td>
					<td><a href="volunteer.html" class="TopNav">BECOME A SHELTER VOLUNTEER</a></td>
					<td><img src="images/orange.gif" width="1" height="14" hspace="6"></td>
					<td><a href="about.html" class="TopNav">ABOUT</a></td>
					<td><img src="images/orange.gif" width="1" height="14" hspace="6"></td>
					<td><a href="index.html" class="TopNav">HOME</a></td>
					<td><img src="images/clear.gif" width="16" height="8"></td>
					</tr>
			</table>
		</td>
	</tr>
</table>
<br>
<table width="722" border="0" cellspacing="0" cellpadding="0">
  <!-- gray row -->
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="13" class="welcome">&nbsp;</td>
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

<table width="600" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" class="content"><b>Sorry, your login was incorrect.</b></td>
	</tr>

</table>
<p>&nbsp;
<bb1><!--1133078464-|-415885877--><bb2></body>
</html>
