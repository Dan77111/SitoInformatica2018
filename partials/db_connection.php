<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'my_db';

$error_message = false;
$info_message = false;

try{
	$db_conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	if ($db_conn==null)
	throw new exception (mysqli_connect_error(). ' Error n.'. mysqli_connect_errno());
} catch (Exception $e){
	$error_message = true;
	$_SESSION['message'] = $e->getMessage();
}
?>
