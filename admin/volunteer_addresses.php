<?
include("includes/DB.inc");
include("../includes/password.inc");

$dbh=new DB;

$sql="select user_id, first_name, last_name, street_address, city, state, zipcode from users where email!='setup' order by last_name";
$result=$dbh->query($sql);

$c=0;
while ($data_volunteers[$c]=$dbh->next_record()) {
	$c++;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>The Friends Shelter | Volunteer List</title>
<link href="../includes/shelter_style.css" rel="stylesheet" type="text/css">
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
    <td colspan="13" class="welcome">Welcome, Administrator</td>
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
		<td><img src="../images/clear.gif" width="65" height="16"></td>
		<td><img src="../images/clear.gif" width="10" height="1"></td>
		<td><img src="../images/clear.gif" width="625" height="1"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" class="title"><span class="blue">Volunteer Address List</span></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">	
		<a href="profile.php">add new user</a><br>
		<a href="export_addresses.php?file_type=xls">export full address list as Excel spreadsheet</a><br>
		<a href="export_addresses.php?file_type=palm">export full address list in Palm format</a></td>
	</tr>
	<tr>
		<td colspan="3"><img src="../images/clear.gif" width="1" height="15"></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td class="content">
		
			<table width="550" cellpadding=4 cellspacing=0>
				<tr>
					<td class="content"><b>Name</b></td>
					<td class="content"><b>Street Address</b></td>
					<td class="content"><b>City</b></td>
					<td class="content"><b>State</b></td>
					<td class="content"><b>Zipcode</b></td>
				</tr>
<? 
	for ($i=0;$i<count($data_volunteers)-1;$i++) {
		if (($i%2)==0) $td_bgcolor="ffffff";
		else $td_bgcolor="cccccc";
?>
				<tr>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $data_volunteers[$i]->last_name.",  ".$data_volunteers[$i]->first_name; ?></td>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $data_volunteers[$i]->street_address; ?></td>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $data_volunteers[$i]->city; ?></td>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $data_volunteers[$i]->state; ?></td>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $data_volunteers[$i]->zipcode; ?></td>
				</tr>
<?	
	}
?>
				
			</table>
		
		
		</td>
	</tr>


</body>
</html>
