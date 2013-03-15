<?
setcookie("email_cookie","",time()-1);
setcookie("password_cookie","",time()-1);
unset($email_cookie);
unset($password_cookie);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>The Friends Shelter | Set Up Your Account</title>
<link href="includes/shelter_style.css" rel="stylesheet" type="text/css">


<script language="javascript">
<!--
//rollover script

if (document.images) {

	var submit = new Image(); submit.src = "images/submit.gif";
	var submitroll = new Image(); submitroll.src = "images/submit_.gif";
}

function turnOn(imgName) {
	if (document.images) document[imgName].src =
	eval(imgName + 'roll' + '.src');
}

function turnOff(imgName) {
	if (document.images) document[imgName].src =
	eval(imgName + '.src');
}
// -->
</script>

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
		<td><img src="images/clear.gif" width="65" height="36"></td>
		<td><img src="images/clear.gif" width="10" height="1"></td>
		<td><img src="images/clear.gif" width="525" height="1"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" class="title"><span class="blue">Set Up Your Profile</span></td>
	</tr>
	<tr>
		<td colspan="3"><img src="images/clear.gif" width="1" height="15"></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td class="content">
		
Please enter the &quot;Already Trained&quot; key to set-up your profile.
<form method="post" action="login.php">
<input type="hidden" name="submit" value="1">
<table>
	<tr>
		<td class="content"><b>Key</b></td>
		<td><input type="password" name="password_in" value=""></td>
		<td><input src="images/submit.gif" type="image" border="0"></td>
	</tr>
</table>

</form>


		
		</td>
	</tr>
</table>
<p>&nbsp;
</body>
</html>
