<?php
	include("baglan.php");
?>
<html>
<head><title>Veritabanı Projesi</title></head>
<body>
	<form method="post" action="database.php">
		<table>
			<tr>
				<td>Yeni Veritabanı Adı : </td>
				<td><input type="text" name="database" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Gönder" /></td>
			</tr>
		</table>
	</form>
</body>
</html>