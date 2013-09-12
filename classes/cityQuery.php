<?php 
require_once ("classes/Query.php");
require_once ("classes/city.php");
class CityQuery extends Query {
	var $_rowCount = 0;
	function CityQuery () {
		$this->Query();
		$this->_loc = new Localize(OBIB_LOCALE,"classes")
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchCity() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array)
	}
	function mkObj($array) {
		$obj = new City();
		$obj->setCity_id($array["city_id"]);
		$obj->setLat($array["lat"]);
		$obj->setLong($array["long"]);
		$obj->setCity($array["city"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from city limit %N, %N",$last, $count);
		if (!$this->_query($sql, "Error in selecting from table city")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectCity_id($city) {
		$sql = $this->mkSQL("select * from city where city_id  = %N",
				$city->getCity_id()
			);
		if (!$this->_query($sql, "Error in selecting from table city")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLat($city) {
		$sql = $this->mkSQL("select * from city where lat  = %N",
				$city->getLat()
			);
		if (!$this->_query($sql, "Error in selecting from table city")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLong($city) {
		$sql = $this->mkSQL("select * from city where long  = %N",
				$city->getLong()
			);
		if (!$this->_query($sql, "Error in selecting from table city")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectCity($city) {
		$sql = $this->mkSQL("select * from city where city  = %N",
				$city->getCity()
			);
		if (!$this->_query($sql, "Error in selecting from table city")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function insert($city) {
		$sql = $this->mkSQL("insert into city values (%Q, %Q, %Q, %Q)",
				$city->getCity_id(),$city->getLat(),$city->getLong(),$city->getCity())
			);
		$ret = $this->_query($sql,"Insert failed on city table");
	}
	function updateCity_id($city) {
		$sql = $this->mkSQL("update city
				set lat = %Q, long = %Q, city = %Q where city_id  = %N",
				$city->getLat(),$city->getLong(),$city->getCity(),$city->get(),$city->getCity_id()
			);
		$ret = $this->_query($sql,"Update using column city_id failed on city table");
	}
	function updateLat($city) {
		$sql = $this->mkSQL("update city
				set city_id = %Q, long = %Q, city = %Q where lat  = %N",
				$city->getCity_id(),$city->getLong(),$city->getCity(),$city->get(),$city->getLat()
			);
		$ret = $this->_query($sql,"Update using column lat failed on city table");
	}
	function updateLong($city) {
		$sql = $this->mkSQL("update city
				set city_id = %Q, lat = %Q, city = %Q where long  = %N",
				$city->getCity_id(),$city->getLat(),$city->getCity(),$city->get(),$city->getLong()
			);
		$ret = $this->_query($sql,"Update using column long failed on city table");
	}
	function updateCity($city) {
		$sql = $this->mkSQL("update city
				set city_id = %Q, lat = %Q, long = %Q where city  = %N",
				$city->getCity_id(),$city->getLat(),$city->getLong(),$city->get(),$city->getCity()
			);
		$ret = $this->_query($sql,"Update using column city failed on city table");
	}
	function deleteCity_id($city) {
		$sql = $this->mkSQL("delete from city where city_id  = %N",
				$city->getCity_id()
			);
		$ret = $this->_query($sql,"Delete using column city_id failed on city table");
	}
	function deleteLat($city) {
		$sql = $this->mkSQL("delete from city where lat  = %N",
				$city->getLat()
			);
		$ret = $this->_query($sql,"Delete using column lat failed on city table");
	}
	function deleteLong($city) {
		$sql = $this->mkSQL("delete from city where long  = %N",
				$city->getLong()
			);
		$ret = $this->_query($sql,"Delete using column long failed on city table");
	}
	function deleteCity($city) {
		$sql = $this->mkSQL("delete from city where city  = %N",
				$city->getCity()
			);
		$ret = $this->_query($sql,"Delete using column city failed on city table");
	}
}
?>