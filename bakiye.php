<?
include "kontrol.inc.php";
function timestamp_to_date($YYYYMMDDHHMMSS,$saniye,$format) {
   list($year,$month,$day,$hour,$minute,$seconds) = sscanf($YYYYMMDDHHMMSS,'%4s%2s%2s%2s%2s%2s');
   return date($format, mktime($hour,$minute,$seconds,$month,$day,$year)+$saniye);
}
function timestamp_to_time($YYYYMMDDHHMMSS,$saniye) {
   list($year,$month,$day,$hour,$minute,$seconds) = sscanf($YYYYMMDDHHMMSS,'%4s%2s%2s%2s%2s%2s');
   return mktime($hour,$minute,$seconds,$month,$day,$year)+$saniye;
}
//$emlakci_no = $_GET['emlakci_no'];
$emlakci_no = $_SESSION['kullanici_emlakci_no'];

$qx = mysql_query("SELECT * FROM emlakci, il, ilce WHERE emlakci_no='$emlakci_no' AND emlakci.il_no=il.il_no AND emlakci.ilce_no=ilce.ilce_no");
$qq = mysql_fetch_array($qx);

$emlakci_no = $qq['emlakci_no'];
$isim = $qq['isim'];
$adi = $qq['adi'];
$soyadi = $qq['soyadi'];
$abt = $qq['eklenme_tarihi'];

//$ibad = $qq['abonelik_donemi'];
$bolge = $qq['bolge'];
//$kalbak = $qq['kalan_bakiye'];
//$donbak = $qq['donem_bakiyesi'];
$topbak = $qq['bakiye'];
$qx = mysql_query("SELECT emlakci_no, SUM(islem_degeri) as yenibakiye FROM odemeler WHERE emlakci_no='$emlakci_no' GROUP BY emlakci_no");
if (!$qx) error_log("\n" . date("d.m.Y H:i") . "---Hata:" . mysql_errno() . ": " . mysql_error() , 3, "mysql_hatalari.log");
$qq = mysql_fetch_array($qx);
$yenibakiye = $qq['yenibakiye'];
if ($yenibakiye!=$bakiye) {
   if (mysql_query("UPDATE emlakci SET bakiye=$yenibakiye WHERE emlakci_no='$emlakci_no' LIMIT 1"))
     error_log("\n" . date("d.m.Y H:i") . "---Hata:" . mysql_errno() . ": " . mysql_error() , 3, "mysql_hatalari.log");
	 }
//$abt=timestamp_to_time($abt,60*60*24*31);
$abt=strtotime($abt)+60*60*24*31;
$ucretsiz=$abt-60*60*24*31;
for ($donem_bitis=$abt; $donem_bitis< time() ; $donem_bitis+=60*60*24*91 );
$donem_basla=$donem_bitis-60*60*24*91;
$son_odeme_tarihi=($abt<time())?($donem_basla+60*60*24*15):($abt+60*60*24*15);
echo "<br /><font color=\"#BB3355\"><u>$isim için hesap Özeti:</u></font>";
echo "<br />   Kayýt tarihi: "; echo date('d.m.Y',$ucretsiz);
echo "<br />   Abonelik Baþlangýç tarihi: "; echo date('d.m.Y',$abt);
echo "<br />   Ýçinde bulunulan abonelik dönemi: " . date('d.m.Y',$donem_basla) . "-" . date('d.m.Y',$donem_bitis);
//echo "<br />   Önceki dönemlerden kalan bakiye: $kalbak YTL";
//echo "<br />   Son dönem bakiyesi: 60.00 YTL";
echo "<br />   Toplam bakiye: $yenibakiye YTL";  //$yenibakiye
if ($yenibakiye>0) echo "<br />   Son ödeme tarihi: " . "31.5.2005";   //date('d.m.Y',$son_odeme_tarihi)
echo "<br />-------------------------------------------";echo "<br />";
if ($_GET['islem_detay']=='E') {
  $qx = mysql_query("SELECT islem_tarihi, islem_degeri , aciklama FROM odemeler WHERE emlakci_no='$emlakci_no' AND islem_tarihi > '05/18/2005' ORDER BY islem_tarihi DESC;");
	$data=mysql_num_rows($qx);
	$gun=0;
	if ($data>0) echo "<br /><font color=\"#BB3355\"><u>Hesap Ýþlemleri:</u></font><br /><table cellspacing=\"5\" border=\"1\"><tr><td><b>Ýþlem Tarihi</b></td><td><b> Ýþlem Tutarý</b></td><td><b>Açýklama</b></td> </tr>";
  while($qq = mysql_fetch_array($qx)){
    $it = timestamp_to_date($qq['islem_tarihi'],0,'d.m.Y');
		$id = $qq['islem_degeri'];
		$aciklama = $qq['aciklama'];
		echo "<tr><td>$it</td><td> $id</td><td> $aciklama</td> </tr>";
		if ($id==-60.00) $gun+=91;
		else if ($id==-100.00) $gun+=182;
		else if ($id==-180.00) $gun+=365;
		else if ($id<0) $gun+=intval(-$id*182/100);
    }
  echo "</table>";	
  if ($yenibakiye<=0)
    echo "Not: " . date('d.m.Y',$abt+(60*60*24*$gun)) . " tarihine kadar olan abonelik ücretiniz ödenmiþtir.<br />";
  //  else 
  //    echo "<br />";
	echo "<br />-------------------------------------------";echo "<br />";			
	}
else 
  echo "<a href=\"abone_hesap.php?islem_detay=E\">Hesap Ýþlemleri'ni listelemek için týklayýnýz <a/>";	
echo "<br />";echo "<br />";	

?>
