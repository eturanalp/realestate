<?
// Tüm emlakcilarý 10ar 10ar sayfalar halinde listeler , 
// onceden her bir emlakci icin olusturulmus html dosyalarýna isaret eder. 
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";

?>
<table border="1" width="100%" cellspacing="0" cellpadding="3">
  <tr>
    <td width="10%" align="center"><b>Ýþletme Adý</b></td>
    <td width="10%" align="center"><b>Emlakçý</b></td>
    <td width="15%" align="center"><b>Adres</b></td>
    <td width="5%" align="center"><b>Ýlçe</b></td>
		<td width="5%" align="center"><b>Bölge/Mahal</b></td>
    <td width="10%" align="center"><b>Ýþ Tel</b></td>
    <td width="10%" align="center"><b>Emlakçý detay gör</b></td>
  </tr>
<?
echo "<font color=\"#FF0000\"><b>$_GET[mesaj]</b></font><br><br>";

$i = 0;

$basla=intval($_GET[basla]);

// ----- Emlak ilaný olan emlakçýlar
$qx = mysql_query("SELECT * FROM emlakci, il, ilce WHERE emlakci.il_no=il.il_no AND emlakci.ilce_no=ilce.ilce_no ORDER BY il_adi LIMIT $basla, 10");

while($qq = mysql_fetch_array($qx))
{

$emlakci_no = $qq['emlakci_no'];

if (empty($emlakci_no)) { $emlakci_no = "&nbsp;"; }

$isim = $qq['isim'];

if (empty($isim)) { $isim = "&nbsp;"; }

$adi = $qq['adi'];

if (empty($adi)) { $adi = "&nbsp;"; }

$soyadi = $qq['soyadi'];

if (empty($soyadi)) { $soyadi = "&nbsp;"; }

$adres_satiri1 = $qq['adres_satiri1'];

if (empty($adres_satiri1)) { $adres_satiri1 = "&nbsp;"; }

$adres_satiri2 = $qq['adres_satiri2'];

if (empty($adres_satiri2)) { $adres_satiri2 = "&nbsp;"; }

$il_no = $qq['il_no'];

if (empty($il_no)) { $il_no = "&nbsp;"; }

$ilce_adi = $qq['ilce_adi'];
$il_adi = $qq['il_adi'];

if (empty($ilce_adi)) { $ilce_adi = "&nbsp;"; }

$bolge = $qq['bolge'];
if (empty($bolge)) { $bolge = "&nbsp;"; }

$is_tel = $qq['is_tel'];

if (empty($is_tel)) { $is_tel = "&nbsp;"; }

$cep_tel = $qq['cep_tel'];
$il_adi=strtr($il_adi,"üðiþçöÜÐÝÞÇÖ","ugiscoUGISCO");
if (empty($cep_tel)) { $cep_tel = "&nbsp;"; }
$temp=preg_split("/[\s,()-]+/", $isim);
$isim_ilk=strtr($temp[0],"üðiþçöÜÐÝÞÇÖ","ugiscoUGISCO");
echo "
  <tr>
    <td width=\"10%\">$isim</td>
    <td width=\"15%\">$adres_satiri1 $adres_satiri2</td>
    <td width=\"20%\">$ilce_adi $il_adi</td>
		<td width=\"5%\">$bolge</td>
    <td width=\"10%\">$is_tel</td>
    <td width=\"10%\">$cep_tel</td>
    <td width=\"10%\"><a href=\"emlakci_dizinleri/$il_adi" . "emlak/$isim_ilk" . "emlak/emlak_ilan_$isim_ilk" . "EMLAK.html\">Emlakçý Detay Gör</a></td>
  </tr>\n
";
/* ------- DOSYAYA YAZ ----------
$ildir="emlakci_dizinleri/" . $il_adi . "emlak";
$emlakcidir=$ildir . "/" . $isim_ilk . "emlak";
if (!(is_dir($ildir))) {
  mkdir($ildir); 
	echo "$ildir";
  }
if (!(is_dir($emlakcidir))) {
  mkdir($emlakcidir);
	echo "$emlakcidir"; 
  }
echo "yazýldý ";
$emlaklar="<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\">";
$qqx = mysql_query("SELECT * FROM emlak, il, ilce WHERE emlak.emlakci_no='$emlakci_no' AND emlak.il_no=il.il_no AND emlak.ilce_no=ilce.ilce_no AND aktivite='Aktif' ORDER BY eklenme_zamani DESC LIMIT 0, 5");
while($qqq = mysql_fetch_array($qqx))
{
$emlaklar.="  <a href=\"http://www.evbulur.com/emlak.php?emlak_no=" . $qqq['emlak_no'] . "\"><tr style=\"cursor: hand\" onmouseover=\"this.style.background='#ccffcc';\" onmouseout=\"this.style.background='';\">
    <td width=\"10%\">". $qqq['emlak_no'] . "</td>
    <td width=\"15%\">". $qqq['il_adi'] . "</td>
    <td width=\"20%\">". $qqq['bolge'] . "</td>
		<td width=\"5%\">". $qqq['islem_tipi'] . "</td>
    <td width=\"10%\">". $qqq['tip_ozelligi'] . "</td>
    <td width=\"10%\">". $qqq['fiyat'] . " " . $qqq['fiyat_birimi'] . "</td>
  </tr></a>\n";
}
$emlaklar.="</table>";
$cont=fopen($emlakcidir . "/emlak_ilan_" . $isim_ilk . "EMLAK.html",'w');
fwrite($cont,$isim . "-" . $il_adi . " " . $bolge . " Tel:" . $is_tel ."<br /><br />"  ,200);
fwrite($cont,$isim . " TARAFINDAN ÝLAN EDÝLMÝÞ SON 5 EMLAK:<br />"  ,200);
fwrite($cont,$emlaklar );
fclose($cont);	
//include $emlakcidir . "/emlak_ilan_" . $isim_ilk . "EMLAK.html";

---------------DOSYAYA YAZMA Bitti--------*/ 
$i++;
}

mysql_close();
$basla+=10;
?>
</table>
<br /><a href="emlakci_dizinlerini_goster.php?basla=<?= $basla ?>">Ýleri >>> </a>

</body>

</html>