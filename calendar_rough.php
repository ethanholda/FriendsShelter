<?	
include("includes/DB.inc");
include("includes/password.inc");

$dbh=new DB;

$user_id=checkPassword($dbh,$email_cookie,$password_cookie);

if ($user_id==0) {
	header("Location: registration_form.php");
} else {
	$data_user=getUserData($dbh,$user_id);
}

if (empty($year)) $year =  date("Y");
if (empty($month)) $month =  date("n");

$month_name=date("F",mktime( 0, 0, 0, $month, 1, $year));

$prev_month=$month-1;
if ($prev_month<1) {
	$prev_month=12;
	$prev_year=$year-1;
} else {
	$prev_year=$year;
}

$next_month=$month+1;
if ($next_month>12) {
	$next_month=1;
	$next_year=$year+1;
} else {
	$next_year=$year;
}

$days_in_month = date("t",mktime( 0, 0, 0, $month, 1, $year));
$front_day_offset = date("w",mktime( 0, 0, 0, $month, 1, $year));
if ($front_day_offset<0) $front_day_offset+=7;
$rear_day_offset=6-date("w",mktime(0,0,0,$month,$days_in_month,$year));	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Friends Shelter</title>
<link rel="stylesheet" type="text/css" href="includes/style.css">
</head>

<body marginheight="0" marginwidth="0" leftmargin="0" topmargin="0" bgcolor=aaaaaa>

<table cellpadding=2 cellspacing=1 border=0>
	<tr>
		<td></td>
		<td colspan=7 class=header>Welcome, <? echo $data_user->first_name." ".$data_user->last_name; ?></td></tr>
	<tr>
		<td></td>
		<td align=center bgcolor=ff9400 colspan=2>///<? echo "$month_name, $year"; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td align=center bgcolor=7BB3C0>
		<a href="calendar.php?month=<? echo $prev_month; ?>&year=<? echo $prev_year; ?>">
			&lt;&lt; LAST MONTH</a></td>
		<td align=center bgcolor=7BB3C0>
		<a href="calendar.php?month=<? echo $next_month; ?>&year=<? echo $next_year; ?>">
			NEXT MONTH &gt;&gt;</a></td></tr>
	<tr>
		<td></td>
		<td align=center bgcolor=7BB3C0>SUNDAY<br><img src="images/blank.gif" width=100 height=1></td>
		<td align=center bgcolor=7BB3C0>MONDAY<br><img src="images/blank.gif" width=100 height=1></td>
		<td align=center bgcolor=7BB3C0>TUESDAY<br><img src="images/blank.gif" width=100 height=1></td>
		<td align=center bgcolor=7BB3C0>WEDNESDAY<br><img src="images/blank.gif" width=100 height=1></td>
		<td align=center bgcolor=7BB3C0>THURSDAY<br><img src="images/blank.gif" width=100 height=1></td>
		<td align=center bgcolor=7BB3C0>FRIDAY<br><img src="images/blank.gif" width=100 height=1></td>
		<td align=center bgcolor=7BB3C0>SATURDAY<br><img src="images/blank.gif" width=100 height=1></td></tr>
	<tr><td><img src="images/blank.gif" width=1 height=100></td>
<?
	for ($i = 1;$i <= $front_day_offset; $i++) echo "<td bgcolor=ffffff></td>";
	for ($i = 1;$i <= $days_in_month; $i++){
		if ($i==date("j") && $month==date("n") && $year==date("Y")) echo "<td bgcolor=ff940 valign=top><b>$i</b>";
		else echo "<td bgcolor=ffffff valign=top>$i";		
		echo "<br><br>";
		
		$sql="select u.user_id, u.first_name, u.last_name from users u, volunteer_calendar v where u.user_id=v.user_id and v.calendar_date='".date("Y-m-d",mktime(0,0,0,$month,$i,$year))."' order by last_name";
		$result=$dbh->query($sql);
		
		unset($me);
		
		while ($data=$dbh->next_record()) {
			if ($data->user_id==$user_id) $me=true;
			echo $data->first_name." ".$data->last_name."<br>";
		}
		/*	
		if ($me) {
				echo "<a href=\"#\">DELETE ME</a>";
		} else {
			if ($dbh->num_rows()<2) echo "<a href='#'>ADD ME</a>";
		}
		*/
		
		if ($me) {
				echo "<a href=\"#\"><img src=\"images/delete.gif\" border=0></a>";
		} else {
			if ($dbh->num_rows()<2) echo "<a href='#'><img src=\"images/add.gif\" border=0></a>";
		}
		
		
		echo "</td>";
		if (((($i + $front_day_offset) % 7) == 0) && ($i <> $days_in_month)) echo "</tr><tr><td><img src=\"images/blank.gif\" width=1 height=100></td>";
	}
	for ($i=0;$i<$rear_day_offset;$i++)  echo "<td bgcolor=ffffff></td>";
	
?>
	</tr>
</table>

</body>
</html>