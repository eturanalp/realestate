<?
$url = $_POST[url];
$name = $_POST[name];
$email = $_POST[email];
$friendmail1 = $_POST[friendmail1];
$friendmail2 = $_POST[friendmail2];
$friendmail3 = $_POST[friendmail3];
$message = $_POST[message];
$time = date ("Y-m-d H:i:s");

strip_tags($name);
strip_tags($email);
strip_tags($friendmail1);
strip_tags($friendmail2);
strip_tags($friendmail3);
strip_tags($message);

include "mysql.inc.php";

mysql_query("INSERT INTO tavsiye (id,name,email,url,friendmail1,friendmail2,friendmail3,message,time) VALUES (null,'$name','$email','$url','$friendmail1','$friendmail2','$friendmail3','$message','$time')");

$thankyoupage = "http://www.evbulur.com/tesekkurler.php";

$subject = "Arkada��n�z size EvBulur.com'dan bir emlak sayfas� �nerdi";

$text = "Merhabalar;

Arkada��n�z ".$name.", EvBulur.com sitesinde ilan� bulunan a�a��daki emla�� bilginize sundu:

".$url."

(Arkada��n�z�n e-posta adresi: ".$email.")

________________________________________
EvBulur.com - \"Binlerce Emlak �lan�\"
http://www.evbulur.com
";

$ouremail = "ilan@evbulur.com";

mail("$friendmail1 $friendmail2 $friendmail3", $subject, $text, "From: $ouremail");

header("Location: $thankyoupage");
exit;

mysql_close();
?>