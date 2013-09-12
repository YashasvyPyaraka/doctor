<?php 
require_once ("classes/Query.php");
require_once ("classes/schedule.php");
class ScheduleQuery extends Query {
	var $_rowCount = 0;
	function ScheduleQuery () {
		$this->Query();
		$this->_loc = new Localize(OBIB_LOCALE,"classes")
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchSchedule() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array)
	}
	function mkObj($array) {
		$obj = new Schedule();
		$obj->setSchedule_id($array["schedule_id"]);
		$obj->setFrom_date($array["from_date"]);
		$obj->setTo_date($array["to_date"]);
		$obj->setFrom_time($array["from_time"]);
		$obj->setTo_time($array["to_time"]);
		$obj->setLocation_id($array["location_id"]);
		$obj->setDoctor_id($array["doctor_id"]);
		$obj->setDescription($array["description"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from schedule limit %N, %N",$last, $count);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectSchedule_id($schedule) {
		$sql = $this->mkSQL("select * from schedule where schedule_id  = %N",
				$schedule->getSchedule_id()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectFrom_date($schedule) {
		$sql = $this->mkSQL("select * from schedule where from_date  = %N",
				$schedule->getFrom_date()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectTo_date($schedule) {
		$sql = $this->mkSQL("select * from schedule where to_date  = %N",
				$schedule->getTo_date()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectFrom_time($schedule) {
		$sql = $this->mkSQL("select * from schedule where from_time  = %N",
				$schedule->getFrom_time()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectTo_time($schedule) {
		$sql = $this->mkSQL("select * from schedule where to_time  = %N",
				$schedule->getTo_time()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLocation_id($schedule) {
		$sql = $this->mkSQL("select * from schedule where location_id  = %N",
				$schedule->getLocation_id()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectDoctor_id($schedule) {
		$sql = $this->mkSQL("select * from schedule where doctor_id  = %N",
				$schedule->getDoctor_id()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectDescription($schedule) {
		$sql = $this->mkSQL("select * from schedule where description  = %N",
				$schedule->getDescription()
			);
		if (!$this->_query($sql, "Error in selecting from table schedule")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function insert($schedule) {
		$sql = $this->mkSQL("insert into schedule values (%Q, %Q, %Q, %Q, %Q, %Q, %Q, %Q)",
				$schedule->getSchedule_id(),$schedule->getFrom_date(),$schedule->getTo_date(),$schedule->getFrom_time(),$schedule->getTo_time(),$schedule->getLocation_id(),$schedule->getDoctor_id(),$schedule->getDescription())
			);
		$ret = $this->_query($sql,"Insert failed on schedule table");
	}
	function updateSchedule_id($schedule) {
		$sql = $this->mkSQL("update schedule
				set from_date = %Q, to_date = %Q, from_time = %Q, to_time = %Q, location_id = %Q, doctor_id = %Q, description = %Q where schedule_id  = %N",
				$schedule->getFrom_date(),$schedule->getTo_date(),$schedule->getFrom_time(),$schedule->getTo_time(),$schedule->getLocation_id(),$schedule->getDoctor_id(),$schedule->getDescription(),$schedule->get(),$schedule->getSchedule_id()
			);
		$ret = $this->_query($sql,"Update using column schedule_id failed on schedule table");
	}
	function updateFrom_date($schedule) {
		$sql = $this->mkSQL("update schedule
				set schedule_id = %Q, to_date = %Q, from_time = %Q, to_time = %Q, location_id = %Q, doctor_id = %Q, description = %Q where from_date  = %N",
				$schedule->getSchedule_id(),$schedule->getTo_date(),$schedule->getFrom_time(),$schedule->getTo_time(),$schedule->getLocation_id(),$schedule->getDoctor_id(),$schedule->getDescription(),$schedule->get(),$schedule->getFrom_date()
			);
		$ret = $this->_query($sql,"Update using column from_date failed on schedule table");
	}
	function updateTo_date($schedule) {
		$sql = $this->mkSQL("update schedule
				set schedule_id = %Q, from_date = %Q, from_time = %Q, to_time = %Q, location_id = %Q, doctor_id = %Q, description = %Q where to_date  = %N",
				$schedule->getSchedule_id(),$schedule->getFrom_date(),$schedule->getFrom_time(),$schedule->getTo_time(),$schedule->getLocation_id(),$schedule->getDoctor_id(),$schedule->getDescription(),$schedule->get(),$schedule->getTo_date()
			);
		$ret = $this->_query($sql,"Update using column to_date failed on schedule table");
	}
	function updateFrom_time($schedule) {
		$sql = $this->mkSQL("update schedule
				set schedule_id = %Q, from_date = %Q, to_date = %Q, to_time = %Q, location_id = %Q, doctor_id = %Q, description = %Q where from_time  = %N",
				$schedule->getSchedule_id(),$schedule->getFrom_date(),$schedule->getTo_date(),$schedule->getTo_time(),$schedule->getLocation_id(),$schedule->getDoctor_id(),$schedule->getDescription(),$schedule->get(),$schedule->getFrom_time()
			);
		$ret = $this->_query($sql,"Update using column from_time failed on schedule table");
	}
	function updateTo_time($schedule) {
		$sql = $this->mkSQL("update schedule
				set schedule_id = %Q, from_date = %Q, to_date = %Q, from_time = %Q, location_id = %Q, doctor_id = %Q, description = %Q where to_time  = %N",
				$schedule->getSchedule_id(),$schedule->getFrom_date(),$schedule->getTo_date(),$schedule->getFrom_time(),$schedule->getLocation_id(),$schedule->getDoctor_id(),$schedule->getDescription(),$schedule->get(),$schedule->getTo_time()
			);
		$ret = $this->_query($sql,"Update using column to_time failed on schedule table");
	}
	function updateLocation_id($schedule) {
		$sql = $this->mkSQL("update schedule
				set schedule_id = %Q, from_date = %Q, to_date = %Q, from_time = %Q, to_time = %Q, doctor_id = %Q, description = %Q where location_id  = %N",
				$schedule->getSchedule_id(),$schedule->getFrom_date(),$schedule->getTo_date(),$schedule->getFrom_time(),$schedule->getTo_time(),$schedule->getDoctor_id(),$schedule->getDescription(),$schedule->get(),$schedule->getLocation_id()
			);
		$ret = $this->_query($sql,"Update using column location_id failed on schedule table");
	}
	function updateDoctor_id($schedule) {
		$sql = $this->mkSQL("update schedule
				set schedule_id = %Q, from_date = %Q, to_date = %Q, from_time = %Q, to_time = %Q, location_id = %Q, description = %Q where doctor_id  = %N",
				$schedule->getSchedule_id(),$schedule->getFrom_date(),$schedule->getTo_date(),$schedule->getFrom_time(),$schedule->getTo_time(),$schedule->getLocation_id(),$schedule->getDescription(),$schedule->get(),$schedule->getDoctor_id()
			);
		$ret = $this->_query($sql,"Update using column doctor_id failed on schedule table");
	}
	function updateDescription($schedule) {
		$sql = $this->mkSQL("update schedule
				set schedule_id = %Q, from_date = %Q, to_date = %Q, from_time = %Q, to_time = %Q, location_id = %Q, doctor_id = %Q where description  = %N",
				$schedule->getSchedule_id(),$schedule->getFrom_date(),$schedule->getTo_date(),$schedule->getFrom_time(),$schedule->getTo_time(),$schedule->getLocation_id(),$schedule->getDoctor_id(),$schedule->get(),$schedule->getDescription()
			);
		$ret = $this->_query($sql,"Update using column description failed on schedule table");
	}
	function deleteSchedule_id($schedule) {
		$sql = $this->mkSQL("delete from schedule where schedule_id  = %N",
				$schedule->getSchedule_id()
			);
		$ret = $this->_query($sql,"Delete using column schedule_id failed on schedule table");
	}
	function deleteFrom_date($schedule) {
		$sql = $this->mkSQL("delete from schedule where from_date  = %N",
				$schedule->getFrom_date()
			);
		$ret = $this->_query($sql,"Delete using column from_date failed on schedule table");
	}
	function deleteTo_date($schedule) {
		$sql = $this->mkSQL("delete from schedule where to_date  = %N",
				$schedule->getTo_date()
			);
		$ret = $this->_query($sql,"Delete using column to_date failed on schedule table");
	}
	function deleteFrom_time($schedule) {
		$sql = $this->mkSQL("delete from schedule where from_time  = %N",
				$schedule->getFrom_time()
			);
		$ret = $this->_query($sql,"Delete using column from_time failed on schedule table");
	}
	function deleteTo_time($schedule) {
		$sql = $this->mkSQL("delete from schedule where to_time  = %N",
				$schedule->getTo_time()
			);
		$ret = $this->_query($sql,"Delete using column to_time failed on schedule table");
	}
	function deleteLocation_id($schedule) {
		$sql = $this->mkSQL("delete from schedule where location_id  = %N",
				$schedule->getLocation_id()
			);
		$ret = $this->_query($sql,"Delete using column location_id failed on schedule table");
	}
	function deleteDoctor_id($schedule) {
		$sql = $this->mkSQL("delete from schedule where doctor_id  = %N",
				$schedule->getDoctor_id()
			);
		$ret = $this->_query($sql,"Delete using column doctor_id failed on schedule table");
	}
	function deleteDescription($schedule) {
		$sql = $this->mkSQL("delete from schedule where description  = %N",
				$schedule->getDescription()
			);
		$ret = $this->_query($sql,"Delete using column description failed on schedule table");
	}
}
?>