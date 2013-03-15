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

	<title>The Friends Shelter | Handbook</title>

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

		<td colspan="2" class="title"><span class="blue">Handbook</span></td>

	</tr>

	<tr>

		<td colspan="3"><img src="images/clear.gif" width="1" height="15"></td>

	</tr>

	<tr>

		<td colspan="2">&nbsp;</td>

		<td class="content">
		
		<p></p><br>
BACKGROUND
</p><p>
In January 1982, in response to the burgeoning crisis of homelessness in New York City, a small number of members of Fifteenth Street Meeting of the Religious Society of Friends opened the Friends Shelter.  The shelter is located at the 15th Street Meeting Meetinghouse at 15 Rutherford Place between East 15th and East 16th Streets, east of Third Avenue in Manhattan.  The Shelter continues to open every night of the year - that is, every night that we have two volunteers.  Thanks to people like you we are open every night! 
</p><p>
Each night twelve homeless people come to us as our guests.  They come to us by bus from the Neighborhood Coalition for Shelter Drop-in Center at 237 East 77th Street.  Many of our guests have a history of mental illness, or drug or alcohol addiction, but before they come to us they are screened for alcohol, drugs, and illness.  We greet them at the door as they arrive together between 8:30 and 9:00 pm.
</p><p>
<br>
ORGANIZATION
</p><p>
A Shelter Committee, appointed annually by 15th Street Meeting, is responsible for running the shelter.  There is a clerk who convenes the committee, and a volunteer coordinator who ensures that there are two volunteers on the calendar for each night of the month. The volunteer coordinator is not necessarily a member of the committee, but is any one of our volunteers who enjoys talking on the phone and persuading other volunteers to sign up.  Members of the committee are responsible for ordering sheets, towels and toiletries from the NYC Department of Homeless Services, for ordering our nonperishable food supplies, and for collecting and submitting for payment the receipts for the perishable foods we buy at Met Foods. The committee meets when needed and all meetings are open to anyone who is interested in attending.  Please let the clerk know if you are interested and you will be informed of the meetings.
</p><p>
The clerk is Katy Homans.  She can be reached at 212 352-0957 and by email at <a href="mailto:katy@katyhomans.com">katy@katyhomans.com</a>.  The volunteer coordinator position is filled by a different person each month. 
</p><p>
Every once in a while, there is a potluck supper gathering of all the volunteers, giving us the opportunity to share Shelter experiences, resolve problems, and make suggestions to improve the workings of the Shelter or enhance the comfort of our guests.
<br><br>
</p><p>
SIGNING UP TO VOLUNTEER
</p><p>
We ask our volunteers to sign up for a night each month.  You can do that on our website, www.friendsshelter.org, on the calendar in the Shelter kitchen or by calling the volunteer coordinator or Katy.  If you choose to sign up on the calendar in the kitchen, please call as well.  You are welcome to use the phone in the kitchen.  The name of the volunteer coordinator and his or her contact information is posted on the bottom of the Shelter calendar in the kitchen. 
<br><br>
</p><p>
NIGHTLY ROUTINE
</p><p>
Each night, two volunteers sleep over at the Shelter.  They arrive at about 7:45 pm to set up the cots and refreshment tables and to shop for perishable food.  They read the last few days in the Log Book to see if there is new information they should know about.  Lights are out at 10:00 pm and wake-up time is at 6:00 am.  There is an alarm clock in the kitchen, but it has been known to vanish.  Many volunteers bring their own to be sure.  The bus comes at about 6:45 am to take our guests back to the Drop-in Center.
</p><p>
In the unusual circumstance that one volunteer does not show up, call the volunteer coordinator or Katy shortly after 8:00 pm so that we can try to arrange a replacement.
</p><p>
When the guests arrive, they collect their bag of linen from the previous night and ask for pillows, towels, and blankets.  We give them as many as they want, as long as there are enough for everyone.  We ask them to sign the Sign-In Book, which we put at the end of the table.  One guest will bring the bus manifest from the Drop-in Center, a list of the men and women assigned to our shelter.  It is kept in the Sign-In Book.  Anyone who is not on the list may not stay at the Shelter.  
</p><p>
During the evening we encourage our guests to socialize with each other and with the volunteers.  We are always friendly, but we do not pry.  Frequently, there are lively and interesting discussions on all sorts of subjects.  In addition there are games in the kitchen, if guests or volunteers are interested in playing.  Homelessness is an exhausting experience and many of our guests just want to sleep.  That too, is fine.
</p><p>
To keep the shelter running smoothly there are tasks assigned to the volunteers each night, ie: shelving clean linen on Thursdays, bagging dirty linen on Saturday mornings, etc.  The schedule is posted on the door to the kitchen.  Please do your assignment so the next nightís volunteers do not have to do two.
</p><p>
In the morning we set up a light breakfast, put away the cots and tables, and any leftover food that is still fresh.  Our guests put their sheets and pillowcases in plastic bags with their names on it to save for the next night.  The bags are put into bins, which are kept on a moveable metal cart.  A large clear laundry bag is available for towels, which are stored in the kitchen or when full, in the closet under the stairs in the vestibule, to be taken to Rikers Island for laundering.
</p><p>
We check to see that the refrigerator, sink and the kitchen are clean and organized.  If necessary the floor is mopped.  We check the bathrooms, pick up any debris, and wipe over the sink with a towel.  We also check the link room, the cement-floor hallway between the Meetinghouse and Common Room, for cups, etc. The large black garbage bag is tied and carried around to the 15th Street side of the building.  We write a note in the Log Book of any special incidents, good or bad, that occurred.  If there is anything that requires immediate attention, please call Katy.  The bus arrives at about 6:45 am and most volunteers have finished tidying up and are on their way by 7:00.
</p><p>
IT IS ESSENTIAL THAT THE FOLLOWING DOORS ARE CLOSED AND LOCKED BEFORE YOU LEAVE:
<br><br>
		* THE DOOR TO THE SHELTER KITCHEN <br>
		* THE TWO FRONT DOORS ‚ 15 RUTHERFORD PLACE <br>
		* THE DOOR FACING THE FRONT COURTYARD<br>
	</p><p>
<br>
FOOD
</p><p>
The Partnership for the Homeless pays for our food supplies.  There is a list of non-perishable supplies that are bought in bulk: paper goods, canned juices, cereal, peanut butter, jelly, coffee, tea, etc.  These supplies are ordered when needed by Steve Smith and stored in Room 12, two flights up.  The key for Room 12 is hung on a hook over the calendar in the Shelter kitchen.  Some changes can be made to this supply and if you have suggestions bring them to the committee or call Steve.
</p><p>
Each night the volunteers check the food in the refrigerator.  We should always have milk, bread, cheese, deli meats, and fruit.  Volunteers may choose to buy other items that they think the guests might enjoy, ice cream, coffeecake, etc.  One of the volunteers goes out to Met Food to buy what is needed.  Met Food is located on the west side of Third Avenue between 16th and 17th Streets.  You give them our account number, #22, and you will sign for your purchase.  Please bring the cash register receipt back to the Shelter and leave it in the envelope taped to the refrigerator door.  Without the receipts, Met Food cannot be paid.  If you do not need to shop, please leave a note in the envelope so we do not hunt for non-existing receipts.  Morgan Harting is in charge of receipts and ensuring payment to Met Food.
</p><p>
Please check the refrigerator before you shop and before you open new jars and cans.  We should not have several open jars of peanut butter or cans of apple juice.  All food left in the refrigerator should be wrapped or put in plastic bags or containers.  And most important, if you are in doubt about the freshness of any food, THROW IT OUT!
</p><p>
<br>
LAUNDRY
</p><p>
Our sheets, towels, blankets and beds are provided by the city Department of Homeless Services.  On Saturday mornings, the volunteers collect all the dirty linen.  Dirty towels, sheets and pillowcases are placed in separate plastic bags.  Volunteers double bag the linens, spray disinfectant inside the bags, and tag them.  The tags are in the tall blue bin and are stamped Friends Shelter.  Enter the date and your initials on the tag.  The people who pick up the linen to take it to Rikers Island for laundering will not take bags that are heavy.  The number of sheets, towels, and pillowcases to be put in each bag is posted on the kitchen door.  The bagged laundry is placed in the cabinet under the stairs in the vestibule and is picked up on Thursdays.  Clean linen is left in the cabinet.  Thursdayís volunteers put the linen on the shelves in the kitchen.  Any linen that will not fit is stored on the second floor landing in the large metal cabinet.
</p><p>
Dirty blankets are not sent out with the laundry.  If you think it is time for clean blankets, please call Katy who will arrange for pick-up and delivery.
</p><p>
We buy the plastic tablecloths.  They must be washed and dried each morning to remove the sticky goo.  We have also bought an iron and ironing board for any guest who wishes to use them.  There is a first aid box with bandaids and painkillers for guests who ask for them.
</p><p>
The city supplies toothbrushes and paste, shaving supplies, shampoo, soap, etc.  They are available to the guests who want them.  Put a note in the Log Book or call Katy if more supplies are needed.
</p><p>
<br>
RULES AND REGULATIONS
</p><p>
We try to have as few rules as possible but we have some.<br>
Guests may not leave personal possessions in the Shelter or kitchen.<br>
Guests are not permitted in the kitchen.<br>
No alcohol or drugs are permitted anywhere in the building.<br>
Smoking is not permitted anywhere except in the back courtyard.  Ashtrays are available to be taken out to the courtyard.<br>
If a guest leaves during the night, he or she may not return that night.<br>
</p><p>
<br>
SECURITY
</p><p>
The building staff is on duty, Monday through Friday until 10:00 pm.  The staff person on duty locks the outside gate when he or she leaves.  In the morning one of the volunteers unlocks the gate.  The gate key is on a hook over the calendar in the kitchen.  On schooldays, the gate may be left open when the volunteers leave.  On other days the gate should be locked.  DOORS MUST BE LEFT LOCKED EVERY DAY.
</p><p>
On Saturdays and Sundays the building is frequently locked when the volunteers arrive.  A key is left for them with Sylvia's doorman at 210 East 15th Street.  The keys are in an envelope labeled with the volunteers' names.  The doorman will not give the key to anyone whose name is not on the envelope.  Please be sure to return the key in the morning so it is there for the next nightís volunteers.
</p><p>
We do not let anyone into the Shelter whose name is not on the list.  If a stranger appears at the door and does not appear drunk or disorderly, refer him or her to Peter's Place in the basement of St. Vincent de Paul's Church at 123 West 23rd Street, between 6th and 7th Avenues.  Peter's Place will take them in for the night, but we must call them first, 212 727-0725.  If you choose and are able, you can give them carfare.
</p><p>
The building has two alarm systems, a fire alarm and a burglar alarm.  The boxes are located in the vestibule behind the desk.  The fire alarm will bring out the fire department.  The burglar alarm occasionally goes off for no apparent reason. If you do not hear or see anything out of the ordinary, just wait; it will stop after several minutes.  If you think something is wrong, call 911.  If in doubt, call Sylvia or John Maynard at 212 475-0195.
</p><p>


Thank you for becoming a Friends Shelter volunteer. Have a good night!<br>
Because of you, twelve homeless people will have a warm, friendly place to sleep.

		
		
	</tr>





</body>

</html>

