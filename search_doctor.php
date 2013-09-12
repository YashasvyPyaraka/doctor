<form method="post" name="search_doctor" action="index.php" >
<div id="search_contents" class="cube-I">
	<div id="search_by">
		<br><br>
		<h3>Search By:</h3>
	</div>
	<div id="type_div" style="">
		<p><b>Type:</b></p>
			<select name="type" id="type" style="width:140px;">
			<option value='' select="selected">--ALL--</option>
			<option id="doctor" name='doctor' value='doctor' >Doctor</option>
			<option id="patient" name='patient' value='patient'>Patient</option>
   		</select>	</div>
	<div id="city_div"> 
		<p><b><font>City </font></b></p>
				<select id="city" name="city" style="width:140px;" onchange="displayLocationDiv();">
					<option value='' select="selected">--ALL--</option>
					<option name='hyderabad' value='hyderabad' >Hyderabad</option>
					<option name='mumbai' value='mumbai'>Mumbai</option>
					<option name='delhi' value='delhi' >Delhi</option>
					<option name='mysore' value='mysore'>Mysore</option>
					<option name='banglore' value='banglore'>Banglore</option>
					<option name='indore' value='indore'>Indore</option>
				</select>
	</div>
	</br></br>
	<input type="submit" name="Submit" value="Submit">
	</br></br>

</div>

</form>
