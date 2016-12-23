<?php
	//mysql bağlantısı
	include("baglan.php");
	
	$baglan=$baglanti;
	
	//database oluşturma
	$database_name = $_POST["database"];
	
	$olustur = "CREATE DATABASE $database_name";
	if(mysqli_query($baglan,$olustur))
	{
		echo "Database oluşturuldu";
	}
	else
	{
		echo "Database oluşturulamadı";
	}
	
	mysqli_select_db($baglan,$database_name);
	
	
	
	//uzmanlıklar tablosu
	$uzmanliklar="CREATE TABLE uzmanliklar(
		kod integer not null auto_increment,
		ad char(10) not null,
		constraint pk_deneme2 primary key(kod)
	)";
	
	//profesör tablosu
	$profesor="CREATE TABLE profesor(
		TCNO integer not null,
		ad char(10),
		uzmanlik integer not null,
		constraint pk_deneme1 primary key(TCNO),
		constraint fk_deneme1 foreign key(uzmanlik) references uzmanliklar(uzmanlik)
	)";
	
	//proje tablosu
	$proje = "CREATE TABLE proje(
		no integer not null,
		baslatT date,
		bitisT date,
		butce integer,
		finansor char(20),
		yoneticiProf integer not null,
		constraint pk_deneme3 primary key(no),
		constraint fk_deneme2 foreign key(yoneticiProf) references profesor(yoneticiProf)
	)";
	
	
	//bölüm tablosu
	$bolum="CREATE TABLE bolum(
		no integer not null,
		ad char(10),
		tel varchar(10),
		bolumBsk integer not null,
		constraint pk_deneme primary key(no),
		constraint fk_deneme foreign key(bolumBsk) references profesor(bolumBsk)
	)";
	
	//öğrenci tablosu
	$ogrenci="CREATE TABLE ogrenci(
		TCNo integer not null,
		ad char(10),
		soyad char(10),
		dTarih date,
		sinif char(5),
		danisman integer not null,
		bolum integer not null,
		constraint pk_deneme primary key(TCNo),
		constraint fk_deneme foreign key(bolum) references ogrenci(bolum)
	)";
	
	//ogrCalisir tablosu
	$ogrCalisir="CREATE TABLE ogrCalisir(
		TCNo integer not null,
		proje integer not null,
		profesor integer not null,
		constraint fk_deneme foreign key(TCNo) references ogrenci(Tc),
		constraint fk_deneme1 foreign key(proje) references proje(proje),
		constraint fk_deneme2 foreign key(profesor) references profesor(profesor)
	)";
	
	//profCalisir tablosu
	$profCalisir="CREATE TABLE profCalisir(
		TCNo integer not null,
		proje integer not null,
		constraint fk_denem1e foreign key(TCNo) references ogreci(TCN),
		constraint fk_deneme foreign key(proje) references proje(proje1)
	)";
	
	//calistigi tablosu
	$calistigi="CREATE TABLE calistigi(
		TCNo integer not null,
		bolum integer not null,
		baslatT date,
		bitisT date,
		constraint fk_deneme foreign key(TCNo) references profesor(TCNo),
		constraint fk_deneme2 foreign key(bolum) references bolum(bolum)
	)";
	
	$array = array($uzmanliklar,$profesor,$proje,$bolum,$ogrenci,$ogrCalisir,$profCalisir,$calistigi);
	$array1 = array('uzmanliklar','profesor','proje','bolum','ogrenci','ogrCalisir','profCalisir','calistigi');
	
	for($i=0;$i<7;$i++)
	{
		echo "<br><br>";
		
		if(mysqli_query($baglan,$array[$i]))
			echo "$array1[$i] tablosu oluşturuldu";
		else
			echo "$array1[$i] tablosu oluşturuldu veya hata var";
	}
?>
<html>
<head><title>Veritabanı Projesi</title></head>
<body>
	<a href="tablo_sec.html">Tablolara Veri eklemek için tıkla</a>
</body>
</html>