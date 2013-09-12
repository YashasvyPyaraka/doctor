<?php 
require_once ("classes/Query.php");
require_once ("classes/doctor.php");
class DoctorQuery extends Query {
	var $_rowCount = 0;
	function DoctorQuery () {
		$this->Query();
		$this->_loc = new Localize(OBIB_LOCALE,"classes")
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchDoctor() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array)
	}
	function mkObj($array) {
		$obj = new Doctor();
		$obj->setDoctor_id($array["doctor_id"]);
		$obj->setFirst_name($array["first_name"]);
		$obj->setLast_name($array["last_name"]);
		$obj->setMobile($array["mobile"]);
		$obj->setGender($array["gender"]);
		$obj->setAddress($array["address"]);
		$obj->setState($array["state"]);
		$obj->setCountry($array["country"]);
		$obj->setCurrent_hospital($array["current_hospital"]);
		$obj->setExperience($array["experience"]);
		$obj->setQualification_id($array["qualification_id"]);
		$obj->setDate_of_birth($array["date_of_birth"]);
		$obj->setAge($array["age"]);
		$obj->setCity_id($array["city_id"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from doctor limit %N, %N",$last, $count);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectDoctor_id($doctor) {
		$sql = $this->mkSQL("select * from doctor where doctor_id  = %N",
				$doctor->getDoctor_id()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectFirst_name($doctor) {
		$sql = $this->mkSQL("select * from doctor where first_name  = %N",
				$doctor->getFirst_name()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLast_name($doctor) {
		$sql = $this->mkSQL("select * from doctor where last_name  = %N",
				$doctor->getLast_name()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectMobile($doctor) {
		$sql = $this->mkSQL("select * from doctor where mobile  = %N",
				$doctor->getMobile()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectGender($doctor) {
		$sql = $this->mkSQL("select * from doctor where gender  = %N",
				$doctor->getGender()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectAddress($doctor) {
		$sql = $this->mkSQL("select * from doctor where address  = %N",
				$doctor->getAddress()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectState($doctor) {
		$sql = $this->mkSQL("select * from doctor where state  = %N",
				$doctor->getState()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectCountry($doctor) {
		$sql = $this->mkSQL("select * from doctor where country  = %N",
				$doctor->getCountry()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectCurrent_hospital($doctor) {
		$sql = $this->mkSQL("select * from doctor where current_hospital  = %N",
				$doctor->getCurrent_hospital()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectExperience($doctor) {
		$sql = $this->mkSQL("select * from doctor where experience  = %N",
				$doctor->getExperience()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectQualification_id($doctor) {
		$sql = $this->mkSQL("select * from doctor where qualification_id  = %N",
				$doctor->getQualification_id()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectDate_of_birth($doctor) {
		$sql = $this->mkSQL("select * from doctor where date_of_birth  = %N",
				$doctor->getDate_of_birth()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectAge($doctor) {
		$sql = $this->mkSQL("select * from doctor where age  = %N",
				$doctor->getAge()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectCity_id($doctor) {
		$sql = $this->mkSQL("select * from doctor where city_id  = %N",
				$doctor->getCity_id()
			);
		if (!$this->_query($sql, "Error in selecting from table doctor")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function insert($doctor) {
		$sql = $this->mkSQL("insert into doctor values (%Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q)",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id())
			);
		$ret = $this->_query($sql,"Insert failed on doctor table");
	}
	function updateDoctor_id($doctor) {
		$sql = $this->mkSQL("update doctor
				set first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where doctor_id  = %N",
				$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getDoctor_id()
			);
		$ret = $this->_query($sql,"Update using column doctor_id failed on doctor table");
	}
	function updateFirst_name($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where first_name  = %N",
				$doctor->getDoctor_id(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getFirst_name()
			);
		$ret = $this->_query($sql,"Update using column first_name failed on doctor table");
	}
	function updateLast_name($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where last_name  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getLast_name()
			);
		$ret = $this->_query($sql,"Update using column last_name failed on doctor table");
	}
	function updateMobile($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where mobile  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getMobile()
			);
		$ret = $this->_query($sql,"Update using column mobile failed on doctor table");
	}
	function updateGender($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where gender  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getGender()
			);
		$ret = $this->_query($sql,"Update using column gender failed on doctor table");
	}
	function updateAddress($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where address  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getAddress()
			);
		$ret = $this->_query($sql,"Update using column address failed on doctor table");
	}
	function updateState($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where state  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getState()
			);
		$ret = $this->_query($sql,"Update using column state failed on doctor table");
	}
	function updateCountry($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where country  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getCountry()
			);
		$ret = $this->_query($sql,"Update using column country failed on doctor table");
	}
	function updateCurrent_hospital($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where current_hospital  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getCurrent_hospital()
			);
		$ret = $this->_query($sql,"Update using column current_hospital failed on doctor table");
	}
	function updateExperience($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where experience  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getExperience()
			);
		$ret = $this->_query($sql,"Update using column experience failed on doctor table");
	}
	function updateQualification_id($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, date_of_birth = %Q, age = %Q, city_id = %Q where qualification_id  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getQualification_id()
			);
		$ret = $this->_query($sql,"Update using column qualification_id failed on doctor table");
	}
	function updateDate_of_birth($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, age = %Q, city_id = %Q where date_of_birth  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getAge(),$doctor->getCity_id(),$doctor->get(),$doctor->getDate_of_birth()
			);
		$ret = $this->_query($sql,"Update using column date_of_birth failed on doctor table");
	}
	function updateAge($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, city_id = %Q where age  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getCity_id(),$doctor->get(),$doctor->getAge()
			);
		$ret = $this->_query($sql,"Update using column age failed on doctor table");
	}
	function updateCity_id($doctor) {
		$sql = $this->mkSQL("update doctor
				set doctor_id = %Q, first_name = %Q, last_name = %Q, mobile = %Q, gender = %Q, address = %Q, state = %Q, country = %Q, current_hospital = %Q, experience = %Q, qualification_id = %Q, date_of_birth = %Q, age = %Q where city_id  = %N",
				$doctor->getDoctor_id(),$doctor->getFirst_name(),$doctor->getLast_name(),$doctor->getMobile(),$doctor->getGender(),$doctor->getAddress(),$doctor->getState(),$doctor->getCountry(),$doctor->getCurrent_hospital(),$doctor->getExperience(),$doctor->getQualification_id(),$doctor->getDate_of_birth(),$doctor->getAge(),$doctor->get(),$doctor->getCity_id()
			);
		$ret = $this->_query($sql,"Update using column city_id failed on doctor table");
	}
	function deleteDoctor_id($doctor) {
		$sql = $this->mkSQL("delete from doctor where doctor_id  = %N",
				$doctor->getDoctor_id()
			);
		$ret = $this->_query($sql,"Delete using column doctor_id failed on doctor table");
	}
	function deleteFirst_name($doctor) {
		$sql = $this->mkSQL("delete from doctor where first_name  = %N",
				$doctor->getFirst_name()
			);
		$ret = $this->_query($sql,"Delete using column first_name failed on doctor table");
	}
	function deleteLast_name($doctor) {
		$sql = $this->mkSQL("delete from doctor where last_name  = %N",
				$doctor->getLast_name()
			);
		$ret = $this->_query($sql,"Delete using column last_name failed on doctor table");
	}
	function deleteMobile($doctor) {
		$sql = $this->mkSQL("delete from doctor where mobile  = %N",
				$doctor->getMobile()
			);
		$ret = $this->_query($sql,"Delete using column mobile failed on doctor table");
	}
	function deleteGender($doctor) {
		$sql = $this->mkSQL("delete from doctor where gender  = %N",
				$doctor->getGender()
			);
		$ret = $this->_query($sql,"Delete using column gender failed on doctor table");
	}
	function deleteAddress($doctor) {
		$sql = $this->mkSQL("delete from doctor where address  = %N",
				$doctor->getAddress()
			);
		$ret = $this->_query($sql,"Delete using column address failed on doctor table");
	}
	function deleteState($doctor) {
		$sql = $this->mkSQL("delete from doctor where state  = %N",
				$doctor->getState()
			);
		$ret = $this->_query($sql,"Delete using column state failed on doctor table");
	}
	function deleteCountry($doctor) {
		$sql = $this->mkSQL("delete from doctor where country  = %N",
				$doctor->getCountry()
			);
		$ret = $this->_query($sql,"Delete using column country failed on doctor table");
	}
	function deleteCurrent_hospital($doctor) {
		$sql = $this->mkSQL("delete from doctor where current_hospital  = %N",
				$doctor->getCurrent_hospital()
			);
		$ret = $this->_query($sql,"Delete using column current_hospital failed on doctor table");
	}
	function deleteExperience($doctor) {
		$sql = $this->mkSQL("delete from doctor where experience  = %N",
				$doctor->getExperience()
			);
		$ret = $this->_query($sql,"Delete using column experience failed on doctor table");
	}
	function deleteQualification_id($doctor) {
		$sql = $this->mkSQL("delete from doctor where qualification_id  = %N",
				$doctor->getQualification_id()
			);
		$ret = $this->_query($sql,"Delete using column qualification_id failed on doctor table");
	}
	function deleteDate_of_birth($doctor) {
		$sql = $this->mkSQL("delete from doctor where date_of_birth  = %N",
				$doctor->getDate_of_birth()
			);
		$ret = $this->_query($sql,"Delete using column date_of_birth failed on doctor table");
	}
	function deleteAge($doctor) {
		$sql = $this->mkSQL("delete from doctor where age  = %N",
				$doctor->getAge()
			);
		$ret = $this->_query($sql,"Delete using column age failed on doctor table");
	}
	function deleteCity_id($doctor) {
		$sql = $this->mkSQL("delete from doctor where city_id  = %N",
				$doctor->getCity_id()
			);
		$ret = $this->_query($sql,"Delete using column city_id failed on doctor table");
	}
}
?>