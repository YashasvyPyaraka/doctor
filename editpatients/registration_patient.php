<?php $thispage ="registration";
$regPage="";
?>

<?php session_start();
?>

<?php
$msg=" ";
/** Validate captcha */

if (isset($_POST['patientSubmit'])) 
{
    if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captcha'])) != $_SESSION['captcha']) {
		
        $captcha_message = "Invalid captcha";
        $style = "background-color: #FF606C";
		$msg="Captcha entered is incorrect";
		 
    } else {
        $captcha_message = "Valid captcha";
        $style = "background-color: #CCFF99";
		echo "before ";
		$_SESSION['POST']=$_POST;

		echo "after ";
		echo "jfksdjg ";
		header("Location: processRegistrations.php");
		
		exit();
		
    }
	
	//header("Location: processRegistrations.php");
	

    
}
if (isset($_POST['ngoSubmit'])) 
{
	
    if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captchango'])) != $_SESSION['captcha']) {
		
        $captcha_message = "Invalid captcha";
        $style = "background-color: #FF606C";
		$msg="Captcha entered is incorrect";
		 
    } else {
        $captcha_message = "Valid captcha";
        $style = "background-color: #CCFF99";
		echo "before ";
		$_SESSION['POST']=$_POST;

		echo "after ";
		echo "jfksdjg ";
		header("Location: processRegistrations.php");
		
		exit();
		
    }	
	//header("Location: processRegistrations.php");   
}
?>


<!doctype html>
<html lang="en">
<head>
<title>Registration</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" href="scripts/jquery-ui.css">
<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery.ui.core.js"></script>
<script src="scripts/jquery.ui.widget.js"></script>
<script src="scripts/datepicker.js"></script>
<script type="text/javascript">
		$(function() {
		$( "#dob" ).datepicker();
		$( "#dobngo" ).datepicker();
	});
	</script>
<script src="scripts/tabscripts.js"></script>
<script src="scripts/reg_validatorv4.js" type="text/javascript"></script>

<script type="text/javascript">
		function showpatientReg()
		{
			//alert("d");
			
				document.getElementById("patientRegScreen").style.display="block";
				document.getElementById("NGO").style.display="none";
			
			
		}	
		function showNGOReg()
		{

				document.getElementById("patientRegScreen").style.display="none";
				document.getElementById("NGO").style.display="block";
		}	
	</script>
</head>
<body >
<div id="wrapper">
<?php include("header_navbar.php"); ?>
			<div id="uccertificate-main">



<div id="patientRegScreen">
<form name="patient" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"><input
	type="hidden" name="formName" value="patientReg" /> 



<div style="min-height:300px; margin-left:30px;" >
<fieldset><legend>Personal Info</legend>
 <div >
					
    <table   border="0">
      <tr>
        <td><label for="firstName">First name*</label></td>
        <td><input name="fname" type="text" id="firstName" value=""/></td>
        <td><div class="error" id="patient_fname_errorloc"></div></td>
      </tr>
      <tr>
        <td><label for="lastName">Last name*</label></td>
        <td><input name="lname" type="text" id="lastName" value=""/></td>
      </tr>
     	
      <tr>
        <td>Gender</td>
        <td><p>
          <label>
            <input type="radio" name="gender" value="M" id="radio_m"  />
            Male</label>
          
          <label>
            <input type="radio" name="gender"  value="F" id="radio_f" />
            Female</label>
          <br />
        </p></td>
        <td><div class="error" id="patient_fname_errorloc"></div></td>
      </tr>
      <td><label>Date of Birth</label></td>
        <td><input name="dob" type="text" id="dob" /></td>
        <td>&nbsp;</td>
	   <tr>
	     <td><label for="Age">Age</label></td>
		 <td><input type="text" name="Age"></td>
	   </tr>
        <tr>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td><label for="parent/guardian">parent/guardian*</label></td>
        <td><input name="pname" type="text" id="parent/guardian" value=""/></td>
        <td><div class="error" id="patient_pname_errorloc"></div></td>
      </tr>
     
   </table>

  </div>
    <script type="text/javascript">

 	var frmvalidator  = new Validator("patient");
	frmvalidator.EnableFocusOnError(true);
	frmvalidator.EnableOnPageErrorDisplay();
	frmvalidator.EnableMsgsTogether();

	frmvalidator.addValidation("fname","req","please enter first name");
	frmvalidator.addValidation("lname","req","please enter last name");
			
	
	
	
  </script>
 <table border="0">
			<tr>
				<td>
					<label for="phone_number">Phone number*</label>
				</td>
				<td>
					<input placeholder="Enter your 10 digit Mobile no.. " type="text" maxlength="10"
					name="phno" id="phone_number" value="" />
				</td>
				<td>
					<div class="error" id="patient_phno_errorloc"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="personal_emailid">Preferred Email ID*<br /><span style="font-size:10px">(Default Login username)</label>
				</td>
				<td>
					<input type="text" placeholder="example@yourdomain.com" value="" name="preferredEmail"
					id="preferred_emailid" />
				</td>
				<td>
					<div class="error" id="patient_preferredEmail_errorloc"></div>
				</td>
			</tr>
			<tr>
				<td ><label for="password">Password*</label> </td>
                <td><input type="password" name="password" id="password" value=""/></td>
                <td ><div class="error" id="patient_password_errorloc"></div></td>
		</tr>	
        <tr>
                <td ><label for="password">Retype Password*</label></td>
                <td><input type="password" name="repassword" id="cpassword" value=""/></td>
                <td ><div class="error" id="patient_repassword_errorloc"></div></td>
		</tr>	

			<tr>
				<td>
					<label for="official_emailid">Alternate Email ID</label>
				</td>
				<td>
					<input type="text" name="alternateEmail" id="alternate_emailid" />
				</td>
				<td>
					<div class="error" id="patient_alternateEmail_errorloc"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="patient_address">Address</label>
				</td>
				<td>
					<input type="text" name="address" id="patient_address" />
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<label for="city">City</label>
				</td>
				<td>
					<input type="text" name="city" id="city" />
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<label for="patient_state">State*</label>
				</td>
				<td>
					<input type="text" name="state" id="patient_state" value="" />
				</td>
				<td>
					<div class="error" id="patient_state_errorloc"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="patient_country">Country*</label>
				</td>
				<td>
					<input type="text" name="country" value="India" id="patient_country" />
				</td>
				<td>
					<div class="error" id="patient_country_errorloc"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="patient_pin_code">Pin code</label>
				</td>
				<td>
					<input type="text" name="pincode" id="patient_pin_code" />
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<script type="text/javascript">
			frmvalidator.addValidation("phno", "req", "	*Please enter  your Phone Number");
			frmvalidator.addValidation("preferredEmail", "email", "	*Please enter your Email properly");
			frmvalidator.addValidation("alternateEmail", "email", "	*Please enter your Email properly");
			frmvalidator.addValidation("preferredEmail", "req", "	*Please enter your Email.");
			frmvalidator.addValidation("state", "req", "	*Please enter  State");
			frmvalidator.addValidation("state", "alpha_s", "	*State must only contain characters");
			frmvalidator.addValidation("country", "req", "	*Please enter Country");
			frmvalidator.addValidation("country", "alpha_s", "	*Country must  only contain characters");
			frmvalidator.addValidation("password", "req", "	please enter your password");
	frmvalidator.addValidation("cpassword", "req", "	retype Password cannot be empty");
	frmvalidator.addValidation("password", "minlen=6", "	password should have atleast 6 characters");
	frmvalidator.addValidation("password","eqelmnt=cpassword","The confirmed password is not same as your new password");
	
		</script>
 </table>
	  </table>

</fieldset>
</div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
<?php
/*
Version Track
*/
?>
