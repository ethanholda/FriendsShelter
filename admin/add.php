<?
include("includes/DB.inc");

$dbh=new DB;

$sql="select user_id, first_name, last_name from users order by last_name";
$result=$dbh->query($sql);

$c=0;
while ($data_volunteers[$c]=$dbh->next_record()) {
	$c++;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>The Friends Shelter | Admin | Add Volunteer</title>
<link href="../includes/shelter_style.css" rel="stylesheet" type="text/css">
</head>

<body background="images/bg.gif" marginheight="0" marginwidth="0" leftmargin="0" topmargin="0" onBlur="window.focus()">

<table width="400" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td><img src="../images/clear.gif" width="16" height="60"></td>	
    <td><a href="index.html"><img src="../images/logo.gif" width="142" height="16" border="0" alt="The Friends Shelter Homepage."></a></td>
		
    <td align="right">&nbsp;</td>
	</tr>
</table>
<br>

<table width="400" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td><img src="../images/clear.gif" width="65" height="36"></td>
		<td><img src="../images/clear.gif" width="10" height="1"></td>
		<td><img src="../images/clear.gif" width="625" height="1"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		
    <td colspan="2" class="title"><span class="blue">Add Which User?</span></td>
	</tr>
	<tr>
		<td colspan="3"><img src="../images/clear.gif" width="1" height="15"></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		
    <td class="content">
      <table width="200" border="0" cellspacing="0" cellpadding="2">
<? 
for ($i=0;$i<count($data_volunteers)-1;$i++) {
	if (($i%2)==0) $td_bgcolor="ffffff";
	else $td_bgcolor="cccccc";
?>
        <tr>
          <td><a href="calendar.php?<? echo "add_date=$d&month=$month&year=$year&user_id=".$data_volunteers[$i]->user_id; ?>" target="calendar" onclick="window.close()"><? echo $data_volunteers[$i]->last_name.",  ".$data_volunteers[$i]->first_name; ?></a></td>
        </tr>
<?
}
?>
      </table>
      <p>&nbsp; </p>
      <p>&nbsp;
      </td>
	</tr>
</table>
<p>&nbsp;
</body>
</html>
