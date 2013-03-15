<? 
if ($unsigned_date_in) {
	$tmp=split("-",$unsigned_date_in);
	$this_month=$tmp[1];
	$this_year=$tmp[0];
} else {
	$this_month=date("m"); 
	$this_year=date("Y");
}
?>

<table width="722" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td><img src="../images/clear.gif" width="16" height="8"></td>	
    	<td><a href="index.html"><img src="../images/logo.gif" width="142" height="16" border="0" alt="The Friends Shelter Homepage."></a></td>
	</tr>
	<tr>
		<td><img src="../images/clear.gif" width="16" height="8"></td>	
		<td align="right">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td nowrap><a href="index.php" class="TopNav">ALL VOLUNTEERS</a></td>
					<td><img src="../images/orange.gif" width="1" height="14" hspace="6"></td>
					<td nowrap><a href="volunteer_addresses.php" class="TopNav">VOLUNTEER ADDRESS LIST</a></td>
					<td><img src="../images/orange.gif" width="1" height="14" hspace="6"></td>
					<td nowrap><a href="calendar.php" class="TopNav">CALENDAR</a></td>
					<td><img src="../images/orange.gif" width="1" height="14" hspace="6"></td>
					
	 			        <td><a href="index.php" class="TopNav">ADD/EDIT/DELETE/CHECK VOLUNTEERS</a></td>
					<td><img src="../images/orange.gif" width="1" height="14" hspace="6"></td>
					 <form name="unsigned" method=post action="index.php">
					 <td nowrap><b>UNSIGNED VOLUNTEERS:</b> 
						<select name="unsigned_date_in">
						<option>select month</option>
						<?
						$m=$this_month;
						$y=$this_year;
						
						for ($i=1;$i<13;$i++) {
							if ($m>12) {
								$m=1;
								$y=$y+1;
							}
							
							echo "<option value=\"$y-$m\"".(($unsigned_date_in==($y."-".$m))?" selected":"").">".date("F",mktime(0,0,0,$m,1,$y))."</option>\r\n";
							$m++;
						}
						?>
						</select>
							&nbsp;&nbsp;<input type=submit value="go"></td>
					</form>
				</tr>
			</table>
		</td>
		</tr>
</table>