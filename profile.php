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



if ($email_cookie=="setup") unset($user_id);



if ($submit) {	

	if ($user_id_in) {

		$sql_submit="update users set email='$email_in', password='$password_in', first_name='$first_name_in', last_name='$last_name_in', street_address='$street_address_in', city='$city_in', state='$state_in', zipcode='$zipcode_in', phone_home='$phone_home_in', phone_work='$phone_work_in', phone_mobile='$phone_mobile_in', is_active='$is_active_in', is_emergency_contact='$is_emergency_contact_in', preferred_contact_method='$preferred_contact_method_in' where user_id=$user_id_in";

		$result=$dbh->query($sql_submit);

	} else {

		$sql_submit="insert into users (email, password, first_name, last_name,	street_address,	city, state, zipcode, phone_home, phone_work, phone_mobile, is_active, is_emergency_contact, preferred_contact_method) values ('$email_in', '$password_in', '$first_name_in', '$last_name_in',	'$street_address_in', '$city_in', '$state_in', '$zipcode_in', '$phone_home_in', '$phone_work_in', '$phone_mobile_in', '$is_active_in', '$is_emergency_contact_in', '$preferred_contact_method_in')";

		$result=$dbh->query($sql_submit);

		$user_id=$dbh->insert_id("users");

		setPassword($email_in,$password_in);

		header("location: calendar.php");

	}

} 



if ($user_id) {

	$data_user=getUserData($dbh,$user_id);

	$user_name=$data_user->first_name." ".$data_user->last_name;

} 

?>



<html>

<head>

	<title>The Friends Shelter | Feedback</title>

<link href="includes/shelter_style.css" rel="stylesheet" type="text/css">

<script language=javascript>

function checkForm(form) {

	if (form.first_name_in.value == "") {

		alert("You need to enter a First Name!");

		return false;

	} else	if (form.last_name_in.value == "") {

		alert("You need to enter a Last Name!");

		return false;

	} else if (form.email_in.value=="" || (form.email_in.value.search(/(.+)@(.+)\.(.+)/)<0)) {

		alert("You need to enter a valid email address!");

		return false;

	} else if (form.password_in.value=="") {

		alert("Sorry!  You need to type in a proper password.");

		return false;

	} else if (form.password_in.value.length<5) {

		alert("Sorry!  Your password must be at least 5 characters long.");

		return false;

	} else if (form.password_in.value!=form.password_confirm_in.value) {

		alert("Sorry!  You did not retype your password correctly.");

		return false;

	} else if (form.street_address_in.value=="") {

		alert("Sorry!  You must enter a street address.");

		return false;

	} else if (form.city_in.value=="") {

		alert("Sorry!  You must enter a city.");

		return false;

	} else if (form.zipcode_in.value.length<5||(form.zipcode_in.value.search(/[0-9]{5,}/)<0)) {

		alert("Sorry!  You must enter a proper zipcode.");

		return false;

	} else if (form.phone_home_in.value==""&&form.phone_work_in.value==""&&form.phone_mobile_in.value=="") {

		alert("Sorry!  You must at least one contact phone number.");

		return false;

	} else {

		return true;

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

		<td colspan="2" class="title"><span class="blue">Change My Profile</span></td>

	</tr>

	<tr>

		<td colspan="3"><img src="images/clear.gif" width="1" height="15"></td>

	</tr> 

	<tr>

		<td colspan="2">&nbsp;</td>

		<td class="content">

		<form action="<? echo $PHP_SELF; ?>" method=post onsubmit="return checkForm(this)">

		<input type="hidden" name="user_id_in" value="<? echo $user_id; ?>">

		<input type="hidden" name="submit" value="1">

			<table cellpadding="10">

		<tr>

				<td class="content" align="right"><b>First Name</b></td>

				<td><input class="profiletext" type="text" name="first_name_in" value="<? echo $data_user->first_name; ?>" size="24" maxlength="50"></td>

				<td>&nbsp;</td>

			</tr> 

			<tr>

				<td class="content" align="right"><b>Last Name</b></td>

				<td><input class="profiletext" type="text" name="last_name_in" value="<? echo $data_user->last_name; ?>" size="24" maxlength="50"></td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Email</b></td>

				<td><input class="profiletext" type="text" name="email_in" value="<? echo $data_user->email; ?>" size="24" maxlength="60"></td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Password</b></td>

				<td><input class="profiletext" type="password" name="password_in" value="<? echo $data_user->password; ?>" size="24" maxlength="8"></td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Password</b></td>

				<td><input class="profiletext" type="password" name="password_confirm_in" value="<? echo $data_user->password; ?>" size="24" maxlength="8"></td>

				<td>&nbsp;</td>

			</tr> 

			<tr>

				<td class="content" align="right"><b>Street Address</b></td>

				<td><input class="profiletext" type="text" name="street_address_in" value="<? echo $data_user->street_address; ?>" size="24" maxlength="60"></td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>City</b></td>

				<td><input class="profiletext" type="text" name="city_in" value="<? echo $data_user->city; ?>" size="24" maxlength="30"></td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>State</b></td>

				<td><select name="state_in" class="profiletext">

			<option value="">

			Select State

			 <option value="AL"<? if ($data_user->state=="AL") echo " selected"; ?>>Alabama

			 <option value="AK"<? if ($data_user->state=="AK") echo " selected"; ?>>Alaska

			 <option value="AZ"<? if ($data_user->state=="AZ") echo " selected"; ?>>Arizona

			 <option value="AR"<? if ($data_user->state=="AR") echo " selected"; ?>>Arkansas

			 <option value="CA"<? if ($data_user->state=="CA") echo " selected"; ?>>California

			 <option value="CO"<? if ($data_user->state=="CO") echo " selected"; ?>>Colorado

			 <option value="CT"<? if ($data_user->state=="CT") echo " selected"; ?>>Connecticut

			 <option value="DE"<? if ($data_user->state=="DE") echo " selected"; ?>>Delaware

			 <option value="FL"<? if ($data_user->state=="FL") echo " selected"; ?>>Florida

			 <option value="GA"<? if ($data_user->state=="GA") echo " selected"; ?>>Georgia

			 <option value="HI"<? if ($data_user->state=="HI") echo " selected"; ?>>Hawaii

			 <option value="ID"<? if ($data_user->state=="ID") echo " selected"; ?>>Idaho

			 <option value="IL"<? if ($data_user->state=="IL") echo " selected"; ?>>Illinois

			 <option value="IN"<? if ($data_user->state=="IN") echo " selected"; ?>>Indiana

			 <option value="IA"<? if ($data_user->state=="IA") echo " selected"; ?>>Iowa

			 <option value="KS"<? if ($data_user->state=="KS") echo " selected"; ?>>Kansas

			 <option value="KY"<? if ($data_user->state=="KY") echo " selected"; ?>>Kentucky

			 <option value="LA"<? if ($data_user->state=="LA") echo " selected"; ?>>Louisiana

			 <option value="ME"<? if ($data_user->state=="ME") echo " selected"; ?>>Maine

			 <option value="MD"<? if ($data_user->state=="MD") echo " selected"; ?>>Maryland

			 <option value="MA"<? if ($data_user->state=="MA") echo " selected"; ?>>Massachusetts

			 <option value="MI"<? if ($data_user->state=="MI") echo " selected"; ?>>Michigan

			 <option value="MN"<? if ($data_user->state=="MN") echo " selected"; ?>>Minnesota

			 <option value="MS"<? if ($data_user->state=="MS") echo " selected"; ?>>Mississippi

			 <option value="MO"<? if ($data_user->state=="MO") echo " selected"; ?>>Missouri

			 <option value="MT"<? if ($data_user->state=="MT") echo " selected"; ?>>Montana

			 <option value="NE"<? if ($data_user->state=="NE") echo " selected"; ?>>Nebraska

			 <option value="NV"<? if ($data_user->state=="NV") echo " selected"; ?>>Nevada

			 <option value="NH"<? if ($data_user->state=="NH") echo " selected"; ?>>New Hampshire

			 <option value="NJ"<? if ($data_user->state=="NJ") echo " selected"; ?>>New Jersey

			 <option value="NM"<? if ($data_user->state=="NM") echo " selected"; ?>>New Mexico

			 <option value="NY"<? if ($data_user->state=="NY") echo " selected"; ?>>New York

			 <option value="NC"<? if ($data_user->state=="NC") echo " selected"; ?>>North Carolina

			 <option value="ND"<? if ($data_user->state=="ND") echo " selected"; ?>>North Dakota

			 <option value="OH"<? if ($data_user->state=="OH") echo " selected"; ?>>Ohio

			 <option value="OK"<? if ($data_user->state=="OK") echo " selected"; ?>>Oklahoma

			 <option value="OR"<? if ($data_user->state=="OR") echo " selected"; ?>>Oregon

			 <option value="PA"<? if ($data_user->state=="PA") echo " selected"; ?>>Pennsylvania

			 <option value="RI"<? if ($data_user->state=="RI") echo " selected"; ?>>Rhode Island

			 <option value="SC"<? if ($data_user->state=="SC") echo " selected"; ?>>South Carolina

			 <option value="SD"<? if ($data_user->state=="SD") echo " selected"; ?>>South Dakota

			 <option value="TN"<? if ($data_user->state=="TN") echo " selected"; ?>>Tennessee

			 <option value="TX"<? if ($data_user->state=="TX") echo " selected"; ?>>Texas

			 <option value="UT"<? if ($data_user->state=="UT") echo " selected"; ?>>Utah

			 <option value="VT"<? if ($data_user->state=="VT") echo " selected"; ?>>Vermont

			 <option value="VA"<? if ($data_user->state=="VA") echo " selected"; ?>>Virginia

			 <option value="WA"<? if ($data_user->state=="WA") echo " selected"; ?>>Washington

			 <option value="DC"<? if ($data_user->state=="DC") echo " selected"; ?>>Washington D.C.

			 <option value="WV"<? if ($data_user->state=="WV") echo " selected"; ?>>West Virginia

			 <option value="WI"<? if ($data_user->state=="WI") echo " selected"; ?>>Wisconsin

			 <option value="WY"<? if ($data_user->state=="WY") echo " selected"; ?>>Wyoming

			</select></td>

				<td>&nbsp;</td>

			</tr> 

			<tr>

				<td class="content" align="right"><b>Zip Code</b></td>

				<td><input class="profiletext" type="name" name="zipcode_in" value="<? echo $data_user->zipcode; ?>" size="24" maxlength="5"></td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Home Phone</b></td>

				<td><input class="profiletext" type="text" name="phone_home_in" value="<? echo $data_user->phone_home; ?>" size="24" maxlength="20">

</td>

<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Work Phone</b></td>

				<td><input class="profiletext" type="text" name="phone_work_in" value="<? echo $data_user->phone_work; ?>" size="24" maxlength="20">

</td>

<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Mobile Phone</b></td>

				<td><input class="profiletext" type="text" name="phone_mobile_in" value="<? echo $data_user->phone_mobile; ?>" size="24" maxlength="20">

</td>

<td>&nbsp;</td>

			</tr> 

			<tr>

				<td class="content" align="right"><b>Prefered Method of Contact?</b></td>

				<td><select name="preferred_contact_method_in" class="profiletext">

		<option value="home"<? if ($data_user->preferred_contact_method=="home"||!$user_id) echo " selected"; ?>>home</option>

		<option value="work"<? if ($data_user->preferred_contact_method=="work") echo " selected"; ?>>work</option>

		<option value="mobile"<? if ($data_user->preferred_contact_method=="mobile") echo " selected"; ?>>mobile</option>

		<option value="email"<? if ($data_user->preferred_contact_method=="email") echo " selected"; ?>>email</option>

	</select></td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Active/Inactive</b></td>

				<td class="content"><input type="radio" name="is_active_in" value="1"<? if ($data_user->is_active==1||!$user_id) echo " checked"; ?>>Active&nbsp;

				<input type="radio" name="is_active_in" value="0"<? if ($user_id&&$data_user->is_active==0) echo " checked"; ?>>Inactive</td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td class="content" align="right"><b>Contact to Volunteer in Emergency?</b></td>

				<td class="content"><input type="radio" name="is_emergency_contact_in" value="1"<? if ($data_user->is_emergency_contact==1||!$user_id) echo " checked"; ?>>Yes&nbsp;

				<input type="radio" name="is_emergency_contact_in" value="0"<? if ($user_id&&$data_user->is_emergency_contact==0) echo " checked"; ?>>No</td>

				<td>&nbsp;</td>

			</tr>
			
			
			<tr>
				<td></td>
			</tr>
			
						<tr>

				<td class="content" align="right" valign="top"><b>Privacy Statement</b></td>

				<td class="content" valign="top">Your information will be stored inside the password-protected volunteer-only section of the website.  It will never be distributed outside the shelter for any reason.</td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td>&nbsp;</td>

				<td colspan="2"><input src="images/submit.gif" type="image" border="0"></td>

			</tr>

		</table> 

		</form>

		

		

		</td>

	</tr> 

</table>



</body>

</html>

