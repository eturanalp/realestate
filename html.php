<?
session_start();
include "mysql.inc.php";
?>
<html>

<head>
<meta content=tr http-equiv=Content-Language>
<meta content="text/html; charset=ISO-8859-9" http-equiv=Content-Type>
<title>Evbulur - emlak, emlak Ankara, emlak Konya, emlakçı Ankara, emlakçı konya, satılık emlak, emlak Antalya, emlak izmir, emlak Bursa, emlak ilan, gayrimenkul, satılık daire.</title>
<meta name="Keywords" content="emlak, emlak Ankara, emlak Konya, emlakçı Ankara, emlakçı konya, satılık emlak, emlak Antalya, emlak izmir, emlak Bursa, emlak ilan, gayrimenkul, satılık daire, konut, ilan ara, real estate turkey, realtor turkey">
<meta name="Description" content="Emlak ilan servisi Ankara izmir Konya Bursa Antalya Antep Adana Kayseri emlakçılarından satılık ev daire konut gayrimenkul emlak ilanları listelenir. Real Estate Listings in Turkish capital Ankara">
<meta name="Author" content="EvBulur.com">
<meta name="Identifier-URL" content="http://www.evbulur.com">
<meta http-equiv="Copyright" content="Copyright © 2005 EvBulur.com">
<meta name="robots" content="ALL">
<meta name="revisit-after" content="7 days">
<META http-equiv="Classification" content="Emlak">
<META NAME="VW96.objecttype" CONTENT="emlak, emlak Ankara, emlak Konya, emlakçı Ankara, emlakçı konya, emlak Antalya, emlak izmir, emlak Bursa, emlak ilan, gayrimenkul, satılık daire, konut, ilan ara, real estate turkey, realtor turkey">        
<META NAME="DC.Title" CONTENT="Evbulur - emlak, emlak Ankara, emlak Konya, emlakçı Ankara, emlakçı konya, satılık emlak, emlak Antalya, emlak izmir, emlak Bursa, emlak ilan, gayrimenkul, satılık daire.">
<META NAME="DC.Subject" CONTENT="emlak, emlak Ankara, emlak Konya, emlakçı Ankara, emlakçı konya, satılık emlak, emlak Antalya, emlak izmir, emlak Bursa, emlak ilan, gayrimenkul, satılık daire, konut, ilan ara, real estate turkey, realtor turkey">
<META NAME="DC.Description" CONTENT="Emlak ilan servisi Ankara izmir Konya Bursa Antalya Antep Adana Kayseri emlakçılarından satılık ev daire konut gayrimenkul emlak ilanları listelenir. Real Estate Listings in Turkish capital Ankara">
<META NAME="DC.Coverage.PlaceName" CONTENT="Global">
<!--
emlak, emlak Ankara, emlak Konya, emlakçı Ankara, emlakçı konya, emlak Antalya, emlak izmir, emlak Bursa, emlak ilan, gayrimenkul, satılık daire, konut, ilan ara, real estate turkey, realtor turkey
-->
<link rel="stylesheet" href="images/style.css" type="text/css">
<script language="javascript" src="js/mouseover.js"></script>
<script language="javascript">
function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function clearform(Form){
document.hizliarama.bolge.value="";
document.hizliarama.m2.value="";
document.hizliarama.fiyat.value="";
}
</script>
<script src="js/csscript.js"></script>
<script language="javascript">
function mOvr(src) { if (!src.contains(event.fromElement)) {src.bgColor = '#FF9900';src.style.Color='#000000';}}
function mOut(src) { if (!src.contains(event.toElement)) {src.bgColor = '#0066CC';src.style.Color='#FFFFFF';}}
</script>
<script language="javascript">
var url;

function OpenURL(url)
{
window.location.href = url;
}
</script>
</head>

<body onLoad="MM_preloadImages('images/logo-b.gif')">

<?
session_start();
?>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1%" rowspan="2"><a href="index.php?sablon=1"><img src="images/logo.gif" border="0" width="200" height="130" alt="Emlak Ankara Konya ilanları"></a></td>
    <td width="99%" align="right" valign="top"><img src="images/evbulur-468x60.gif" border="1" alt="EvBulur.com-Ankara Emlak Konya emlak ilanları" width="468" height="60" style="border-color: #CCCCFF"></td>
  </tr>
  <tr>
    <td width="99%" valign="bottom">
      <table border="0" width="100%" cellspacing="0" cellpadding="0" valign="bottom">
        <tr>
          <td width="4%" height="25"></td>
<?
$sablon = $_GET[sablon];

if ($sablon == "1") {
echo "
          <td width=\"8%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"FF9900\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Satılık Emlak</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}

else {
echo "
          <td width=\"8%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#0066CC\" onMouseOver=\"mOvr(this);\" onMouseOut=\"mOut(this);\" onclick=\"OpenURL('index.php?sablon=1')\"  style=\"cursor: hand\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Satılık Emlak</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}
?>
          <td width="3%" height="25"></td>
<?
if ($sablon == "2") {
echo "
          <td width=\"12%\" height=\"25\ valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"FF9900\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Emlakçı Kütüphanesi</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}

else {
echo "
          <td width=\"12%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#0066CC\" onMouseOver=\"mOvr(this);\" onMouseOut=\"mOut(this);\" onclick=\"OpenURL('mevzuat.php?sablon=2')\"  style=\"cursor: hand\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Emlakçı Kütüphanesi</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}
?>
          <td width="3%" height="25"></td>
<?
if ($sablon == "3") {
echo "
          <td width=\"12%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"FF9900\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Emlak Ara</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}

else {
$qstr=$_SERVER['QUERY_STRING'];
echo "
          <td width=\"12%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#0066CC\" onMouseOver=\"mOvr(this);\" onMouseOut=\"mOut(this);\"  onclick=\"OpenURL('emlakara.php?$qstr&sablon=3&talep=H')\" style=\"cursor: hand\"><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\" height=\"25\" align=\"center\"><font  color=\"#FFFFFF\"><b>Emlak Ara</b></font></td><td width=\"1%\" height=\"25\" valign=\"top\"><img  src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}
?>
          <td width="3%" height="25"></td>
<?
if ($sablon == "4") {
echo "
          <td width=\"12%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"FF9900\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Talep Bırak</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}

else {
$qstr=$_SERVER['QUERY_STRING'];
echo "
          <td width=\"12%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#0066CC\" onMouseOver=\"mOvr(this);\" onMouseOut=\"mOut(this);\"  onclick=\"OpenURL('emlakara.php?$qstr&sablon=4&talep=E')\" style=\"cursor: hand\"><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\" height=\"25\" align=\"center\"><font  color=\"#FFFFFF\"><b>Talep Bırak</b></font></td><td width=\"1%\" height=\"25\" valign=\"top\"><img  src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}
?>
          <td width="3%" height="25"></td>
<?
if ($sablon == "5") {
echo "
          <td width=\"16%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"FF9900\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Bize Ulaşın, Ankara Emlak</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}

else {
echo "
          <td width=\"16%\" height=\"25\" valign=\"bottom\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#0066CC\" onMouseOver=\"mOvr(this);\" onMouseOut=\"mOut(this);\" onclick=\"OpenURL('bizeulasin.php?sablon=5')\"  style=\"cursor: hand\"><td width=\"1%\" height=\"25\" valign=\"top\"><img src=\"images/solust.gif\"></td><td width=\"98%\"  height=\"25\" align=\"center\"><font color=\"#FFFFFF\"><b>Bize Ulaşın, Ankara Emlak</b></font></td><td width=\"1%\" height=\"25\"  valign=\"top\"><img src=\"images/sagust.gif\"></td></tr></table></td>\n
";
}
?>
          <td width="3%" height="25"></td>
          <td width="22%" height="25" align="right">
<form method="get" name="arama" action="emlak.php">
<font class="kucuk"><b>Emlak No:</b></font>
<input size=7 name="emlak_no" value="<?=$_GET['emlak_no']?>" style="border: 1px solid #000000">
<input type="submit" value="Bul" style="background-color: #000000; font-family: Verdana; font-size: 11px; font-weight: bold; color: #FFFFFF">
          </td>
</form>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2">
      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td width="100%" bgcolor="#FF9900" align="right" style="border-bottom-style: solid; border-bottom-color: #CCCCCC; border-bottom-width: thin"><font class="kucuk" color="#FFFFFF"><b><?
function tarih($zaman) {
$gunler = array(
"Pazar",
"Pazartesi",
"Salı",
"Çarşamba",
"Perşembe",
"Cuma",
"Cumartesi"
);

$aylar = array(
NULL,
"Ocak",
"Şubat",
"Mart",
"Nisan",
"Mayıs",
"Haziran",
"Temmuz",
"Ağustos",
"Eylül",
"Ekim",
"Kasım",
"Aralık"
);

$tarih = date("j",$zaman)." ".$aylar[date("n",$zaman)]." ".date("Y",$zaman).", ".$gunler[date("w",$zaman)];
return $tarih;
}

$zaman = time();
$tarih = tarih($zaman);

echo $tarih;
?></b></font></td>
        </tr>
        <tr>
          <td width="100%" height="10"></td>
        </tr>
        <tr>
          <td width="100%" bgcolor="#C8DBDB">
            <table border="0" width="100%" cellspacing="10" cellpadding="0">
              <tr>
                <td width="20%" align="center" valign="top">
                  <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100%" bgcolor="#669999">
                        <table border="0" width="100%" cellpadding="3">
                          <tr>
                            <td width="100%" bgcolor="#669999" align="center"><b><font class="orta" color="#FFFFFF">ÜYE EMLAKÇI GİRİŞİ</font></b></td>
                          </tr>
                          <tr>
                            <td width="100%" bgcolor="#FFFFFF">
                              <table border="0" width="100%" cellspacing="0" cellpadding="3">
                              <form method="post" action="giris.php">
                                <tr>
                                  <td width="35%" align="right"><font class="orta"><b>Kullanıcı:</b></font></td>
                                  <td width="65%">
                                  <input type="text" name="kullanici_ismi" style="border: 1px solid #000000; width: 80px">
                                  </td>
                                </tr>
                                <tr>
                                  <td width="35%" align="right"><font class="orta"><b>Şifre:</b></font></td>
                                  <td width="65%">
                                  <input type="password" name="kullanici_sif" style="border: 1px solid #000000; width: 80px">
                                  <input type="submit" value="Giriş" style="background-color: #669999; font-family: Verdana; font-size: 11px; font-weight: bold; color: #FFFFFF">
                                  </td>
                                </tr>
                                <tr>
                                  <td width="100%" colspan="2" align="center" valign="bottom"><font class="orta"><a href="uyelik_basvuru_formu.php">Üyelik başvurusunda bulunmak için <b>tıklayınız.</b></a></font></td>
                                </tr>
                              </form>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100%" bgcolor="#669999">
                        <table border="0" width="100%" cellpadding="3">
                          <tr>
                            <td width="100%" bgcolor="#669999" align="center"><b><font class="orta" color="#FFFFFF">HIZLI EMLAK ARAMA</font></b></td>
                          </tr>
                          <tr>
                            <td width="100%" bgcolor="#FFFFFF">
                              <table border="0" width="100%" cellspacing="0" cellpadding="3">
                                <tr>
                                  <form method="get" name="hizliarama" id="hizliarama" action="hara.php">
<input type="hidden" name="__EVENT" value="" />
<input type="hidden" name="__ARGUMENT" value="" />	
<input type="hidden" name="kaynak" value="html" />																
                                  <td width="20%" bgcolor="#CCCCCC" colspan="2"><font class="orta"><b>Durum:</b></font></td>
                                  <td width="80%" bgcolor="#CCCCCC" colspan="2">
                                  <select name="islem">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM islem_tipi");

while($qq = mysql_fetch_array($qx))
{
 $islem_tipi = $qq['islem_tipi'];
 if ($_GET['islem']==$islem_tipi)
   echo "<option value=\"$islem_tipi\" SELECTED >$islem_tipi</option>\n";
 else  
	 echo "<option value=\"$islem_tipi\">$islem_tipi</option>\n";
$i++;
}
?>
                                  </select>
                                  </td>
                                </tr>
<tr>
                                  <td width="20%" bgcolor="#EEEEEE" colspan="2"><font class="orta"><b>Emlak Tipi:</b></font></td>
                                  <td width="80%" bgcolor="#EEEEEE" colspan="2">
<select name="tip_ozelligi" id="tip_ozelligi">		
<option <? if (empty($_GET['tip_ozelligi'])) echo "selected=\"selected\""; ?> value="Apartman Dairesi">Apartman Dairesi</option>
<option <? if ($_GET['tip_ozelligi']=="Dublex") echo "selected=\"selected\""; ?> value="Dublex">Dublex</option>
<option <? if ($_GET['tip_ozelligi']=="Villa") echo "selected=\"selected\""; ?> value="Villa">Villa</option>
<option <? if ($_GET['tip_ozelligi']=="Triplex") echo "selected=\"selected\""; ?> value="Triplex">Triplex</option>
<option <? if ($_GET['tip_ozelligi']=="Müstakil Ev") echo "selected=\"selected\""; ?> value="Müstakil Ev">Müstakil Ev</option>
<option <? if ($_GET['tip_ozelligi']=="Tüm Bina") echo "selected=\"selected\""; ?> value="Tüm Bina">Tüm Bina</option>
<option <? if ($_GET['tip_ozelligi']=="Depo") echo "selected=\"selected\""; ?> value="Depo">Depo</option>
<option <? if ($_GET['tip_ozelligi']=="Mağaza/Dükkan") echo "selected=\"selected\""; ?> value="Mağaza/Dükkan">Mağaza/Dükkan</option>
<option <? if ($_GET['tip_ozelligi']=="Ticari Bina") echo "selected=\"selected\""; ?> value="Ticari Bina">Ticari Bina</option>
<option <? if ($_GET['tip_ozelligi']=="Ofis") echo "selected=\"selected\""; ?> value="Ofis">Ofis</option>
<option <? if ($_GET['tip_ozelligi']=="Muhtelif Arsa") echo "selected=\"selected\""; ?> value="Muhtelif Arsa">Muhtelif Arsa</option>
<option <? if ($_GET['tip_ozelligi']=="Bahçe") echo "selected=\"selected\""; ?> value="Bahçe">Bahçe</option>
</select> </td> </tr>																															
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" colspan="2"><font class="orta"><b>İl:</b></font></td>
                                  <td width="80%" bgcolor="#CCCCCC" colspan="2">
<script language="javascript" type="text/javascript">
<!--
	function __doPostBackHara(eventTarget, eventArgument) {
		var theform;
		if (window.navigator.appName.toLowerCase().indexOf("microsoft") > -1) {
			theform = document.hizliarama;
		}
		else {
			theform = document.forms["hizliarama"];
		}
		theform.__EVENT.value = eventTarget;
		theform.__ARGUMENT.value = eventArgument;
		theform.submit();		
	}
// -->
</script>
<select name="il_no" onchange="__doPostBackHara('il_no:degisti','html.php')" language="javascript" id="il_no">
<?

$il_no=0;
if (intval($_GET['il_no'])>0) $il_no=intval($_GET['il_no']);
else if (intval($_POST['il_no'])>0) $il_no=intval($_POST['il_no']);
else if (intval($_SESSION['s_il_no'])>0) $il_no=$_SESSION['s_il_no'];
else if ($emlakci_il_no>0) $il_no=$emlakci_il_no;
else $il_no=6;

$i = 0;
$qx = mysql_query("SELECT * FROM il ORDER BY il_no");

while($qq = mysql_fetch_array($qx))
{
 $il_no_temp = $qq['il_no'];
 $il_adi = $qq['il_adi'];
 $il_kodu = $qq['il_kodu'];

echo "<option ";
if (($il_no == $il_no_temp)) {echo "selected=\"selected\" "; }
//if (($_GET['il_no'] == $il_no_temp)) {echo "selected=\"selected\" "; $il_no=$il_no_temp;}
//else if (($_POST['il_no'] == $il_no_temp)) {echo "selected=\"selected\" ";$il_no=$il_no_temp;}
//else if (($_SESSION['s_il_no'] == $il_no_temp)) {echo "selected=\"selected\" ";$il_no=$il_no_temp;}
//else if (($il_no_temp == $emlakci_il_no)) {echo "selected=\"selected\" ";$il_no=$il_no_temp;}
//else if (($il_no_temp == 1)) {echo "selected=\"selected\" "; $il_no=$il_no_temp; }// KONYA

echo "value=\"$il_no_temp\">$il_kodu - $il_adi</option>\n";

$i++;
}
?>
                                 </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" colspan="2"><font class="orta"><b>İlçe:</b></font></td>
                                  <td width="80%" bgcolor="#EEEEEE" colspan="2">
                                   <select name="ilce_no">
 <?
$i = 0;
/*
if ($_POST['il_no'] == "") 
   if (!empty($_GET['il_no'])) 
	   $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $_GET['il_no'] . " ORDER BY ilce_adi");
   else if (empty($_SESSION['s_il_no']))
     $qy = mysql_query("SELECT * FROM ilce ORDER BY ilce_adi");
   else
     $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $_SESSION['s_il_no'] . " ORDER BY ilce_adi");
else 
  $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $_POST['il_no'] . " ORDER BY ilce_adi");
*/
$qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $il_no . " ORDER BY ilce_adi");

while($qt = mysql_fetch_array($qy))
 {
  $ilce_no_temp = $qt['ilce_no'];
  $ilce_adi = $qt['ilce_adi'];

  echo "<option ";
  if (($_GET['ilce_no'] == $ilce_no_temp)) echo "selected=\"selected\" ";
	else if (($ilce_no_temp == $emlakci_ilce_no)) echo "selected=\"selected\" ";
 
  echo "value=\"$ilce_no_temp\">$ilce_adi</option>\n";

  //echo "<option value=\"$ilce_no_temp\">$ilce_adi</option>\n";

  $i++;
} // end of while loop

?>
</select>

                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" colspan="2"><font class="orta"><b>Mahalle:</b></font></td>
                                  <td width="80%" bgcolor="#CCCCCC" colspan="2">
                                  <input type="text" name="bolge" id="bolge" value="<?=$_GET['bolge'] ?>">
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" colspan="2"><font class="orta"><b>Alan:</b></font></td>
                                  <td width="80%" bgcolor="#EEEEEE" colspan="2">
                                  <input type="text" name="m2" id="m2" value="<?=(empty($_GET['m2'])?"":$_GET['m2']) ?>" size="10" style="text-align:right;"> <font class="orta">m<sup>2</font></sup>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" colspan="2"><font class="orta"><b>Fiyat:</b></font></td>
                                  <td width="80%" bgcolor="#CCCCCC" colspan="2">
                                  <input type="text" name="fiyat" id="fiyat" value="<?=(empty($_GET['fiyat'])?"":$_GET['fiyat']) ?>" size="12" id="fiyat" style="text-align:right;" onkeyup="ucle(event.keyCode,document.hizliarama.fiyat,'Fiyat alanına sadece rakam yazınız.',0)"><select name="fiyat_birimi">
                                  <option value="YTL" <? if ($_GET['fiyat_birimi']=="YTL") echo " SELECTED " ?> >YTL</option>
                                  <option value="EURO" <? if ($_GET['fiyat_birimi']=="EURO") echo " SELECTED " ?> >EURO</option>
                                  <option value="USD" <? if ($_GET['fiyat_birimi']=="USD") echo " SELECTED " ?> >USD</option>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" colspan="2"><input type="submit" value="ARA"></td>
                                  <td width="80%" bgcolor="#EEEEEE" colspan="2" align="right">
                                  <input type="reset" value="Hatırla" title="Son yapılan arama kriterlerini getir" alt="Son yapılan arama kriterlerini getir">
                                  <input type="button" onclick="clearform(this)" value="Temizle" alt="Formu Temizle"></td>
                                  </form>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%">[ <a href="emlakara.php?arama_help=Yes">Arama Yardımı</a> ]&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100%" bgcolor="#669999"> 
                        <table border="0" width="100%" cellpadding="3">
                          <tr>
                            <td width="100%" bgcolor="#669999" align="center"><b><font class="orta" color="#FFFFFF">SON EMLAK HABERLERİ</font></b></td>
                          </tr>
                          <tr>
                            <td width="100%" bgcolor="#FFFFFF">
                              <table border="0" width="100%" cellspacing="0" cellpadding="3">
                                <tr>
                                  <td width="100%">
                      <font color="#669999"><b>»</b></font> <font class="orta"><a href="haber.php?haberno=32">TOKİ borç indirimi yapıyor</a></font><br>
                      <font color="#669999"><b>»</b></font> <font class="orta"><a href="haber.php?haberno=30">Maliye, Birden Fazla Konutu Olanların Kira Gelirini İnceliyor</a></font><br>
                      <font color="#669999"><b>»</b></font> <font class="orta"><a href="haber.php?haberno=29">Alanya'da Apartmanlar Yarışacak</a></font><br>
                      <font color="#669999"><b>»</b></font> <font class="orta"><a href="haber.php?haberno=27">Didim'in Rekortmeni İngiliz Asıllı Emlakçı</a></font><br>
                      <br>
                      <a href="haber.php"><font class="kucuk" color="#666666">Tüm Haberler »»</font></a></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100%">
<?
require "../anket/textfile/include/config.inc.php";
require "../anket/textfile/include/class_poll.php";
$php_poll = new poll();
echo $php_poll->poll_process(newest);
?>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100%" bgcolor="#669999">
                        <table border="0" width="100%" cellpadding="3">
                          <tr>
                            <td width="100%" bgcolor="#669999" align="center"><b><font class="orta" color="#FFFFFF">EMLAK KISAYOLLARI</font></b></td>
                          </tr>
                          <tr>
                            <td width="100%" bgcolor="#FFFFFF">
                              <table border="0" width="100%" cellspacing="0" cellpadding="3">
                                <tr>
                                  <td width="100%">
<?
$geldigi=stripslashes($_GET['geldigi']);
if (empty($geldigi)) { 
   include 'emlak_kisayol.html';
	 }
else 
   {echo "Son Seçilen: <br />$geldigi";} 
?>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100%">
<a href="http://www.linkcenneti.com/gel.php?id=8364" target="_blank"><img alt="Linkcenneti.com" src="http://www.linkcenneti.com/banner88x33.gif" width="88" height="33" border="0"></a>
<script language="javascript">var isjs=0, site=145045, icon=1;</script>
<script language="javascript" <img src="http://zirve100.com/counterjsv3.js"></script>
                      </td>
                    </tr>
<? 
//if ($il_no==42) echo "<tr>			<td width=\"100%\">							
//  <a href=\"http://www.konya.com\" target=\"_blank\">
//  <img border=\"0\" src=\"http://www.konya.com/insite/100x45.gif\" alt=\"Konya Sehir Rehberi ve Haber Portali  >  Konya.com\" width=\"100\" height=\"45\"></a>
//	</td></tr>";										
 ?>
                    <tr><td width="100%">
 <script language="javascript" src="http://w1.iyi.net/a.php?siteid=9174"></script>
                      </td>
                    </tr> 
                  </table>
                </td>
                <td width="80%" valign="top">
                  <table border="0" width="100%" cellspacing="0" cellpadding="15">
                    <tr>
                      <td width="100%" bgcolor="#FFFFFF">
<?  
if ($_GET['ilk']=="E")   { 
  include "ilk.php";  
	include "taban.php";
	}
?>
