<!DOCTYPE HTML>  
<html>
<head>
	<title>Veritabaný Projesi</title>
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
		$ad="";
		$soyad="";
		$dTarih="";
		$sinif="";
		$danisman="";
		$bolum="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["TCNo"])) {
			$TCNo = " ";
			} else {
			$TCNo = test_input($_POST["TCNo"]);
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
		  if (empty($_POST["soyad"])) {
			$soyad = " ";
			} else {
			$soyad = test_input($_POST["soyad"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["dTarih"])) {
			$dTarih = " ";
			} else {
			$dTarih = test_input($_POST["dTarih"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["sinif"])) {
			$sinif = " ";
			} else {
			$sinif = test_input($_POST["sinif"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["danisman"])) {
			$danisman = " ";
			} else {
			$danisman = test_input($_POST["danisman"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["bolum"])) {
			$bolum = " ";
			} else {
			$bolum = test_input($_POST["bolum"]);
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
		Ýþlem yapýlacak veritanýný yazýnýz: <input type="text" name="db" value="<?php echo $db;?>">
		<br><br>
		TCNo: <input type="text" name="TCNo" value="<?php echo $TCNo;?>">
		<br><br>
		ad: <input type="text" name="ad" value="<?php echo $ad;?>">
		<br><br>
		soyad: <input type="text" name="soyad" value="<?php echo $soyad;?>">
		<br><br>
		dTarih: <input type="date" name="dTarih" value="<?php echo $dTarih;?>">
		<br><br>
		sinif: <input type="text" name="sinif" value="<?php echo $sinif;?>">
		<br><br>
		danisman: <input type="text" name="danisman" value="<?php echo $danisman;?>">
		<br><br>
		bolum: <input type="text" name="bolum" value="<?php echo $bolum;?>">
		<br><br>
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
	<?php
		include("../baglan.php");
		$baglan = $baglanti;
		
		$ekle = "INSERT INTO ogrenci(TCNo,ad,soyad,dTarih,sinif,danisman,bolum)
		VALUES('$TCNo','$ad','$soyad','$dTarih','$sinif','$danisman','$bolum')";
		
		
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