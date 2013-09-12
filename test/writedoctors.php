<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/db_constants.php");
  require_once("../classes/doctor.php");
  require_once("../classes/doctorQuery.php");

  $first = array("Rahul", "Sudha", "Abbas", "John", "Sukhwinder");
  $gender = array("male","female");
  $last = array("Singh", "Siddiqui", "Abraham", "Nakula", "Srinivasan");
  $speciality = array("General Surgery","Orthopaedics","Obstretics & Gyneacology", "Pediatrics", "Opthalmology");
  $subspeciality = array("Cardiology","Cardiotheracic Surgery","Nephrology","Urology", "Neonatology", "Neurology", "Neurosurgery");

  #****************************************************************************
  #*  Checking for post vars.  Go back to form if none found.
  #****************************************************************************
 
  #***************************************************************************
  #*  Enter data
  #****************************************************************************
  	$doctor = new Doctor();
  	$doctor->setFirst_name($first[rand(0,sizeof($first))]);
  	$doctor->setLast_name($last[rand(0,sizeof($last))]);
  	$doctor->setMobile(rand(7,9).rand(0,6).rand(0,6).rand(0,6).rand(0,6).rand(0,6).rand(0,6).rand(0,6).rand(0,6));
	$doctor->setGender($gender[rand(0,sizeof($gender))]);
  	$doctor->setSpeciality(rand(1,10));
  }
  

  #**************************************************************************
  #*  Insert new Doctor
  #**************************************************************************
  $doctorid = $doctorQ->insert($doctor);
  $doctorQ->close();

  #**************************************************************************
  #*  Destroy form values and errors
  #**************************************************************************
?>
