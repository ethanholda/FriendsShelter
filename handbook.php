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
</p><p>In January 1982, in response to the burgeoning crisis of homelessness in New York City, a small number of members of Fifteenth Street Meeting of the Religious Society of Friends opened the Friends Shelter. The shelter is located at the 15th Street Meeting Meetinghouse at 15 Rutherford Place between East 15th and East 16th Streets, east of Third Avenue in Manhattan. The Shelter continues to open every night of the year - that is, every night that we have two volunteers. Thanks to people like you we are open every night! 
</p><p>
Each night fourteen homeless people come to us as our guests. They come to us by bus from the Mainchance Drop-In Center near Grand Central Station. Many of our guests have a history of mental illness, or drug or alcohol addiction, but before they come to us they are screened for alcohol, drugs, and illness. We greet them at the door as they arrive together between 8:15 and 8:30 pm. 
</p>

<p>
<br>
ORGANIZATION
</p><p>
A Shelter Committee, appointed annually by 15th Street Meeting, is responsible for running the shelter. There is a clerk who convenes the committee, and volunteer coordinators who ensures that there are two volunteers on the calendar for each night of the month. The volunteer coordinator is not necessarily a member of the committee, but is any one of our volunteers who enjoys talking on the phone and persuading other volunteers to sign up. Members of the committee are responsible for ordering our nonperishable food supplies. The committee meets when needed and all meetings are open to anyone who is interested in attending. Please let the clerk know if you are interested and you will be informed of the meetings.</p><p>
The clerk is Katy Homans. She can be reached at 212 352-0957, 917 476 1951, and by email at <a href="mailto:katy@katyhomans.com">katy@katyhomans.com</a>. The volunteer coordinator position is filled by a different person each month. 
</p>

<p>
The clerk is Katy Homans.  She can be reached at 212 352-0957 and by email at <a href="mailto:katy@katyhomans.com">katy@katyhomans.com</a>.  The volunteer coordinator position is filled by a different person each month. 
</p><p>
Every once in a while, there is a potluck supper gathering of all the volunteers, giving us the opportunity to share Shelter experiences, resolve problems, and make suggestions to improve the workings of the Shelter or enhance the comfort of our guests.
<br><br>
</p>

<p>
SIGNING UP TO VOLUNTEER
</p><p>
We ask our volunteers to sign up for a night each month. You can do that on our website, www.friendsshelter.org, or by calling the volunteer coordinator or Katy. The names of the volunteer coordinator and his or her contact information as well as Katy’s are posted on the inside of the shelter door. 
<br><br>
</p>

<p>

NIGHTLY ROUTINE
</p><p>
Each night, two volunteers sleep over at the Shelter. They arrive at about 7:30 pm to set up the cots and refreshment tables and to shop for perishable food if necessary. They read the last few days in the Log Book to see if there is new information or shopping requests. Lights are out at 10:00 pm and wake-up time is at 6:00 am. The bus comes at about 6:15-6:30 am to take our guests back to the Drop-in Center. 
</p><p>
In the unusual circumstance that one volunteer does not show up, call the volunteer coordinator or Katy shortly after 8:00 pm so that we can try to arrange a replacement. 
</p><p>
When the guests arrive, they collect their bag of linen from the previous night and ask for pillows, towels, and blankets. We give them as many as they need, but receive a limited amount of clean laundry so need to be judicious. On Tuesday morning all dirty laundry is collected, and on Tuesday night all guests get new laundry. We ask them to sign the Sign-In Book, which we put at the end of the table. One guest will bring the bus manifest from the Drop-in Center, a list of the men and women assigned to our shelter. It is kept in the Sign-In Book. Anyone who is not on the list may not stay at the Shelter. 
</p><p>
During the evening we encourage our guests to socialize with each other and with the volunteers. We are always friendly, but we do not pry. Frequently, there are lively and interesting discussions on all sorts of subjects. In addition there are games in the kitchen, if guests or volunteers are interested in playing. Homelessness is an exhausting experience and many of our guests just want to sleep. That too, is fine. 
</p><p>
On Tuesday morning the volunteers must collect and bag ALL dirty linen. Tuesday evening new laundry is shelved. 
</p><p>
In the morning we set up a light breakfast, put away the cots and tables, and any leftover food that is still fresh. Our guests put their sheets and pillowcases in plastic bags with their names on it to save for the next night. A large clear laundry bag is available for dirty towels. 
</p><p>
We check to see that the refrigerator, sink and the kitchen are clean and organized. If necessary the floor is mopped. We check the bathrooms, pick up any debris, and wipe over the sinks with a towel. The large black garbage bag is tied and carried around to the 15th Street side of the building. We write a note in the Log Book of any special incidents, good or bad, that occurred. If there is anything that requires immediate attention, please call Katy. The bus arrives at about 6:15-6:30 am and most volunteers have finished tidying up and are on their way by 7:00. 
</p>

<p>
<br/>
FOOD
</p>
<p>
Food is donated by the Friends Seminary School when school is in session. On weekends and holidays, food is often donated by people using www.takethemameal.com. Your coordinator should notify you if someone will be dropping off food on the night you volunteer. There is a list of non-perishable supplies that are bought in bulk: paper goods, canned juices, cereal, peanut butter, jelly, coffee, tea, etc. These supplies are ordered when needed and stored in Room 12, two flights up. The key for which is hung in the Shelter kitchen. Some changes can be made to this supply and if you have suggestions bring them to the committee or call Katy. 
</p>
<p>
Each night the volunteers check the food in the refrigerator. We should always have milk, bread, and fruit. Volunteers may choose to buy other items that they think the guests might enjoy, ice cream, coffeecake, etc. One of the volunteers goes out to Met Food to buy what is needed. Met Food is located on the west side of Third Avenue between 16th and 17th Streets. You give them our account number, #22, and you will sign for your purchase. Please check the refrigerator before you shop and before you open new jars and cans. We should not have several open jars of peanut butter or cans of apple juice. All food left in the refrigerator should be wrapped or put in plastic bags or containers and labeled with a date. And most important, if you are in doubt about the freshness of any food, THROW IT OUT! 

</p>

<p>
<br>
LAUNDRY
</p>
<p>
Our sheets, towels, blankets and beds are provided by Mainchance. On Tuesday mornings, the volunteers collect all the dirty linen and place it in the yellow bin in the cabinet under the stairway in the hall. Clean linen is left in the cabinet later in the day. Tuesday evening volunteers put the linen on the shelves in the kitchen. Any linen that will not fit is stored on the second floor landing in the large metal cabinet. 
</p>
<p>
The shelter has several fleece blankets that are kept in the kitchen. THESE BLANKETS ARE NOT TO BE SENT OUT WITH THE LAUNDRY. If you think it is time for clean blankets, please call Katy who will arrange for pick-up and delivery. 
</p>
<p>
We buy the plastic tablecloths. They must be washed and dried each morning to remove the sticky goo. We have also bought an iron and ironing board for any guest who wishes to use them. There is a first aid box with bandaids and painkillers for guests who ask for them. 
</p>
<p>
We have bins of toothbrushes and paste, shaving supplies, shampoo, soap, etc. available to guests who want them. Please write to Katy if more supplies are needed. 
</p>
<p>
If you notice we are out of anything, or see that guests are requesting a specific item, please let Katy know.

</p>
<p>
<br>
RULES AND REGULATIONS
</p>
<p>
    <ul>
        <li>We try to have as few rules as possible but we have some.</li>
        <li>Guests may not leave personal possessions in the Shelter or kitchen.</li>
        <li>Guests are not permitted in the kitchen.</li>
        <li>No alcohol or drugs are permitted anywhere in the building.</li>
        <li>Smoking is not permitted anywhere except in the back courtyard. Ashtrays are available to be taken out to the courtyard.</li>
        <li>If a guest leaves during the night, he or she may not return that night.</li>
    </ul>
</p><p>
<br>
SECURITY
</p>
<p>
The building staff is on duty, Monday through Friday until 10:00 pm. The staff person on duty locks the outside gate when he or she leaves. In the morning one of the volunteers unlocks the gate. 
</p>
<p>
On Saturdays and Sundays the building is frequently locked when the volunteers arrive. A key is left for them with the doorman at 210 East 15th Street. The keys are in an envelope labeled with the volunteers' names. The doorman will not give the key to anyone whose name is not on the envelope. Please be sure to return the key in the morning so it is there for the next night’s volunteers. 
</p>
<p>
We do not let anyone into the Shelter whose name is not on the list. If a stranger appears at the door and does not appear drunk or disorderly, refer him or her to Mainchance, which is in easy walking distance, 120 East 32nd Street. 
</p>
<p>
The building has two alarm systems, a fire alarm and a burglar alarm. The boxes are located in the vestibule behind the desk. The fire alarm will bring out the fire department. The burglar alarm occasionally goes off for no apparent reason. If you do not hear or see anything out of the ordinary, just wait; it may stop after several minutes. If not, call Katy to get the alarm code. 
</p>
<p>
Thank you for becoming a Friends Shelter volunteer. Have a good night!<br/>
Because of you, fourteen homeless people will have a warm, friendly place to sleep. 
</p>
<br/><br/>
		</td>
		
	</tr>





</body>

</html>

