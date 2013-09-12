<?php 
class Patient {
var $patient_id;
function getPatient_id() {
return $this->_patient_id;
 }
function setPatient_id($patient_id) {
$this->_patient_id=$patient_id;
 }
var $first_name;
function getFirst_name() {
return $this->_first_name;
 }
function setFirst_name($first_name) {
$this->_first_name=$first_name;
 }
var $last_name;
function getLast_name() {
return $this->_last_name;
 }
function setLast_name($last_name) {
$this->_last_name=$last_name;
 }
var $email;
function getEmail() {
return $this->_email;
 }
function setEmail($email) {
$this->_email=$email;
 }
var $mobile;
function getMobile() {
return $this->_mobile;
 }
function setMobile($mobile) {
$this->_mobile=$mobile;
 }
var $gender;
function getGender() {
return $this->_gender;
 }
function setGender($gender) {
$this->_gender=$gender;
 }
var $age;
function getAge() {
return $this->_age;
 }
function setAge($age) {
$this->_age=$age;
 }
var $date_of_birth;
function getDate_of_birth() {
return $this->_date_of_birth;
 }
function setDate_of_birth($date_of_birth) {
$this->_date_of_birth=$date_of_birth;
 }
var $address;
function getAddress() {
return $this->_address;
 }
function setAddress($address) {
$this->_address=$address;
 }
var $parent_guardian;
function getParent_guardian() {
return $this->_parent_guardian;
 }
function setParent_guardian($parent_guardian) {
$this->_parent_guardian=$parent_guardian;
 }
}
?>