<?php
session_start();
class clsUser {
	var $dbconn="";
	var $device_data_f7="";
	var $device_data_f8="";
	var $error_data_f7="";
	var $error_data_f8="";
	var $lotto_pdoObj="";
	var $num_rows=0;

	function clsUser($conn1) {
		//$this->dbconn       = $dbconn;
		$this->device_data_f7   = "device_data_f7"; 
		$this->device_data_f8 = "device_data_f8";
		$this->error_data_f7   = "error_data_f7"; 
		$this->error_data_f8 = "error_data_f8";
	//	$this->user_pdoObj = $conn1;
		$this->num_rows     = "num_rows";
		$this->last_inst_id = "last_inst_id";
	}
	
	function userAuthendication() {
		if(empty($_SESSION["username"])) {
			return 1;	
		}
	}
	
	function getTodayRecord() {
		$browseSQL = "SELECT * FROM ".$this->device_data_f7." WHERE DATE_FORMAT(Date_S,'%Y-%m-%d')='2018-08-14' ORDER BY Record_Index DESC";
		$resultData= $this->fetchArrayObject($browseSQL); 
		return $resultData;			
	}
	
	function getDeviceData($searchArray) {
		$where = array();
		if(empty($searchArray)){
		  return $where;
		}
		
		if(!empty($searchArray['status'])) {
		   $where[]  = " Status='".$searchArray['status']."'";
		}

		$where = (!empty($where) ? " WHERE ".implode(" AND ",$where) : "");
		$browseSQL = "SELECT * FROM ".$this->device_data_f7.$where;
		if(!empty($searchArray["start_date"]) && empty($searchArray["end_date"])) {
		    $browseSQL .= " DATE_FORMAT(Date_S,'%Y-%m-%d') between ".$searchArray["start_date"]." AND ".$searchArray["end_date"];
		}
		
		$browseSQL .= " ORDER BY Record_Index DESC";
		$resultData     = $this->fetchArrayObject($browseSQL); 
		return $resultData;
	}
	
	/* Common Functions Start Here */
	function executeQuery($SQL) {
		$rsResult = mysql_query($SQL) or die("Could not run query".mysql_error());
		return $rsResult;
	}
	
	function getLastInsertID() {
		return mysql_insert_id();	
	}
	
	function getNumRows($rsResult) {
		return mysql_num_rows($rsResult);
	}
	
	function insertAndGetAffectedrows() {
		$rsResult = mysql_query($SQL) or die("Could not run query".mysql_error());
		return mysql_affected_rows();
	}
	
	function num_rows() {
		return $this->num_rows;	
	}	
	
	function fetchArrayObject($SQL) {
		$rsResult = mysql_query($SQL) or die("Could not run query".mysql_error());	
		$fIndex=0;
		while($row=mysql_fetch_object($rsResult)) {
			$fArray[$fIndex]=$row;
			$fIndex++;
		}
		return $fArray;
	}
	/* Common Functions End Here */	
	
}
?>
