<?php
ini_set('display_errors','On');
include 'storedInfo.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Database</title>

<link rel="stylesheet" type="text/css" href="pagestyles.css" media="screen" />

</head>
<body>
<div id="heading">
Resetting Database
</div>
<div class="errorMessage">

</div>

<div id="displayTable">
<p><span class="subheading">Deleting Database Table Liquids</span></p>
<?php
	$mysqli = new PDO($db,$dbuser,$dbpass,array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	if(!($stmt = $mysqli->prepare("DROP TABLE IF EXISTS liquids"))){
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} 
	
			
	if(!$stmt->execute()){
		echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} 
?>
<p><span class="subheading">Re-Creating Database Liquids</span></p>
<?php
	if(!($stmt = $mysqli->prepare("CREATE TABLE IF NOT EXISTS liquids(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, liquid VARCHAR(20), flavour VARCHAR(20), quantity INT(6))"))){
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} 
	
			
	if(!$stmt->execute()){
		echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} 
		
	$mysqli->db = null;
?>
</div>
</body>
</html>
