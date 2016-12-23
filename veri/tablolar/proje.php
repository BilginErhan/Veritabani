<!DOCTYPE HTML>  
<html>
<head>
	<title>Veritabanı Projesi</title>
	<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
	<?php
		
		//database isim seçimi
		$db="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["db"])) {
			$db = " ";
			} else {
			$db = test_input($_POST["db"]);
			}
		}
		
		
		
		
		$no="";
		$baslatT="";
		$bitisT="";
		$butce="";
		$finansor="";
		$yoneticiProf="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["no"])) {
			$no = " ";
			} else {
			$no = test_input($_POST["no"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["baslatT"])) {
			$baslatT = " ";
			} else {
			$baslatT = test_input($_POST["baslatT"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["bitisT"])) {
			$bitisT = " ";
			} else {
			$bitisT = test_input($_POST["bitisT"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["butce"])) {
			$butce = " ";
			} else {
			$butce = test_input($_POST["butce"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["finansor"])) {
			$finansor = " ";
			} else {
			$finansor = test_input($_POST["finansor"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["yoneticiProf"])) {
			$yoneticiProf = " ";
			} else {
			$yoneticiProf = test_input($_POST["yoneticiProf"]);
			}
		}
		
		
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		İşlem yapılacak veritanını yazınız: <input type="text" name="db" value="<?php echo $db;?>">
		<br><br>
		No: <input type="text" name="no" value="<?php echo $no;?>">
		<br><br>
		baslatT: <input type="date" name="baslatT" value="<?php echo $baslatT;?>">
		<br><br>
		bitisT: <input type="date" name="bitisT" value="<?php echo $bitisT;?>">
		<br><br>
		butce: <input type="text" name="butce" value="<?php echo $butce;?>">
		<br><br>
		finansor: <input type="text" name="finansor" value="<?php echo $finansor;?>">
		<br><br>
		yoneticiProf: <input type="text" name="yoneticiProf" value="<?php echo $yoneticiProf;?>">
		<br><br>
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
	<?php
		include("../baglan.php");
		$baglan = $baglanti;
		
		$ekle = "INSERT INTO proje(no,baslatT,bitisT,butce,finansor,yoneticiProf)
		VALUES('$no','$baslatT','$bitisT','$butce','$finansor','$yoneticiProf')";
		
		
		mysqli_select_db($baglanti,$db);
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(mysqli_query($baglan,$ekle))
			{
				echo "eklendi";
			}else
			{
				echo "eklenemedi";
			}
		}
	?>
</body>
</head>