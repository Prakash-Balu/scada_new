<?php
session_start();
include("include/functions.php");
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    header('Location: dashboard.php');
}

$username = addslashes(strtolower($_REQUEST['username']));
$password = addslashes($_REQUEST['password']);
if (strlen(trim($username)) > 0) {
    if (strlen(trim($password)) > 0) {
        if (existsRecord("SELECT Username FROM user_master WHERE username='{$username}'") == true) {
            $row          = recordSet("SELECT Username,Password,Parent_ID,Db_Name,User_Type_ID FROM user_master WHERE Username='{$username}'");
            $userpassword = $row['Password'];
            if (strlen(trim($userpassword)) > 0) {
                $qry_chkstatus  = mysql_query("SELECT Password,Username FROM user_master WHERE Username='{$username}'");
                   if (mysql_num_rows($qry_chkstatus) > 0) {
                        if (strcmp($userpassword, $password) == 0) {
				$_SESSION['username'] = $username;
				$_SESSION['partner_id']   = $row['Parent_ID'];
				$_SESSION['db_name']  = $row['Db_Name'];
				$_SESSION['user_type_id']  = $row['User_Type_ID'];
                            echo "1";
                        } else {
                            echo "2";
                        }
                    } else {
                        echo "2";
                    }
                } else {
                    echo "3";
                }
            } else {
                echo "2";
            }

    } else {
        echo "5";
    }
} else {
    echo "6";
}
exit;
?>
