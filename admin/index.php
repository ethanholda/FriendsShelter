<?
include("includes/DB.inc");

$dbh=new DB;

if ($delete_user_id) {
	$sql="delete from users where user_id=$delete_user_id";
	$result=$dbh->query($sql);
}

$sql="select user_id, first_name, last_name, email from users where email!='setup' order by last_name";
$result=$dbh->query($sql);

$c=0;
while ($data_temp[$c]=$dbh->next_record()) {
	$c++;
}

if ($unsigned_date_in) {
	$tmp=split("-",$unsigned_date_in);
	$this_month=$tmp[1];
	$this_year=$tmp[0];
	
	$c=0;
	for ($i=0;$i<count($data_temp)-1;$i++) {
		$sql="select * from volunteer_calendar where month(calendar_date)=$this_month and year(calendar_date)=$this_year and user_id=".$data_temp[$i]->user_id;
		$result=$dbh->query($sql);
		
		if ($dbh->num_rows()==0) {
			$data_volunteers[$c]=$data_temp[$i];
			$c++;
		}
	}
} else {
	$data_volunteers=$data_temp;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>The Friends Shelter | Volunteer List</title>
<link href="../includes/shelter_style.css" rel="stylesheet" type="text/css">
<script language=javascript>
function gotoDeleteUser(user_name, user_id) {
	if (confirm("Are you sure you want to delete "+user_name+"?")) {
		document.location="index.php?delete_user_id="+user_id;
		return true;
	} else {
		return false;
	}
}
</script>
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
		<td colspan="2" class="title"><span class="blue">Volunteer List</span></td>
	</tr>
<?
if ($inactive) {
?>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2"><span class="blue">Volunteers listed as 'active' but who have not volunteered for more than 6 months.</span></td>
	</tr>
<?
}
?>	
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">	
		<a href="profile.php">add new user</a><br>
		<a href="export_addresses.php?file_type=xls">export full address list as Excel spreadsheet</a><br>
		<a href="export_addresses.php?file_type=palm">export full address list in Palm format</a></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">	
		<a href="index.php?inactive">check for inactive volunteers</a></td>
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
					<td class="content"><b>Email Address</b></td>
					<td class="content"><b>Last 3 Volunteer Dates</b></td>
					<td class="content"></td>
				</tr>
<? 
	for ($i=0;$i<count($data_volunteers)-1;$i++) {
		if (($i%2)==0) $td_bgcolor="ffffff";
		else $td_bgcolor="cccccc";
	
		$sql="select calendar_date from volunteer_calendar where user_id=".$data_volunteers[$i]->user_id." order by calendar_date desc limit 3";
		$result=$dbh->query($sql);
		
		$dates="";
		$c=0;
		while ($data_dates=$dbh->next_record()) {
			$dates.=$data_dates->calendar_date;
			if ($c<$dbh->num_rows()-1) $dates.=", ";
			$c++;
		}
		
?>
				<tr>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $data_volunteers[$i]->last_name.",  ".$data_volunteers[$i]->first_name; ?></td>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $data_volunteers[$i]->email; ?></td>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><? echo $dates; ?></td>
					<td class="content" valign=top bgcolor=<? echo $td_bgcolor; ?> nowrap><a href="profile.php?user_id=<? echo $data_volunteers[$i]->user_id; ?>">edit</a> | <a href="#" onclick="gotoDeleteUser(<? echo "'".$data_volunteers[$i]->first_name." ".$data_volunteers[$i]->last_name."',".$data_volunteers[$i]->user_id; ?>);">delete</a></td>
				</tr>
<?	
	}
?>
				
			</table>
		
		
		</td>
	</tr>


</body>
</html>

