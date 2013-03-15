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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>The Friends Shelter | Feedback</title>
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
		<td colspan="2" class="title"><span class="blue">Feedback</span></td>
	</tr>
	<tr>
		<td colspan="3"><img src="images/clear.gif" width="1" height="15"></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td class="content">
		<b>Get in touch with the shelter!</b>

		<p>
		<b>about the shelter:</b><br/>
        Katy Homans<br/>
        212 352-0957<br/>
        <a href="mailto:katy@katyhomans.com">katy@katyhomans.com</a
        </p>
        
        <p> 
        <b>about ordering food supplies:</b><br/>
        Steve Smith<br/>
        646 409-8899<br/>
        <a href="mailto:steviepesce@gmail.com">steviepesce@gmail.com</a>
        </p>
         
        <p>
        <b>about training:</b><br/>
        Katy Homans<br/>
        212 352-0957<br/>
        <a href="mailto:katy@katyhomans.com">katy@katyhomans.com</a
        </p>
        
        <p> 
        <b>trainers:</b><br/>
        Jennifer Barton<br/>
        <a href="mailto:xjjb@aol.com">xjjb@aol.com</a><br/><br/>
        
        Morgan Harting<br/>
        <a href="mailto:mharting@hotmail.com">mharting@hotmail.com</a><br/><br/>
        
        Katy Homans<br/><a href="mailto:katy@katyhomans.com">katy@katyhomans.com</a>
		</p>
		
		</td>
	</tr>


</body>
</html>
