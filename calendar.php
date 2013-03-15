<?
include("includes/DB.inc");
include("includes/password.inc");

$dbh=new DB;

$user_id=checkPassword($dbh,$email_cookie,$password_cookie);
//$today_unix=date();
$today=date("Y-m-d");
$today_u=mktime(0, 0, 0);
$cutoff_day_u=$today_u+259200; 

if ($user_id==0) {
	if (checkPassword($dbh,"setup",$password_in)==0) {
		header("Location: login.php");
	}
}

if ($user_id) {
	$data_user=getUserData($dbh,$user_id);
	$user_name=$data_user->first_name." ".$data_user->last_name;

	if ($delete_date&&$delete_date>$today) {
		$sql="delete from volunteer_calendar where user_id=$user_id and calendar_date='$delete_date'";
		$result=$dbh->query($sql);
	}
	if ($add_date&&$add_date>$today) {
		$sql="select * from volunteer_calendar where user_id=".$user_id." and calendar_date='".$add_date."'";
		$result=$dbh->query($sql);
		
		if ($dbh->num_rows()==0) {		
			$sql="insert into volunteer_calendar (user_id, calendar_date) values ($user_id, '$add_date')";
			$result=$dbh->query($sql);
		}
	}
	
} 

if (empty($year)) $year= date("Y");
if (empty($month)) $month= date("n");

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
	<title>The Friends Shelter | Calendar</title>
<link href="includes/shelter_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
window.name="calendar";

if (document.images) {

	var next = new Image(); next.src = "images/next.gif";
	var nextroll = new Image(); nextroll.src = "images/next_.gif";
	
	var last = new Image(); last.src = "images/last.gif";
	var lastroll = new Image(); lastroll.src = "images/last_.gif";
}

function turnOn(imgName) {
	if (document.images) document[imgName].src =
	eval(imgName + 'roll' + '.src');
}

function turnOff(imgName) {
	if (document.images) document[imgName].src =
	eval(imgName + '.src');
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>

</head>

<body background="images/bg_calendar.gif" marginheight="0" marginwidth="0" leftmargin="0" topmargin="0">
&nbsp;<br>
<? include("includes/nav.php"); ?>

<table width="722" border="0" cellspacing="0" cellpadding="0">
  <!-- gray row -->
  <!-- Month -->
  <tr> 
    <td colspan="17"><img src="images/clear.gif" width="1" height="11"></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
    <td colspan="9">
	<table cellpadding="0" cellspacing="0" border="0" width="400">
		<tr> 
          <td><img src="images/clear.gif" width="17" height="1"></td>
          <td><img src="images/clear.gif" width="150" height="1"></td>
          <td><img src="images/clear.gif" width="17" height="1"></td>
          <td><img src="images/clear.gif" width="216" height="1"></td>
        </tr>
        <tr> 
          <td align="right"><img src="images/ltab.gif" width="17" height="26"></td>
          <td class="month" align="center"><? echo $month_name." ".$year; ?></td>
          <td><img src="images/rtab.gif" width="17" height="26"></td>
          <td class="welcome">&nbsp;<? if ($user_id) echo "Welcome, $user_name"; ?></td>
        </tr>
      </table></td>
    <td valign="top"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="right"><a href="calendar.php?month=<? echo $prev_month; ?>&year=<? echo $prev_year; ?>" class="TopNav">&nbsp;&lt; Last Month&nbsp;</a></td>
	<td><img src="images/orange.gif" width="1" height="14" vspace="2"></td>
	<td><a href="calendar.php?month=<? echo $next_month; ?>&year=<? echo $next_year; ?>" class="TopNav">&nbsp;Next Month &gt;&nbsp;</a></td>
	<td colspan="2"><img src="images/clear.gif" width="1" height="1"></td>
  </tr>
  <!-- first week -->
  <tr> 
    <td class="day">&nbsp;</td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="center" class="day">SUNDAY</td>
    <td valign="top" class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="center" class="day">MONDAY</td>
    <td valign="top" class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="center" class="day">TUESDAY</td>
    <td valign="top" class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="center" class="day">WEDNESDAY</td>
    <td valign="top" class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="center" class="day">THURSDAY</td>
    <td valign="top" class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="center" class="day">FRIDAY</td>
    <td valign="top" class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td align="center" class="day">SATURDAY</td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td valign="top" class="gray"><img src="images/clear.gif" width="1" height="1"></td>
  </tr>
  <!-- spacer -->
  <tr> 
    <td class="gray"><img src="images/clear.gif" width="15" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="98" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="98" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="98" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="98" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="98" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="98" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="98" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="1" height="1"></td>
    <td class="gray"><img src="images/clear.gif" width="15" height="1"></td>
  </tr>
  <tr> 
    <td rowspan="1" class="white">&nbsp;</td>
    <td rowspan="1" class="white">&nbsp;</td>
<?
	for ($i = 1;$i <= $front_day_offset; $i++) {
?>
    <td align="center" valign="top" class="calendar"> <table width="90">
        <tr> 
          <td valign="top" class="calendar">&nbsp;</td>
        </tr>
        <tr> 
          <td class="calendar" valign="top">&nbsp;</td>
        </tr>
      </table></td>
    <td rowspan="1" valign="top" class="gray"><img src="images/clear.gif" width="1" height="90"></td>
<?
	}
	
	for ($i = 1;$i <= $days_in_month; $i++){
		$this_today_u=mktime(0,0,0,$month,$i,$year);
		$this_today=date("Y-m-d", $this_today_u);
	
		echo "<td align=\"center\" valign=\"top\" class=\"calendar\"> <table width=\"90\">\r\n";
		echo "<tr>\r\n";
		echo "<td valign=\"top\" class=\"calendar\"><b>$i</b></td>\r\n";
		echo "</tr>\r\n";
		echo "<tr>\r\n";
		echo "<td class=\"calendar\" valign=\"top\">";		
		
		//is user signed up for given day
		$sql="select u.user_id, u.first_name, u.last_name from users u, volunteer_calendar v where u.user_id=v.user_id and v.calendar_date='$this_today' order by last_name";
		$result=$dbh->query($sql);
		
		unset($me);
		
		while ($data=$dbh->next_record()) {
			if ($data->user_id==$user_id) $me=true;
			echo $data->first_name." ".$data->last_name."<br>";
		}
	
		if ($this_today_u>$cutoff_day_u) {
			if ($me) {
				echo "<a href=\"#\" onClick=\"MM_openBrWindow('delete.php?d=$this_today&month=$month&year=$year','add','scrollbars=no,resizable=yes,width=400,height=400')\"><img src=\"images/delete.gif\" width=\"88\" height=\"15\" border=\"0\"></a>";
			} else {
				if ($dbh->num_rows()<2) echo "<a href=\"#\" onClick=\"MM_openBrWindow('add.php?d=$this_today&month=$month&year=$year','add','scrollbars=no,resizable=yes,width=400,height=400')\"><img src=\"images/add.gif\" width=\"82\" height=\"15\" border=\"0\"></a>";
			}
		} else {
			if ($this_today_u>=$today_u) {
				echo "<br><span class=\"warningText\">call to sign up or cancel.</span>";
			}
		}
		
		echo "</td>\r\n";
		echo "</tr>\r\n";
		echo "</table></td>\r\n";
		
		if (((($i + $front_day_offset) % 7) == 0) && ($i <> $days_in_month)) {
			echo "<td rowspan=\"1\" class=\"white\">&nbsp;</td>\r\n";
			echo "<td rowspan=\"1\" class=\"white\">&nbsp;</td>\r\n";
			echo "</tr>\r\n";
			echo "<tr>\r\n";
   			echo "<td class=\"white\"><img src=\"images/clear.gif\" width=\"1\" height=\"1\"></td>\r\n";
   			echo "<td class=\"white\"><img src=\"images/clear.gif\" width=\"1\" height=\"1\"></td>\r\n";
   			echo "<td class=\"gray\" colspan=\"13\"><img src=\"images/clear.gif\" width=\"1\" height=\"1\"></td>\r\n";
   			echo "<td class=\"white\"><img src=\"images/clear.gif\" width=\"1\" height=\"1\"></td>\r\n";
   			echo "<td class=\"white\"><img src=\"images/clear.gif\" width=\"1\" height=\"1\"></td>\r\n";
			echo "</tr>\r\n";
			echo "<tr><td rowspan=\"1\" class=\"white\">&nbsp;</td>\r\n";
			echo "<td rowspan=\"1\" class=\"white\">&nbsp;</td>\r\n";
		} else {
			//NOTE: THIS NEEDS TO BE FIXED FOR MONTHS ENDING ON SATURDAY
			echo "	<td rowspan=\"1\" valign=\"top\" class=\"gray\"><img src=\"images/clear.gif\" width=\"1\" height=\"90\"></td>";
		}
	}
	for ($i=0;$i<$rear_day_offset;$i++)  {
?>
    <td align="center" valign="top" class="calendar"> <table width="90">
        <tr> 
          <td valign="top" class="calendar">&nbsp;</td>
        </tr>
        <tr> 
          <td class="calendar" valign="top">&nbsp;</td>
        </tr>
      </table></td>
<?
		if ($i<($rear_day_offset-1)) {
			echo "	<td rowspan=\"1\" valign=\"top\" class=\"gray\"><img src=\"images/clear.gif\" width=\"1\" height=\"90\"></td>";
		}
	}
?>
	<td rowspan="1" class="white">&nbsp;</td>
	<td rowspan="1" class="white">&nbsp;</td>
	</tr>
</table>
<p>&nbsp;</p>




</body>
</html>
