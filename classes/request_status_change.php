<?php 
class Request_status_change {
var $Status_Change_id;
function getStatus_Change_id() {
return $this->_Status_Change_id;
 }
function setStatus_Change_id($Status_Change_id) {
$this->_Status_Change_id=$Status_Change_id;
 }
var $Status_from;
function getStatus_from() {
return $this->_Status_from;
 }
function setStatus_from($Status_from) {
$this->_Status_from=$Status_from;
 }
var $Status_to;
function getStatus_to() {
return $this->_Status_to;
 }
function setStatus_to($Status_to) {
$this->_Status_to=$Status_to;
 }
var $Actor;
function getActor() {
return $this->_Actor;
 }
function setActor($Actor) {
$this->_Actor=$Actor;
 }
}
?>