<?php 
require_once ("classes/Query.php");
require_once ("classes/patient_request.php");
class Patient_requestQuery extends Query {
	var $_rowCount = 0;
	function Patient_requestQuery () {
		$this->Query();
		$this->_loc = new Localize(OBIB_LOCALE,"classes")
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchPatient_request() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array)
	}
	function mkObj($array) {
		$obj = new Patient_request();
		$obj->setRequest_id($array["request_id"]);
		$obj->setPatient_id($array["patient_id"]);
		$obj->setSchedule_id($array["schedule_id"]);
		$obj->setProblem_history($array["problem_history"]);
		$obj->setActual_date_of_consultation($array["actual_date_of_consultation"]);
		$obj->setTime_of_consultation($array["time_of_consultation"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from patient_request limit %N, %N",$last, $count);
		if (!$this->_query($sql, "Error in selecting from table patient_request")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectRequest_id($patient_request) {
		$sql = $this->mkSQL("select * from patient_request where request_id  = %N",
				$patient_request->getRequest_id()
			);
		if (!$this->_query($sql, "Error in selecting from table patient_request")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectPatient_id($patient_request) {
		$sql = $this->mkSQL("select * from patient_request where patient_id  = %N",
				$patient_request->getPatient_id()
			);
		if (!$this->_query($sql, "Error in selecting from table patient_request")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectSchedule_id($patient_request) {
		$sql = $this->mkSQL("select * from patient_request where schedule_id  = %N",
				$patient_request->getSchedule_id()
			);
		if (!$this->_query($sql, "Error in selecting from table patient_request")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectProblem_history($patient_request) {
		$sql = $this->mkSQL("select * from patient_request where problem_history  = %N",
				$patient_request->getProblem_history()
			);
		if (!$this->_query($sql, "Error in selecting from table patient_request")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectActual_date_of_consultation($patient_request) {
		$sql = $this->mkSQL("select * from patient_request where actual_date_of_consultation  = %N",
				$patient_request->getActual_date_of_consultation()
			);
		if (!$this->_query($sql, "Error in selecting from table patient_request")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectTime_of_consultation($patient_request) {
		$sql = $this->mkSQL("select * from patient_request where time_of_consultation  = %N",
				$patient_request->getTime_of_consultation()
			);
		if (!$this->_query($sql, "Error in selecting from table patient_request")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function insert($patient_request) {
		$sql = $this->mkSQL("insert into patient_request values (%Q, %Q, %Q, %Q, %Q, %Q)",
				$patient_request->getRequest_id(),$patient_request->getPatient_id(),$patient_request->getSchedule_id(),$patient_request->getProblem_history(),$patient_request->getActual_date_of_consultation(),$patient_request->getTime_of_consultation())
			);
		$ret = $this->_query($sql,"Insert failed on patient_request table");
	}
	function updateRequest_id($patient_request) {
		$sql = $this->mkSQL("update patient_request
				set patient_id = %Q, schedule_id = %Q, problem_history = %Q, actual_date_of_consultation = %Q, time_of_consultation = %Q where request_id  = %N",
				$patient_request->getPatient_id(),$patient_request->getSchedule_id(),$patient_request->getProblem_history(),$patient_request->getActual_date_of_consultation(),$patient_request->getTime_of_consultation(),$patient_request->get(),$patient_request->getRequest_id()
			);
		$ret = $this->_query($sql,"Update using column request_id failed on patient_request table");
	}
	function updatePatient_id($patient_request) {
		$sql = $this->mkSQL("update patient_request
				set request_id = %Q, schedule_id = %Q, problem_history = %Q, actual_date_of_consultation = %Q, time_of_consultation = %Q where patient_id  = %N",
				$patient_request->getRequest_id(),$patient_request->getSchedule_id(),$patient_request->getProblem_history(),$patient_request->getActual_date_of_consultation(),$patient_request->getTime_of_consultation(),$patient_request->get(),$patient_request->getPatient_id()
			);
		$ret = $this->_query($sql,"Update using column patient_id failed on patient_request table");
	}
	function updateSchedule_id($patient_request) {
		$sql = $this->mkSQL("update patient_request
				set request_id = %Q, patient_id = %Q, problem_history = %Q, actual_date_of_consultation = %Q, time_of_consultation = %Q where schedule_id  = %N",
				$patient_request->getRequest_id(),$patient_request->getPatient_id(),$patient_request->getProblem_history(),$patient_request->getActual_date_of_consultation(),$patient_request->getTime_of_consultation(),$patient_request->get(),$patient_request->getSchedule_id()
			);
		$ret = $this->_query($sql,"Update using column schedule_id failed on patient_request table");
	}
	function updateProblem_history($patient_request) {
		$sql = $this->mkSQL("update patient_request
				set request_id = %Q, patient_id = %Q, schedule_id = %Q, actual_date_of_consultation = %Q, time_of_consultation = %Q where problem_history  = %N",
				$patient_request->getRequest_id(),$patient_request->getPatient_id(),$patient_request->getSchedule_id(),$patient_request->getActual_date_of_consultation(),$patient_request->getTime_of_consultation(),$patient_request->get(),$patient_request->getProblem_history()
			);
		$ret = $this->_query($sql,"Update using column problem_history failed on patient_request table");
	}
	function updateActual_date_of_consultation($patient_request) {
		$sql = $this->mkSQL("update patient_request
				set request_id = %Q, patient_id = %Q, schedule_id = %Q, problem_history = %Q, time_of_consultation = %Q where actual_date_of_consultation  = %N",
				$patient_request->getRequest_id(),$patient_request->getPatient_id(),$patient_request->getSchedule_id(),$patient_request->getProblem_history(),$patient_request->getTime_of_consultation(),$patient_request->get(),$patient_request->getActual_date_of_consultation()
			);
		$ret = $this->_query($sql,"Update using column actual_date_of_consultation failed on patient_request table");
	}
	function updateTime_of_consultation($patient_request) {
		$sql = $this->mkSQL("update patient_request
				set request_id = %Q, patient_id = %Q, schedule_id = %Q, problem_history = %Q, actual_date_of_consultation = %Q where time_of_consultation  = %N",
				$patient_request->getRequest_id(),$patient_request->getPatient_id(),$patient_request->getSchedule_id(),$patient_request->getProblem_history(),$patient_request->getActual_date_of_consultation(),$patient_request->get(),$patient_request->getTime_of_consultation()
			);
		$ret = $this->_query($sql,"Update using column time_of_consultation failed on patient_request table");
	}
	function deleteRequest_id($patient_request) {
		$sql = $this->mkSQL("delete from patient_request where request_id  = %N",
				$patient_request->getRequest_id()
			);
		$ret = $this->_query($sql,"Delete using column request_id failed on patient_request table");
	}
	function deletePatient_id($patient_request) {
		$sql = $this->mkSQL("delete from patient_request where patient_id  = %N",
				$patient_request->getPatient_id()
			);
		$ret = $this->_query($sql,"Delete using column patient_id failed on patient_request table");
	}
	function deleteSchedule_id($patient_request) {
		$sql = $this->mkSQL("delete from patient_request where schedule_id  = %N",
				$patient_request->getSchedule_id()
			);
		$ret = $this->_query($sql,"Delete using column schedule_id failed on patient_request table");
	}
	function deleteProblem_history($patient_request) {
		$sql = $this->mkSQL("delete from patient_request where problem_history  = %N",
				$patient_request->getProblem_history()
			);
		$ret = $this->_query($sql,"Delete using column problem_history failed on patient_request table");
	}
	function deleteActual_date_of_consultation($patient_request) {
		$sql = $this->mkSQL("delete from patient_request where actual_date_of_consultation  = %N",
				$patient_request->getActual_date_of_consultation()
			);
		$ret = $this->_query($sql,"Delete using column actual_date_of_consultation failed on patient_request table");
	}
	function deleteTime_of_consultation($patient_request) {
		$sql = $this->mkSQL("delete from patient_request where time_of_consultation  = %N",
				$patient_request->getTime_of_consultation()
			);
		$ret = $this->_query($sql,"Delete using column time_of_consultation failed on patient_request table");
	}
}
?>