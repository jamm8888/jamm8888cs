<?php

session_start();

if(session_id() && !$_POST['submit'] && !$_SESSION['username']){
	session_destroy();
	/*
	Meta refresh information
	http://www.pixel2life.com/forums/index.php?/topic/80-redirecting-in-php-without-using-header/
	*/
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=input.php">'; 
} else if($_POST['submit'] && !($_POST['username'] && $_POST['stringx'] && $_POST['stringy'])){

	$_SESSION['errorval']=1;
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=input.php">';
	
} else if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['stringx']) && isset($_POST['stringy'])){

	$_SESSION['username'] = htmlspecialchars($_POST['username']);
	$_SESSION['stringx'] = htmlspecialchars($_POST['stringx']);
	$_SESSION['stringy'] = htmlspecialchars($_POST['stringy']);
	
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=strings.php">';
	
} else {

	$_SESSION['username'] = htmlspecialchars($_SESSION['username']);
	$_SESSION['stringx'] = htmlspecialchars($_SESSION['stringx']);
	$_SESSION['stringy'] = htmlspecialchars($_SESSION['stringy']);
	
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=strings.php">';
}
?>
