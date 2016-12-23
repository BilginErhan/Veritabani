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
		
		
		
		$kod="";
		$ad="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["kod"])) {
			$kod = " ";
			} else {
			$kod = test_input($_POST["kod"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["ad"])) {
			$ad = " ";
			} else {
			$ad = test_input($_POST["ad"]);
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
		Kod: <input type="text" name="kod" value="<?php echo $kod;?>">
		<br><br>
		Ad: <input type="text" name="ad" value="<?php echo $ad;?>">
		<br><br>
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
	<?php
		include("../baglan.php");
		$baglan = $baglanti;
		
		$ekle = "INSERT INTO uzmanliklar(kod,ad)
		VALUES('$kod','$ad')";
		
		
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