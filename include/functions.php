<?php
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ALL );
include ("DbConnect.php");
function existsRecord($query) {
	$results = mysql_query ( $query ) or die ( mysql_error () . " connection failed" );
	$num = mysql_num_rows ( $results );
	
	if ($num > 0) {
		return true;
	} else {
		return false;
	}
}
function executeQuery($query) {
	$results = mysql_query ( $query ) or die ( mysql_error () . "connection failed in Execute Query" );
	if ($results) {
		return true;
	} else {
		return false;
	}
}
function getRecord($query, $field_name, $flag) {
	$results = mysql_query ( $query ) or die ( mysql_error () . " connection failed" );
	$num = mysql_num_rows ( $results );
	$flag = $flag == '' ? 0 : $flag;
	if ($num > 0) {
		$rows = mysql_fetch_array ( $results );
		return $rows [$flag];
	} else {
		return "No Records";
	}
}
function getQueryRecord($query) {
	$rows = '';
	$results = mysql_query ( $query ) or die ( mysql_error () . " connection failed" );
	$num = mysql_num_rows ( $results );
	if ($num > 0) {
		$rows = mysql_fetch_assoc ( $results );
		
		return $rows;
	} else {
		return $rows;
	}
}
function recordSet($query) {
	$results = mysql_query ( $query ) or die ( mysql_error () . " connection failed" );
	$num = mysql_num_rows ( $results );
	if ($num > 0) {
		$row = mysql_fetch_array ( $results );
		return $row;
	}
}
function getIp() {
	return $_SERVER ['REMOTE_ADDR'];
}
function checkInputs($formData) {
	if (empty ( $formData )) {
		return 0;
	}
	$result = array ();
	
	foreach ( $formData as $key => $val ) {
		/**
		 * validate double value is empty or not
		 */
		if ($key == 'san') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				
				$result ['double'] ['1'] = remove_empty ( $val );
			}
		}
		if ($key == 'che') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['double'] ['2'] = remove_empty ( $val );
			}
		}
		if ($key == 'sup') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['double'] ['3'] = remove_empty ( $val );
			}
		}
		if ($key == 'del') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['double'] ['4'] = remove_empty ( $val );
			}
		}
		
		if ($key == 'bha') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['double'] ['5'] = remove_empty ( $val );
			}
		}
		if ($key == 'dia') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['double'] ['6'] = remove_empty ( $val );
			}
		}
		if ($key == 'luk') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['double'] ['7'] = remove_empty ( $val );
			}
		}
		
		/**
		 * validate andar value is empty or not
		 */
		if ($key == 'andar_san') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['andar'] [1] = remove_empty ( $val );
			}
		}
		if ($key == 'andar_che') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['andar'] [2] = remove_empty ( $val );
			}
		}
		if ($key == 'andar_sup') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['andar'] [3] = remove_empty ( $val );
			}
		}
		if ($key == 'andar_del') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['andar'] [4] = remove_empty ( $val );
			}
		}
		
		if ($key == 'andar_bha') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['andar'] [5] = remove_empty ( $val );
			}
		}
		if ($key == 'andar_dia') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['andar'] [6] = remove_empty ( $val );
			}
		}
		if ($key == 'andar_luk') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['andar'] [7] = remove_empty ( $val );
			}
		}
		
		/**
		 * validate bahar value is empty or not
		 */
		if ($key == 'bahar_san') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['bahar'] ['1'] = remove_empty ( $val );
			}
		}
		if ($key == 'bahar_che') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['bahar'] ['2'] = remove_empty ( $val );
			}
		}
		
		if ($key == 'bahar_sup') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['bahar'] ['3'] = remove_empty ( $val );
			}
		}
		if ($key == 'bahar_del') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['bahar'] ['4'] = remove_empty ( $val );
			}
		}
		
		if ($key == 'bahar_bha') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['bahar'] ['5'] = remove_empty ( $val );
			}
		}
		if ($key == 'bahar_dia') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['bahar'] ['6'] = remove_empty ( $val );
			}
		}
		if ($key == 'bahar_luk') {
			if (! empty ( $val ) && array_sum ( $val ) != 0) {
				$result ['bahar'] ['7'] = remove_empty ( $val );
			}
		}
	}
	// echo '<pre>';print_r($result);exit;
	return $result;
}
function remove_empty($array) {
	return array_filter ( $array, '_remove_empty_internal' );
}
function _remove_empty_internal($value) {
	return ! empty ( $value ) || $value === 0;
}

?>