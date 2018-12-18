<?php
class clsUser {
	public $dbconn="";
	public $device_data_f7="";
	public $device_data_f8="";
	public $error_data_f7="";
	public $error_data_f8="";
	public $lotto_pdoObj="";
	public $num_rows=0;

	function __construct($conn1) {
		$this->dbconn       = $conn1;
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
		$rsResult = mysqli_query($this->dbconn,$SQL) or die("Could not run query".mysqli_connect_error());
		return $rsResult;
	}
	
	function getLastInsertID() {
		return mysqli_insert_id();	
	}
	
	function getNumRows($rsResult) {
		return mysqli_num_rows($rsResult);
	}
	
	function insertAndGetAffectedrows() {
		$rsResult = mysqli_query($this->dbconn ,$SQL) or die("Could not run query".mysqli_connect_error());
		return mysql_affected_rows();
	}
	
	function num_rows() {
		return $this->num_rows;	
	}	
	
	function fetchArrayObject($SQL) {
		$fArray =array();
		$rsResult = mysqli_query($this->dbconn ,$SQL) or die("Could not run query".mysqli_connect_error());
		//print_r($SQL);exit;
		$fIndex=0;
		while($row=mysqli_fetch_object($rsResult)) {
			$fArray[$fIndex]=$row;
			$fIndex++;
		}
		return $fArray;
	}
	/* Common Functions End Here */	
	
}
?>
