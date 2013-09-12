<?php 
require_once ("classes/Query.php");
require_once ("classes/speciality_sub_speciality_link.php");
class Speciality_sub_speciality_linkQuery extends Query {
	var $_rowCount = 0;
	function Speciality_sub_speciality_linkQuery () {
		$this->Query();
		$this->_loc = new Localize(OBIB_LOCALE,"classes")
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchSpeciality_sub_speciality_link() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array)
	}
	function mkObj($array) {
		$obj = new Speciality_sub_speciality_link();
		$obj->setSpeciality_sub_speciality_link_id($array["speciality_sub_speciality_link_id"]);
		$obj->setSub_speciality_id($array["sub_speciality_id"]);
		$obj->setSpeciality_id($array["speciality_id"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from speciality_sub_speciality_link limit %N, %N",$last, $count);
		if (!$this->_query($sql, "Error in selecting from table speciality_sub_speciality_link")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectSpeciality_sub_speciality_link_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("select * from speciality_sub_speciality_link where speciality_sub_speciality_link_id  = %N",
				$speciality_sub_speciality_link->getSpeciality_sub_speciality_link_id()
			);
		if (!$this->_query($sql, "Error in selecting from table speciality_sub_speciality_link")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectSub_speciality_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("select * from speciality_sub_speciality_link where sub_speciality_id  = %N",
				$speciality_sub_speciality_link->getSub_speciality_id()
			);
		if (!$this->_query($sql, "Error in selecting from table speciality_sub_speciality_link")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectSpeciality_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("select * from speciality_sub_speciality_link where speciality_id  = %N",
				$speciality_sub_speciality_link->getSpeciality_id()
			);
		if (!$this->_query($sql, "Error in selecting from table speciality_sub_speciality_link")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function insert($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("insert into speciality_sub_speciality_link values (%Q, %Q, %Q)",
				$speciality_sub_speciality_link->getSpeciality_sub_speciality_link_id(),$speciality_sub_speciality_link->getSub_speciality_id(),$speciality_sub_speciality_link->getSpeciality_id())
			);
		$ret = $this->_query($sql,"Insert failed on speciality_sub_speciality_link table");
	}
	function updateSpeciality_sub_speciality_link_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("update speciality_sub_speciality_link
				set sub_speciality_id = %Q, speciality_id = %Q where speciality_sub_speciality_link_id  = %N",
				$speciality_sub_speciality_link->getSub_speciality_id(),$speciality_sub_speciality_link->getSpeciality_id(),$speciality_sub_speciality_link->get(),$speciality_sub_speciality_link->getSpeciality_sub_speciality_link_id()
			);
		$ret = $this->_query($sql,"Update using column speciality_sub_speciality_link_id failed on speciality_sub_speciality_link table");
	}
	function updateSub_speciality_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("update speciality_sub_speciality_link
				set speciality_sub_speciality_link_id = %Q, speciality_id = %Q where sub_speciality_id  = %N",
				$speciality_sub_speciality_link->getSpeciality_sub_speciality_link_id(),$speciality_sub_speciality_link->getSpeciality_id(),$speciality_sub_speciality_link->get(),$speciality_sub_speciality_link->getSub_speciality_id()
			);
		$ret = $this->_query($sql,"Update using column sub_speciality_id failed on speciality_sub_speciality_link table");
	}
	function updateSpeciality_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("update speciality_sub_speciality_link
				set speciality_sub_speciality_link_id = %Q, sub_speciality_id = %Q where speciality_id  = %N",
				$speciality_sub_speciality_link->getSpeciality_sub_speciality_link_id(),$speciality_sub_speciality_link->getSub_speciality_id(),$speciality_sub_speciality_link->get(),$speciality_sub_speciality_link->getSpeciality_id()
			);
		$ret = $this->_query($sql,"Update using column speciality_id failed on speciality_sub_speciality_link table");
	}
	function deleteSpeciality_sub_speciality_link_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("delete from speciality_sub_speciality_link where speciality_sub_speciality_link_id  = %N",
				$speciality_sub_speciality_link->getSpeciality_sub_speciality_link_id()
			);
		$ret = $this->_query($sql,"Delete using column speciality_sub_speciality_link_id failed on speciality_sub_speciality_link table");
	}
	function deleteSub_speciality_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("delete from speciality_sub_speciality_link where sub_speciality_id  = %N",
				$speciality_sub_speciality_link->getSub_speciality_id()
			);
		$ret = $this->_query($sql,"Delete using column sub_speciality_id failed on speciality_sub_speciality_link table");
	}
	function deleteSpeciality_id($speciality_sub_speciality_link) {
		$sql = $this->mkSQL("delete from speciality_sub_speciality_link where speciality_id  = %N",
				$speciality_sub_speciality_link->getSpeciality_id()
			);
		$ret = $this->_query($sql,"Delete using column speciality_id failed on speciality_sub_speciality_link table");
	}
}
?>