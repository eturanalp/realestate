<?
session_start();
include "ayar.inc.php";
include("dbinfo.inc.php");
$database="db114582680";
//echo "$database";

//session_register("uuser");
//session_register("kullanici_emlakci_no");
//session_register("s_il_no");
//session_register("s_ilce_no");
//session_register("s_bolge");
//session_register("emlakci_il_no");
//session_register("emlakci_ilce_no");


//$_SESSION['uuser']="";

//$uuser="xxx";
//$kullanici_emlakci_no=0;
//$s_il_no=0;
//$s_ilce_no=0;
//$s_bolge="";
//$emlakci_il_no=0;
//$emlakci_ilce_no=0;

$user=$_POST['kullanici_ismi'];
$sifre=$_POST['kullanici_sif'];

mysql_connect("db145.perfora.net",$username,$password);
@mysql_select_db($database) or die( "Unable to select database"); 
$sql = 'SELECT *  FROM `emlakci` '
        . ' WHERE 1 AND `kullanici_ismi` LIKE \'' . "$user" . '\''; 
$result=mysql_query($sql);
$num=mysql_numrows($result);

if (($num==1) And ($sifre==mysql_result($result,0,"kullanici_sif"))) {
   //$uuser=$user;
   $_SESSION['uuser']=$user;
   //echo "<br> <br> Sifre geçerli. Simdi oturumunuz basladi $user. Devam etmek için tiklayiniz";
   //echo $_SESSION['uuser'];
   // EMlakçinin bilgilerini ve sehir ve ilçesini oturum degiskenlerine at:
   $_SESSION['kullanici_emlakci_no']=mysql_result($result,0,"emlakci_no");
 	 $_SESSION['s_emlakci']=mysql_result($result,0,"isim");
   $_SESSION['s_il_no']=mysql_result($result,0,"il_no");
   $_SESSION['s_ilce_no']=mysql_result($result,0,"ilce_no");
   $_SESSION['emlakci_il_no']=mysql_result($result,0,"il_no");
   $_SESSION['emlakci_ilce_no']=mysql_result($result,0,"ilce_no");
	 $mesaj_tekrar=mysql_result($result,0,"mesaj_tekrar");
	 if (($mesaj_tekrar--)>0) {
     $mesaj=mysql_result($result,0,"mesaj");
  	 mysql_query("UPDATE emlakci SET mesaj_tekrar=$mesaj_tekrar WHERE emlakci_no=".$_SESSION['kullanici_emlakci_no']);
	   }
	 
	 //include "emlak_list_satir.php";
	 include "html.php";
   include "ayar.inc.php";
   include "mysql.inc.php";
   include "menu.inc.php";
	 echo "<br>Hoþgeldiniz. " . $_SESSION['s_emlakci'] . " adýna oturumunuz baþlamýþtýr..<br/>"; 
 	 if (!empty($mesaj))
	    echo "<br><br><b> www.EvBulur.com'dan mesaj:</b><br><br>$mesaj <br/>"; 
	 //header("Location: emlak_list_satir.php"); /* Redirect browser */
   //exit;
   }
else if ($num1>1) {
   include "html.php";
   echo "<br> <br> Duplike kullanýcý kaydý. Lütfen teknik servisimize veya müþteri temsilcinize baþvurunuz.<br>";
   }	 
else {
   include "html.php";
   echo "<br> <br> Þifre geçersiz. Yeniden deneyiniz. Büyük ve küçük harf ayrýmýna dikkat ediniz. <br>";
   }

mysql_close();
?>