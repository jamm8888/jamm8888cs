<?php
ini_set('display_errors','On');
include 'storedInfo.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Drink Database</title>

<link rel="stylesheet" type="text/css" href="pagestyles.css" media="screen" />

</head>
<body>
<div id="heading">
Drink Database - Add Drink
</div>
<div class="errorMessage">
<?php
$mysqli = new PDO($db,$dbuser,$dbpass,array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	$error=0;
	
	if($_POST['Flavour'] === "" || !$_POST['Flavour']){
	
		echo "<p>Missing Flavour or Incorrect Value type in Flavour</p>";
		$error=1;
	
	}
	if(!preg_match('/^[a-zA-Z0-9 ]+$/',$_POST['Flavour'])){
	
		echo "<p>Incorrect Value in Flavour.  Please use letters, numbers and spaces only.</p>";
		$error=1;
		
	}
	if($_POST['Quantity'] === "" || !$_POST['Quantity']){
	
		echo "<p>Missing Quantity</p>";
		$error=1;
		
	}
	if(!preg_match('/^[0-9]+$/',$_POST['Quantity'])){
	
		echo "<p>Incorrect Value in Quantity.  Please use numbers only.</p>";
		$error=1;
		
	}
	if($error===0) {
		
		$juiceType = htmlspecialchars($_POST['JuiceType']);
		$flavour = htmlspecialchars($_POST['Flavour']);
		$quantity = htmlspecialchars($_POST['Quantity']);
		$id = 'NULL';
		
		if(!($stmt = $mysqli->prepare("INSERT INTO liquids(id, liquid, flavour, quantity) VALUES (NULL, :liquid, :flavour, :quantity)"))){
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		} 
		
		$stmt->bindParam(':liquid', $juiceType);
		$stmt->bindParam(':flavour', $flavour);
		$stmt->bindParam(':quantity', $quantity);
			
		if(!$stmt->execute()){
			echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
		} 
		
		$stmt->db = NULL;
	}
}
?>
</div>
<div>
<form id="drinks" method="post" action="index.php"><!--Change this later-->
<fieldset>
	<legend class="subheading">Add a drink to the database</legend>
	Drink Type: <select name="JuiceType">
		<option value ="juice">Juice</option>
		<option value ="milk">Milk</option>
		<option value ="coffee">Coffee</option>
		<option value ="tea">Tea</option>
	</select>
	<p>Flavour: <input type="text" name="Flavour" id="flavour" /></p>
	<p>Quantity: <input type="text" name="Quantity" id="quantity" /></p>
</fieldset>
<p><input type="submit" value="Add Drink" /></p>
</form>
</div>
<div id="displayTable">
<span class="subheading">Last 10 table entries</span>
<table id="centeredTable">
	<tr>
		<th class="tdhead">ID</th>
		<th class="tdhead">Drink</th>
		<th class="tdhead">Flavour</th>
		<th class="tdhead">Quantity</th>
	</tr>

<?php

if(!($stmt = $mysqli->prepare("SELECT id, liquid, flavour, quantity FROM liquids ORDER BY id desc LIMIT 10"))) {
	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 


if(!$stmt->execute()){
	echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 

$sum = 0;

while ($result = $stmt->fetch()){

	printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $result['id'], $result[1], $result[2], $result[3]);
	$sum = $sum + $result[3];
}

$stmt->db = NULL;

?>
</table>
<?php
echo "<p>The sum of the integers is: " . $sum . "</p>";
?>
</div>
</body>
</html>
