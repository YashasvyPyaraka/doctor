<?php 
class City {
var $city_id;
function getCity_id() {
return $this->_city_id;
 }
function setCity_id($city_id) {
$this->_city_id=$city_id;
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
var $city;
function getCity() {
return $this->_city;
 }
function setCity($city) {
$this->_city=$city;
 }
}
?>