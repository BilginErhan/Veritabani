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
		
		
		
		$TCNo="";
		$proje="";
		$profesor="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["TCNo"])) {
			$TCNo = " ";
			} else {
			$TCNo = test_input($_POST["TCNo"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["proje"])) {
			$proje = " ";
			} else {
			$proje = test_input($_POST["proje"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["profesor"])) {
			$profesor = " ";
			} else {
			$profesor = test_input($_POST["profesor"]);
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
		TCNo: <input type="text" name="TCNo" value="<?php echo $TCNo;?>">
		<br><br>
		proje: <input type="text" name="proje" value="<?php echo $proje;?>">
		<br><br>
		profesor: <input type="text" name="profesor" value="<?php echo $profesor;?>">
		<br><br>
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
	<?php
		include("../baglan.php");
		$baglan = $baglanti;
		
		$ekle = "INSERT INTO ogrCalisir(TCNo,proje,profesor)
		VALUES('$TCNo','$proje','$profesor')";
		
		
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