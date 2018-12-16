<?php
session_start();
class clsLotto {
	var $dbconn="";
	var $table1_name="";
	var $table2_name="";
	var $lotto_pdoObj="";
	var $num_rows=0;

	function clsLotto($conn1) {
		//$this->dbconn       = $dbconn;
		$this->table1_name   = "table1_name"; 
		$this->table2_name= "table2_name";
		$this->lotto_pdoObj = $conn1;
		$this->num_rows     = "num_rows";
		$this->last_inst_id = "last_inst_id";
	}
	
	function userAuthendication() {
		if(empty($_SESSION["username"])) {
			return 1;	
		}
	}
	
	function getTodayRecord() {
		$browseSQL = "SELECT * FROM ".$this->table1_name." WHERE DATE_FORMAT(DRAW_STARTTIME,'%Y-%m-%d')=CURDATE() ORDER BY DRAW_ID DESC";
		$resultData= $this->fetchArrayObject($browseSQL); 
		return $resultData;			
	}
	
	function viewDraw($searchArray, $limit,$offset) {
		$browseSQL = "SELECT * FROM ".$this->table2_name." WHERE DRAW_ID!='' ";
		if(!empty($searchArray["DRAW_NAME"]))
			$browseSQL .= "AND DRAW_NUMBER='".$searchArray["DRAW_NAME"]."' ";
		if(!empty($searchArray["DRAW_STATUS"]))
			$browseSQL .= "AND DRAW_STATUS=".$searchArray["DRAW_STATUS"]." ";			
				
		$browseSQL .= "ORDER BY DRAW_ID DESC LIMIT $offset,$limit";
		$rsResult  = $this->executeQuery($browseSQL);
		$this->num_rows = $this->getNumRows($rsResult);	
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
