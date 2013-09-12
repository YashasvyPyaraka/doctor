
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<TITLE>UC is an exchange platform to channel Philanthropic Resources to
	Education, Health and Environmental services sectors</TITLE>
<meta http-equiv="content-type" content="text/ html;charset=utf-8">
<META NAME="Description"
	CONTENT="UC is an exchange platform to channel Philanthropic Resources to Education, Health and Environmental services sectors, in order to improve access to these services especially for the poor. These sectors need a much larger infusion of capital of various kinds including Financial, Intellectual and Social Capital.">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/div.css">
<link rel="stylesheet" type="text/css" href="../css/opencity.css">
<link rel="stylesheet" href="../scripts/jquery-ui.css">
<script src="../scripts/jquery.min.js"></script>
<style type="text/css">
div.button{
padding:10px;font-size:13px;font-weight:bold;text-align:center;border:1px solid #333; 
border-radius:1em;background-color:rgba(194,194,194,0.1);transition:background-color 1s;
position:relative;
margin-bottom:20px;
}
div.button:hover{
	background-color:rgba(194,194,194,0.5);
}
div#searchAllConditionsDisplayed, div#searchConditionsDisplayed {
	padding-top:10px;
	margin-bottom:-20px !important;
}
</style>

</HEAD>
<BODY>

	<!--wrapper begin-->
	<div id="wrapper">

		<!--header and navbar -->
		<?php include '../header_navbar.php';?>
		<!--maincontentarea begin-->
		<div id="content-main">
			<table style="margin-bottom:80px;">
				<tr>
					<td colspan="4">
					</td>
				</tr>
				<tr>
					<td valign="top">
							<?php include 'search_doctor.php';?>
						<div class="button">
						 <a style="color:black;text-decoration:none;" href="opencityregistration.php"><font
						color="#369"> <?php echo "Get Membership!";?>
						</font></a>
						</div>
						<div class="button">
						<span class="tooltip">
						 <a> <?php echo "Start a People's Doctor";?>
						<span>
						To start a People's Doctor in your community, you can contact us at<br />Email : contact@yousee.in<br />Phone : +91-8008-884422 </span></a>
						</span>
						</div>
					</td>
				<td valign="top">
						<div align="justify">
							 <br> 
							 <font style="font-size:15px;color:#369;font-weight:bold;font-family:Trebuchet MS;">People's Doctor</font>
							 <p style="color:#666;font-size:12px;font-family:Trebuchet MS;"><b>People's Doctor</b> is an attempt to bring Doctors closer to Patients and in the process bring the community together. This is an approach taken by Yousee with the help of various Doctors from various cities to be feasible to patients and provide them quality treatment.<br /><br />
							 <font style='color:#666;font-weight:normal;font-size:12px;'></font><br><br> 
						</div>
						<div id="mapLocations">
							<?php
							include 'map_library_locations.php';
							?>
						</div> 
						<div id="conditionsFromMap">
							<?php 
							include 'display_search_conditions.php';
						?>
						</div> 
						<div  id="ListingBooksForClick">
							<?php
							include 'doctors.php';
							?>
						</div>
					</td>
				</tr>
			</table>
			</div>
			<?php  include '../footer.php' ;?>

</div>
</BODY>
</HTML>

