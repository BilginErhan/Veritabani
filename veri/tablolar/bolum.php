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
		$ad="";
		$tel="";
		$bolumBsk="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["no"])) {
			$no = " ";
			} else {
			$no = test_input($_POST["no"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["ad"])) {
			$ad = " ";
			} else {
			$ad = test_input($_POST["ad"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["tel"])) {
			$tel = " ";
			} else {
			$tel = test_input($_POST["tel"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["bolumBsk"])) {
			$bolumBsk = " ";
			} else {
			$bolumBsk = test_input($_POST["bolumBsk"]);
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
		ad: <input type="text" name="ad" value="<?php echo $ad;?>">
		<br><br>
		tel: <input type="text" name="tel" value="<?php echo $tel;?>">
		<br><br>
		bolumBsk: <input type="text" name="bolumBsk" value="<?php echo $bolumBsk;?>">
		<br><br>
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
	<?php
		include("../baglan.php");
		$baglan = $baglanti;
		
		$ekle = "INSERT INTO bolum(no,ad,tel,bolumBsk)
		VALUES('$no','$ad','$tel','$bolumBsk')";
		
		
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