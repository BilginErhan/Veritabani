<!DOCTYPE HTML>  
<html>
<head>
	<title>Veritabani Projesi</title>
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
		
		$TCNO="";
		$ad="";
		$uzmanlik="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["TCNO"])) {
			$TCNO = "";
			} else {
			$TCNO = intval(test_input($_POST["TCNO"]));
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["ad"])) {
			$ad = "";
			} else {
			$ad = test_input($_POST["ad"]);
			}
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["uzmanlik"])) {
			$uzmanlik = "";
			} else {
			$uzmanlik = intval(test_input($_POST["uzmanlik"]));
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
		TCNO: <input type="text" name="TCNO" value="<?php echo $TCNO;?>">
		<br><br>
		Ad: <input type="text" name="ad" value="<?php echo $ad;?>">
		<br><br>
		uzmanlik: <input type="text" name="uzmanlik" value="<?php echo $uzmanlik;?>">
		<br><br>
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
	<?php
		include("../baglan.php");
		$baglan = $baglanti;
		
		$ekle = "INSERT INTO profesor(TCNO,ad,uzmanlik)
		VALUES('$TCNO','$ad','$uzmanlik')";
		
		
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