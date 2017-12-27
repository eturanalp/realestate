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

$subject = "Arkadaþýnýz size EvBulur.com'dan bir emlak sayfasý önerdi";

$text = "Merhabalar;

Arkadaþýnýz ".$name.", EvBulur.com sitesinde ilaný bulunan aþaðýdaki emlaðý bilginize sundu:

".$url."

(Arkadaþýnýzýn e-posta adresi: ".$email.")

________________________________________
EvBulur.com - \"Binlerce Emlak Ýlaný\"
http://www.evbulur.com
";

$ouremail = "ilan@evbulur.com";

mail("$friendmail1 $friendmail2 $friendmail3", $subject, $text, "From: $ouremail");

header("Location: $thankyoupage");
exit;

mysql_close();
?>