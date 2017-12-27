<?
$db_host = "db145.perfora.net";
$db_user = "dbo114582680";
$db_pass = "s3u8YCFh";
$db_database = "db114582680";

mysql_connect("$db_host","$db_user","$db_pass")
or die ("Veritabanýna baðlanamadý");

@mysql_select_db("$db_database")
or die("Veritabaný bulunamadý");
?>