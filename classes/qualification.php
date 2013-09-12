<?php 
class Qualification {
var $qualification_id;
function getQualification_id() {
return $this->_qualification_id;
 }
function setQualification_id($qualification_id) {
$this->_qualification_id=$qualification_id;
 }
var $degree;
function getDegree() {
return $this->_degree;
 }
function setDegree($degree) {
$this->_degree=$degree;
 }
var $year;
function getYear() {
return $this->_year;
 }
function setYear($year) {
$this->_year=$year;
 }
var $university;
function getUniversity() {
return $this->_university;
 }
function setUniversity($university) {
$this->_university=$university;
 }
}
?>