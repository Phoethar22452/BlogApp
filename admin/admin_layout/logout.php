<?php 
	session_start();
	$_SESSION['useremail']=null;
	$_SESSION['username']=null;
	$_SESSION['userpassword']=null;
	$_SESSION['userrole']=null;
	header('location:../../index.php');
 ?>