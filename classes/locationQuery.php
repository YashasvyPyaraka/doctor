<?php 
require_once ("classes/Query.php");
require_once ("classes/location.php");
class LocationQuery extends Query {
	var $_rowCount = 0;
	function LocationQuery () {
		$this->Query();
		$this->_loc = new Localize(OBIB_LOCALE,"classes")
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchLocation() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array)
	}
	function mkObj($array) {
		$obj = new Location();
		$obj->setLocation_id($array["location_id"]);
		$obj->setLat($array["lat"]);
		$obj->setLong($array["long"]);
		$obj->setCity_id($array["city_id"]);
		$obj->setLocation($array["location"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from location limit %N, %N",$last, $count);
		if (!$this->_query($sql, "Error in selecting from table location")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLocation_id($location) {
		$sql = $this->mkSQL("select * from location where location_id  = %N",
				$location->getLocation_id()
			);
		if (!$this->_query($sql, "Error in selecting from table location")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLat($location) {
		$sql = $this->mkSQL("select * from location where lat  = %N",
				$location->getLat()
			);
		if (!$this->_query($sql, "Error in selecting from table location")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLong($location) {
		$sql = $this->mkSQL("select * from location where long  = %N",
				$location->getLong()
			);
		if (!$this->_query($sql, "Error in selecting from table location")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectCity_id($location) {
		$sql = $this->mkSQL("select * from location where city_id  = %N",
				$location->getCity_id()
			);
		if (!$this->_query($sql, "Error in selecting from table location")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectLocation($location) {
		$sql = $this->mkSQL("select * from location where location  = %N",
				$location->getLocation()
			);
		if (!$this->_query($sql, "Error in selecting from table location")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function insert($location) {
		$sql = $this->mkSQL("insert into location values (%Q, %Q, %Q, %Q, %Q)",
				$location->getLocation_id(),$location->getLat(),$location->getLong(),$location->getCity_id(),$location->getLocation())
			);
		$ret = $this->_query($sql,"Insert failed on location table");
	}
	function updateLocation_id($location) {
		$sql = $this->mkSQL("update location
				set lat = %Q, long = %Q, city_id = %Q, location = %Q where location_id  = %N",
				$location->getLat(),$location->getLong(),$location->getCity_id(),$location->getLocation(),$location->get(),$location->getLocation_id()
			);
		$ret = $this->_query($sql,"Update using column location_id failed on location table");
	}
	function updateLat($location) {
		$sql = $this->mkSQL("update location
				set location_id = %Q, long = %Q, city_id = %Q, location = %Q where lat  = %N",
				$location->getLocation_id(),$location->getLong(),$location->getCity_id(),$location->getLocation(),$location->get(),$location->getLat()
			);
		$ret = $this->_query($sql,"Update using column lat failed on location table");
	}
	function updateLong($location) {
		$sql = $this->mkSQL("update location
				set location_id = %Q, lat = %Q, city_id = %Q, location = %Q where long  = %N",
				$location->getLocation_id(),$location->getLat(),$location->getCity_id(),$location->getLocation(),$location->get(),$location->getLong()
			);
		$ret = $this->_query($sql,"Update using column long failed on location table");
	}
	function updateCity_id($location) {
		$sql = $this->mkSQL("update location
				set location_id = %Q, lat = %Q, long = %Q, location = %Q where city_id  = %N",
				$location->getLocation_id(),$location->getLat(),$location->getLong(),$location->getLocation(),$location->get(),$location->getCity_id()
			);
		$ret = $this->_query($sql,"Update using column city_id failed on location table");
	}
	function updateLocation($location) {
		$sql = $this->mkSQL("update location
				set location_id = %Q, lat = %Q, long = %Q, city_id = %Q where location  = %N",
				$location->getLocation_id(),$location->getLat(),$location->getLong(),$location->getCity_id(),$location->get(),$location->getLocation()
			);
		$ret = $this->_query($sql,"Update using column location failed on location table");
	}
	function deleteLocation_id($location) {
		$sql = $this->mkSQL("delete from location where location_id  = %N",
				$location->getLocation_id()
			);
		$ret = $this->_query($sql,"Delete using column location_id failed on location table");
	}
	function deleteLat($location) {
		$sql = $this->mkSQL("delete from location where lat  = %N",
				$location->getLat()
			);
		$ret = $this->_query($sql,"Delete using column lat failed on location table");
	}
	function deleteLong($location) {
		$sql = $this->mkSQL("delete from location where long  = %N",
				$location->getLong()
			);
		$ret = $this->_query($sql,"Delete using column long failed on location table");
	}
	function deleteCity_id($location) {
		$sql = $this->mkSQL("delete from location where city_id  = %N",
				$location->getCity_id()
			);
		$ret = $this->_query($sql,"Delete using column city_id failed on location table");
	}
	function deleteLocation($location) {
		$sql = $this->mkSQL("delete from location where location  = %N",
				$location->getLocation()
			);
		$ret = $this->_query($sql,"Delete using column location failed on location table");
	}
}
?>