<?php

function existsRecord($query, $connection) {
	$results = mysqli_query ( $connection, $query);
	$num = mysqli_num_rows ( $results );
	
	if ($num > 0) {
		return true;
	} else {
		return false;
	}
}
function executeQuery($query, $connection) {
	$results = mysqli_query ( $connection, $query);
	if ($results) {
		return true;
	} else {
		return false;
	}
}
function getRecord($query, $field_name, $flag, $connection) {
	$results = mysqli_query ( $connection, $query);
	$num = mysqli_num_rows ( $results );
	$flag = $flag == '' ? 0 : $flag;
	if ($num > 0) {
		$rows = mysqli_fetch_array ( $results );
		return $rows [$flag];
	} else {
		return "No Records";
	}
}
function getQueryRecord($query, $connection) {
	$rows = '';
	$results = mysqli_query ( $connection , $query);
	$num = mysqli_num_rows ( $results );
	if ($num > 0) {
		$rows = mysqli_fetch_assoc ( $results );
		
		return $rows;
	} else {
		return $rows;
	}
}
function recordSet($query, $connection) {
	$results = mysqli_query ( $connection, $query);
	$num = mysqli_num_rows ( $results );
	if ($num > 0) {
		$row = mysqli_fetch_array ( $results );
		return $row;
	}
}
function getIp() {
	return $_SERVER ['REMOTE_ADDR'];
}
function remove_empty($array) {
	return array_filter ( $array, '_remove_empty_internal' );
}
function _remove_empty_internal($value) {
	return ! empty ( $value ) || $value === 0;
}

?>