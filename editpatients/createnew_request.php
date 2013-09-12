<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" href="scripts/jquery-ui.css">
<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery.ui.core.js"></script>
<script src="scripts/jquery.ui.widget.js"></script>
<script src="scripts/datepicker.js"></script>
    <script type="text/javascript">

	function validateForm()
{
var x=document.forms["newrequest"]["problemhistory"].value;
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }

}

  </script>
</head>
<body>
<form name="newrequest" method="post" onsubmit="return validateForm()" > 
<fieldset>
<h2>Patient new request form</h2>
    <table   border="0">
        <tr>
				<td style="vertical-align:top;">
					<label for="quote">Problem History</label>
				</td>
				<td><span style="vertical-align:top;">
					<textarea placeholder="Please write a brief (1-3 lines) quote about your problem "  cols="45" rows="5" name="problemhistory" id="problemhistory"></textarea>
				
				</td>
				<td>&nbsp;</td>
		</tr>
	  </tr>
     
      <tr>
	  <td><label>Actual Date of consultation </label></td>
        <td><input name="adc" type="text" id="adc" /></td>
        <td>&nbsp;</td>
	</tr>
        <tr>
          <td><label for="occupation">Time of consultation</label>
          </td>
          <td><input type="text" name="occupation" id="occupation" /></td>
          <td>&nbsp;</td>
        </tr>
       <tr> <td><label for="status_type">Status type</label></td>
        <td><input type="text" name="statustype" id="statustype" /></td>
        <td>&nbsp;</td>
      </tr>

      <tr>
	  <td><label>Status Date </label></td>
        <td><input name="adc" type="text" id="adc" /></td>
        <td>&nbsp;</td>
	</tr>
	  <tr>
	      <td>&nbsp;</td>
	
        <td><input type="submit" value="Create new request" /></td>
        
	</tr>
	
	
  </table>

  </fieldset>

</form>

</body>
</html>