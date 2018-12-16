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
        if (existsRecord("SELECT user_id,username FROM user WHERE username='{$username}'") == true) {
            $row          = recordSet("SELECT user_id,password,username FROM user WHERE username='{$username}'");
            $userpassword = $row['password'];
            if (strlen(trim($userpassword)) > 0) {
                $Authentication = 1;
                $qry_chkstatus  = mysql_query("SELECT user_id,username FROM user WHERE username='{$username}'");
                if ($Authentication == '1') {
                    if (mysql_num_rows($qry_chkstatus) > 0) {
                        if (strcmp($userpassword, md5($password)) == 0) {
                            $_SESSION['username'] = $username;
                            $_SESSION['userid']   = $row['USER_ID'];
                            $_SESSION['db_name']  = 'new';
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
            echo "2";
        }
        /* }else{
        echo "4";//capcha
        }  */
    } else {
        echo "5";
    }
} else {
    echo "6";
}
exit;
?>
