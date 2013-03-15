<? 
if ($unsigned_date_in) {
	$tmp=split("-",$unsigned_date_in);
	$this_month=$tmp[1];
	$this_year=$tmp[0];
} else {
	$this_month=date("m"); 
	$this_year=date("Y");
}

echo $this_year."-".$this_month."<br><br>";

$m=$this_month;
$y=$this_year;

for ($i=1;$i<13;$i++) {
	if ($m>12) {
		$m=1;
		$y=$y+1;
	}
	
	echo "$y-$m: ".date("F",mktime(0,0,0,$m,1,$y))."<br>";
	$m++;
}



?>