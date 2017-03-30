<?
include("../includes/DB.inc");
include("../includes/password.inc");

$dbh=new DB;

$sql="select * from users where email != 'setup' order by last_name";
$result=$dbh->query($sql);

if ($file_type=="xls") {
	header("Content-Type: application/ms-excel; name='excel'");
	header("Content-Disposition: attachment; filename=friends_addresses.xls"); 

	echo "<table border=1>\r\n";
	echo "<tr>\r\n";
	echo "<td><b>name</b></td>\r\n";
	echo "<td><b>email</b></td>\r\n";
	echo "<td><b>street address</b></td>\r\n";
	echo "<td><b>city</b></td>\r\n";
	echo "<td><b>state</b></td>\r\n";
	echo "<td><b>zipcode</b></td>\r\n";
	echo "<td><b>phone (h)</b></td>\r\n";
	echo "<td><b>phone (w)</b></td>\r\n";
	echo "<td><b>phone (m)</b></td>\r\n";
	echo "<td><b>emergency contact</b></td>\r\n";
	echo "<td><b>contact method</b></td></tr>\r\n";
	
	while ($data=$dbh->next_record()) {
		echo "<tr>\r\n";
		echo "<td>".$data->last_name.", ".$data->first_name."</td>\r\n";
		echo "<td>".$data->email."</td>\r\n";
		echo "<td>".$data->street_address."</td>\r\n";
		echo "<td>".$data->city."</td>\r\n";
		echo "<td>".$data->state."</td>\r\n";
		echo "<td>".$data->zipcode."</td>\r\n";
		echo "<td>".$data->phone_home."</td>\r\n";
		echo "<td>".$data->phone_work."</td>\r\n";
		echo "<td>".$data->phone_mobile."</td>\r\n";
		echo "<td>".($data->is_emergency_contact?"YES":"")."</td>\r\n";
		echo "<td>".$data->preferred_contact_method."</td></tr>\r\n";		
	}
	
	echo "</table>";
} else if ($file_type="palm") {
	header("Content-Type: text/plain");
	header("Content-Disposition: attachment; filename=friends_addresses.txt"); 

	while ($data=$dbh->next_record()) {
		echo $data->last_name."\t";
		echo $data->first_name."\t";
		echo $data->email."\t";
		echo $data->street_address."\t";
		echo $data->city."\t";
		echo $data->state."\t";
		echo $data->zipcode."\t";
		echo $data->phone_home."\t";
		echo $data->phone_work."\t";
		echo $data->phone_mobile."\t";
		echo ($data->is_emergency_contact?"YES":"NO")."\t";
		echo $data->preferred_contact_method."\t\r\n";		
	}
} else {
	echo "Please specify a file type.";
}
?>