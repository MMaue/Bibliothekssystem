<?php
session_start();
if(isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
	unset($_SESSION['user_mail']);
	unset($_SESSION['user_pwhash']);
	unset($_SESSION['user_vorname']);
	unset($_SESSION['user_name']);
}
session_destroy();
header('Location: http://'.$_SERVER['HTTP_HOST'].'/biblio/index.php');
exit();
?>