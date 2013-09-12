<?php 
class Schedule {
var $schedule_id;
function getSchedule_id() {
return $this->_schedule_id;
 }
function setSchedule_id($schedule_id) {
$this->_schedule_id=$schedule_id;
 }
var $from_date;
function getFrom_date() {
return $this->_from_date;
 }
function setFrom_date($from_date) {
$this->_from_date=$from_date;
 }
var $to_date;
function getTo_date() {
return $this->_to_date;
 }
function setTo_date($to_date) {
$this->_to_date=$to_date;
 }
var $from_time;
function getFrom_time() {
return $this->_from_time;
 }
function setFrom_time($from_time) {
$this->_from_time=$from_time;
 }
var $to_time;
function getTo_time() {
return $this->_to_time;
 }
function setTo_time($to_time) {
$this->_to_time=$to_time;
 }
var $location_id;
function getLocation_id() {
return $this->_location_id;
 }
function setLocation_id($location_id) {
$this->_location_id=$location_id;
 }
var $doctor_id;
function getDoctor_id() {
return $this->_doctor_id;
 }
function setDoctor_id($doctor_id) {
$this->_doctor_id=$doctor_id;
 }
var $description;
function getDescription() {
return $this->_description;
 }
function setDescription($description) {
$this->_description=$description;
 }
}
?>