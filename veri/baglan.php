<?php
	$baglanti=mysqli_connect("127.0.0.1","root","");
	if($baglanti)
	{
		echo "<br> Veritanına Bağlandı <br><br> ";
	}
	else
	{
		echo "<br> baglantı hatası <br><br> ";
	}
?>