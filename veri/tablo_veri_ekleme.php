<?php
	try{
		if($_POST["sec"]=='1')
		{
			header ("Location:tablolar/uzmanliklar.php"); 
		}else if($_POST["sec"]=='2')
		{
			header ("Location:tablolar/profesor.php");
		}else if($_POST["sec"]=='3')
		{
			header ("Location:tablolar/proje.php");
		}else if($_POST["sec"]=='4')
		{
			header ("Location:tablolar/bolum.php");
		}else if($_POST["sec"]=='5')
		{
			header ("Location:tablolar/ogrenci.php");
		}else if($_POST["sec"]=='6')
		{
			header ("Location:tablolar/ogrCalisir.php");
		}else if($_POST["sec"]=='7')
		{
			header ("Location:tablolar/profCalisir.php");
		}else if($_POST["sec"]=='8')
		{
			header ("Location:tablolar/calistigi.php");
		}
	}catch (Exception $e)
	{
		
	}
?>
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
		
		$db="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["db"])) {
			$db = " ";
			} else {
			$db = test_input($_POST["db"]);
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
		<input type="submit" name="submit" value="Submit">
	</form>
	</body>
</head>