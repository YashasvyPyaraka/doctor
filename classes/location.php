<?php 
class Location {
var $location_id;
function getLocation_id() {
return $this->_location_id;
 }
function setLocation_id($location_id) {
$this->_location_id=$location_id;
 }
var $lat;
function getLat() {
return $this->_lat;
 }
function setLat($lat) {
$this->_lat=$lat;
 }
var $long;
function getLong() {
return $this->_long;
 }
function setLong($long) {
$this->_long=$long;
 }
var $city_id;
function getCity_id() {
return $this->_city_id;
 }
function setCity_id($city_id) {
$this->_city_id=$city_id;
 }
var $location;
function getLocation() {
return $this->_location;
 }
function setLocation($location) {
$this->_location=$location;
 }
}
?>