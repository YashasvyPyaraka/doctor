<?php
	 require_once ("../classes/dbutility.php");
	 echo '<br><br>---------------Creating Class Files--------------------<br><br>';
 	 $util = new DBUtility();
	 $util->createModelClass("peoples_doctor.sql");
	 echo '---------------Creating Query Class Files--------------------<br><br>';
	 $util->createQuery("peoples_doctor.sql");
?>
