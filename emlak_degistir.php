<?
include "kontrol.inc.php";
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";

$get_emlak_no = $_GET['emlak_no'];
if (empty($get_emlak_no))
  $emlak_no=intval($_POST['emlak_no']);
else 
  $emlak_no=intval($get_emlak_no);

$qx = mysql_query("SELECT * FROM emlak WHERE emlak_no='$emlak_no' ");
$qq = mysql_fetch_array($qx);
$bolge = $qq['bolge'];
$adres = $qq['adres'];
$fiyat = $qq['fiyat'];
$brutm2 = $qq['brutm2'];
$netm2 = $qq['netm2'];
$binadaki_kat_sayisi = $qq['binadaki_kat_sayisi'];
$bulundugu_kat = $qq['bulundugu_kat'];
$oda_sayisi = $qq['oda_sayisi'];
$salon_sayisi = $qq['salon_sayisi'];
$balkon_sayisi = $qq['balkon_sayisi'];
$banyo_tuvalet_sayisi = $qq['banyo_tuvalet_sayisi'];
$cephe = $qq['cephe'];
$aciklama = $qq['aciklama'];
$ahsap = $qq['ahsap'];
$ahsap_dograma = $qq['ahsap_dograma'];
$asansor = $qq['asansor'];
$bahce = $qq['bahce'];
$betonarme = $qq['betonarme'];
$celik_kapi = $qq['celik_kapi'];
$denize_yakin = $qq['denize_yakin'];
$deniz_manzarali = $qq['deniz_manzarali'];
$dogalgazli = $qq['dogalgazli'];
$doga_icinde = $qq['doga_icinde'];
$doga_manzarali = $qq['doga_manzarali'];
$dusakabin = $qq['dusakabin'];
$esyali = $qq['esyali'];
$garaj_otopark = $qq['garaj_otopark'];
$guvenlik = $qq['guvenlik'];
$gol_manzarali = $qq['gol_manzarali'];
$jakuzi = $qq['jakuzi'];
$kat_mulkiyeti = $qq['kat_mulkiyeti'];
$klima = $qq['klima'];
$konak = $qq['konak'];
$kombi = $qq['kombi'];
$merkezi_havalandirma = $qq['merkezi_havalandirma'];
$merkezi_isitma = $qq['merkezi_isitma'];
$metroya_yakin = $qq['metroya_yakin'];
$mobilyali = $qq['mobilyali'];
$otoyola_yakin = $qq['otoyola_yakin'];
$panjur = $qq['panjur'];
$PVC_dograma = $qq['PVC_dograma'];
$sauna = $qq['sauna'];
$sehir_manzarali = $qq['sehir_manzarali'];
$somine = $qq['somine'];
$toplu_ulasima_yakin = $qq['toplu_ulasima_yakin'];
$tramvaya_yakin = $qq['tramvaya_yakin'];
$yali = $qq['yali'];
$yali_dairesi = $qq['yali_dairesi'];
$yangin_merdiveni = $qq['yangin_merdiveni'];
$yazlik = $qq['yazlik'];
$selected_aktivite=$qq['aktivite'];
$emlak_isitma_sistemi=$qq['isitma_sistemi'];
$islem=$qq['islem_tipi'];
$fiyat_birimi=$qq['fiyat_birimi'];
$yapi_durumu=$qq['yapi_durumu'];
$islak_zeminler=$qq['islak_zeminler'];
$emlaktip1=$qq['tip1'];
$emlaktip2=$qq['tip2'];
$emlak_tip_ozelligi=$qq['tip_ozelligi'];
$adres=$qq['adres'];
$aciklama=$qq['aciklama'];
$e_il_no=$qq['il_no'];
$e_ilce_no=$qq['ilce_no'];
?>
<b><font color="#FF0000">EMLAK DEÐÝÞTÝRME FORMU:</font></b>
<form method="post" action="gonder.php" id="form1" name="form1" >
<input type="hidden" name="__EVENT" value="" />
<input type="hidden" name="__ARGUMENT" value="" />
<input type="hidden" name="form_tipi" value="emlakdegistir">
<input type="hidden" name="emlak_no" value="<? echo $emlak_no; ?>">
<b><?=$_SESSION['s_emlakci']?> aracýlýðýyla 
<select name="islem_tipi">
<?

$i = 0;
$qe = mysql_query("SELECT * FROM islem_tipi");
while($qf = mysql_fetch_array($qe)){
 $islem_tipi = $qf['islem_tipi'];
 if ($islem_tipi == $islem) {
    $secim_kontrol = " selected";
    }
  else {
    $secim_kontrol = ""; 
    }
  echo "<option$secim_kontrol value=\"$islem_tipi\">$islem_tipi</option>\n";
  $i++;
  }
?>
</select> Emlak No: <? echo "$emlak_no" ?></b><br><br>
<b>Ýl:</b>
<script language="javascript" type="text/javascript">
<!--
	function __doPostBack(eventTarget, eventArgument) {
		var theform;
		if (window.navigator.appName.toLowerCase().indexOf("microsoft") > -1) {
			theform = document.form1;
		}
		else {
			theform = document.forms["form1"];
		}
		theform.__EVENT.value = eventTarget;
		theform.__ARGUMENT.value = eventArgument;
		theform.submit();
	}
// -->
</script>
<select name="il_no" onchange="__doPostBack('il_no:degisti','emlak_degistir')" language="javascript" id="il_no">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM il ORDER BY il_no");

while($qq = mysql_fetch_array($qx))
{
 $il_no = $qq['il_no'];
 $il_adi = $qq['il_adi'];
 $il_kodu = $qq['il_kodu'];

echo "<option ";
if ($_POST['il_no'] == ""){
  if ($e_il_no == $il_no) echo "selected=\"selected\" ";
	}
else {
  if (intval($_POST['il_no']) == $il_no) echo "selected=\"selected\" ";
	}	
echo "value=\"$il_no\">$il_kodu - $il_adi</option>\n";

$i++;
}
?>
</select>
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Ýlçe:</b>
<select name="ilce_no">
 <?
$i = 0;

if ($_POST['il_no'] == "")
     $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $e_il_no . " ORDER BY ilce_adi"); 
//   if ($_SESSION['s_il_no'] == 0)
//     $qy = mysql_query("SELECT * FROM ilce ORDER BY ilce_adi");
//   else
//     $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $_SESSION['s_il_no'] . " ORDER BY ilce_adi");
else 
  $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . intval($_POST['il_no']) . " ORDER BY ilce_adi");

//$qy = mysql_query("SELECT * FROM ilce ORDER BY ilce_no");

while($qt = mysql_fetch_array($qy))
 {
  $ilce_no = $qt['ilce_no'];
  $ilce_adi = $qt['ilce_adi'];

  echo "<option ";
  if (($e_ilce_no == $ilce_no)) echo "selected=\"selected\" ";
  echo "value=\"$ilce_no\">$ilce_adi</option>\n";

  //echo "<option value=\"$ilce_no\">$ilce_adi</option>\n";

  $i++;
} // end of while loop
?>
</select>
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Mahalle/Bölge:</b> <input type="text" name="bolge" value="<?=$bolge?>"><br><br>
<b>Fiyatý:</b> <input type="text" name="fiyat" value="<? echo $fiyat; ?>" id="fiyat" style="text-align:right;" onkeyup="ucle(event.keyCode,document.form1.fiyat,'Fiyat alanýna rakamla baþlayýnýz',0)">
<select name="fiyat_birimi">
<?
//$selected_emlak_no = $emlak_no;
$i = 0;
$qe = mysql_query("SELECT * FROM para_birimi");
while($qf = mysql_fetch_array($qe)) {
  $para_birimi = $qf['para_birimi'];
  if ($para_birimi==$fiyat_birimi){
    $secim_kontrol = " selected";
    }
  else {
    $secim_kontrol = "";
    }
  echo "<option$secim_kontrol value=\"$para_birimi\">$para_birimi</option>\n";
  $i++;
  }
?>
</select><br><br>
<script src="js/csscript.js"></script>
<b>Brüt m<sup>2</sup>:</b> <input type="text" name="brutm2" value="<? echo $brutm2; ?>">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Net m<sup>2</sup>:</b> <input type="text" name="netm2" value="<? echo $netm2; ?>"><br><br>
<b>Yapý durumu:</b>
<select name="yapi_durumu">
<?
$i = 0;
$qe = mysql_query("SELECT * FROM yapi_durumu");
while($qf = mysql_fetch_array($qe)) {
$yd=$qf['yapi_durumu'];
if ($yd==$yapi_durumu) {
  $secim_kontrol = " selected";
  }
else  {
  $secim_kontrol = "";
  }
echo "<option$secim_kontrol value=\"$yd\">$yd</option>\n";
$i++;
}
?>
</select>  <span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Isýtma Sistemi:</b>
<select name="isitma_sistemi">
<?
$i = 0;
$qe = mysql_query("SELECT * FROM isitma_sistemi");
while($qf = mysql_fetch_array($qe)){
  $isitma_sistemi = $qf['isitma_sistemi'];
  if ($emlak_isitma_sistemi == $isitma_sistemi){
    $secim_kontrol = " selected";
    }
  else{
    $secim_kontrol = ""; 
    }
  echo "<option$secim_kontrol value=\"$isitma_sistemi\">$isitma_sistemi</option>\n";
  $i++;
  }
?>
</select><br><br>
<b>Gayrimenkul Tipi:</b> <select name="tip1" language="javascript" onchange="redirect(this.options.selectedIndex,document.form1.tip2.selectedIndex)">
<option <? if ($emlaktip1=="Yapý") echo " selected=\"selected\" "; ?>value="Yapý">Yapý</option>
<option <? if ($emlaktip1=="Arsa") echo " selected=\"selected\" "; ?>value="Arsa">Arsa</option>
</select>
<select name="tip2"  language="javascript"
 onchange="redirect(document.form1.tip1.selectedIndex,this.options.selectedIndex)" >
<option <? if ($emlaktip2=="Konut") echo " selected=\"selected\" "; ?>value="Konut">Konut</option>
<option <? if ($emlaktip2=="Ticari") echo " selected=\"selected\" "; ?>value="Ticari">Ticari</option>
</select>
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Tip Özelliði:</b>
<select name="tip_ozelligi">
<option>-----YAPI-KONUT-----</option>
<option>-----YAPI-TÝCARÝ-----</option>
<option>-----ARSA-KONUT-----</option>
<option>-----ARSA-TÝCARÝ-----</option>
</select><br><br>
<b>Oda Sayýsý:</b> <input type="text" name="oda_sayisi" value="<? echo $oda_sayisi; ?>" size="2">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Salon Sayýsý:</b> <input type="text" name="salon_sayisi" value="<? echo $salon_sayisi; ?>" size="2">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Banyo/Tuvalet Sayýsý: </b><input type="text" name="banyo_tuvalet_sayisi" value="<? echo $banyo_tuvalet_sayisi; ?>" size="2" >
<IMG SRC="images/button.help.gif" WIDTH=20 HEIGHT=20 border="0" ALT="Tek duþu yarým sayýnýz. Tek tuvaleti yarým sayýnýz. Mesela bir klozetli banyosu ve ayrý bir tuvaleti olan ev için 1.5 deðeri giriniz.">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Balkon Sayýsý:</b> <input type="text" name="balkon_sayisi" value="<? echo $balkon_sayisi; ?>" size="2"><br><br>
<b>Islak Zeminler:</b>
<select name="islak_zeminler">
<?
$i = 0;
$qe = mysql_query("SELECT * FROM islak_zeminler ORDER BY islak_zeminler DESC");
while($qf = mysql_fetch_array($qe)) {
  $iz=$qf['islak_zeminler'];
  if ($iz==$islak_zeminler) {
     $secim_kontrol = " selected";
     }
  else {
     $secim_kontrol = "";
     }
  echo "<option$secim_kontrol value=\"$iz\">$iz</option>\n";
  $i++;
  }
?>
</select><br><br>
<b>Binadaki Kat Sayýsý:</b> <input type="text" name="binadaki_kat_sayisi" value="<? echo $binadaki_kat_sayisi; ?>" size="2">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Bulunduðu Kat:</b> <input type="text" name="bulundugu_kat" value="<? echo $bulundugu_kat; ?>" size="2"><br><br>
<b>Cephe:</b>
<?
if ($cephe == "Doðu, -, -, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\"> Güney<br><br>"; }

if ($cephe == "-, Batý, -, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Güney\"> Batý&nbsp;&nbsp;&nbsp;\n"; }

if ($cephe == "-, -, Kuzey, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\"> Güney<br><br>"; }

if ($cephe == "-, -, -, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "Doðu, Batý, -, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\"> Güney<br><br>"; }

if ($cephe == "Doðu, -, Kuzey, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\"> Güney<br><br>"; }

if ($cephe == "Doðu, -, -, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "-, Batý, Kuzey, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\"> Güney<br><br>"; }

if ($cephe == "-, Batý, -, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "-, -, Kuzey, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "Doðu, -, Kuzey, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "-, Batý, Kuzey, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "Doðu, Batý, Kuzey, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\"> Güney<br><br>"; }

if ($cephe == "Doðu, Batý, -, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "Doðu, Batý, Kuzey, Güney") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\" checked> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\" checked> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\" checked> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\" checked> Güney<br><br>"; }

if ($cephe == "-, -, -, -") { echo "<input type=\"checkbox\" name=\"dogu\" value=\"Doðu\"> Doðu&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"bati\" value=\"Batý\"> Batý&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"kuzey\" value=\"Kuzey\"> Kuzey&nbsp;&nbsp;&nbsp;\n<input type=\"checkbox\" name=\"guney\" value=\"Güney\"> Güney<br><br>"; }
?>
<b>Açýklama:</b>
<textarea name="aciklama" value="<? echo $aciklama; ?>" rows="3" cols="20"><? echo $aciklama; ?></textarea>
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Adres:</b>
<textarea name="adres" value="1<? echo $adres; ?>" rows="3" cols="20"><? echo $adres; ?></textarea><br><br><br>
<b>DÝÐER ÖZELLÝKLER:</b>
<br>
<table border="0" width="65%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="32%" valign="top">
<?
if ($ahsap == "E") { echo "<input type=\"checkbox\" name=\"ahsap\" value=\"E\" checked> Ahþap<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"ahsap\" value=\"E\"> Ahþap<br>\n"; }

if ($ahsap_dograma == "E") { echo "<input type=\"checkbox\" name=\"ahsap_dograma\" value=\"E\" checked> Ahþap Doðrama<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"ahsap_dograma\" value=\"E\"> Ahþap Doðrama<br>\n"; }

if ($asansor == "E") { echo "<input type=\"checkbox\" name=\"asansor\" value=\"E\" checked> Asansör<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"asansor\" value=\"E\"> Asansör<br>\n"; }

if ($bahce == "E") { echo "<input type=\"checkbox\" name=\"bahce\" value=\"E\" checked> Bahçe<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"bahce\" value=\"E\"> Bahçe<br>\n"; }

if ($betonarme == "E") { echo "<input type=\"checkbox\" name=\"betonarme\" value=\"E\" checked> Betonarme<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"betonarme\" value=\"E\"> Betonarme<br>\n"; }

if ($celik_kapi == "E") { echo "<input type=\"checkbox\" name=\"celik_kapi\" value=\"E\" checked> Çelik Kapý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"celik_kapi\" value=\"E\"> Çelik Kapý<br>\n"; }

if ($deniz_manzarali == "E") { echo "<input type=\"checkbox\" name=\"deniz_manzarali\" value=\"E\" checked> Deniz Manzaralý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"deniz_manzarali\" value=\"E\"> Deniz Manzaralý<br>\n"; }

if ($denize_yakin == "E") { echo "<input type=\"checkbox\" name=\"denize_yakin\" value=\"E\" checked> Denize Yakýn<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"denize_yakin\" value=\"E\"> Denize Yakýn<br>\n"; }

if ($doga_icinde == "E") { echo "<input type=\"checkbox\" name=\"doga_icinde\" value=\"E\" checked> Doða Ýçinde<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"doga_icinde\" value=\"E\"> Doða Ýçinde<br>\n"; }

if ($doga_manzarali == "E") { echo "<input type=\"checkbox\" name=\"doga_manzarali\" value=\"E\" checked> Doða Manzaralý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"doga_manzarali\" value=\"E\"> Doða Manzaralý<br>\n"; }

if ($dogalgazli == "E") { echo "<input type=\"checkbox\" name=\"dogalgazli\" value=\"E\" checked> Doðalgazlý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"dogalgazli\" value=\"E\"> Doðalgazlý<br>\n"; }

if ($dusakabin == "E") { echo "<input type=\"checkbox\" name=\"dusakabin\" value=\"E\" checked> Duþakabin<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"dusakabin\" value=\"E\"> Duþakabin<br>\n"; }
?>
    <td width="36%" valign="top">
<?
if ($esyali == "E") { echo "<input type=\"checkbox\" name=\"esyali\" value=\"E\" checked> Eþyalý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"esyali\" value=\"E\"> Eþyalý<br>\n"; }

if ($garaj_otopark == "E") { echo "<input type=\"checkbox\" name=\"garaj_otopark\" value=\"E\" checked> Garaj/Otopark<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"garaj_otopark\" value=\"E\"> Garaj/Otopark<br>\n"; }

if ($gol_manzarali == "E") { echo "<input type=\"checkbox\" name=\"gol_manzarali\" value=\"E\" checked> Göl Manzaralý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"gol_manzarali\" value=\"E\"> Göl Manzaralý<br>\n"; }

if ($guvenlik == "E") { echo "<input type=\"checkbox\" name=\"guvenlik\" value=\"E\" checked> Güvenlik<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"guvenlik\" value=\"E\"> Güvenlik<br>\n"; }

if ($jakuzi == "E") { echo "<input type=\"checkbox\" name=\"jakuzi\" value=\"E\" checked> Jakuzi<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"jakuzi\" value=\"E\"> Jakuzi<br>\n"; }

if ($kat_mulkiyeti == "E") { echo "<input type=\"checkbox\" name=\"kat_mulkiyeti\" value=\"E\" checked> Kat Mülkiyeti<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"kat_mulkiyeti\" value=\"E\"> Kat Mülkiyeti<br>\n"; }

if ($klima == "E") { echo "<input type=\"checkbox\" name=\"klima\" value=\"E\" checked> Klima<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"klima\" value=\"E\"> Klima<br>\n"; }

if ($konak == "E") { echo "<input type=\"checkbox\" name=\"konak\" value=\"E\" checked> Konak<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"konak\" value=\"E\"> Konak<br>\n"; }

if ($merkezi_havalandirma == "E") { echo "<input type=\"checkbox\" name=\"merkezi_havalandirma\" value=\"E\" checked> Merkezi Havalandýrma<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"merkezi_havalandirma\" value=\"E\"> Merkezi Havalandýrma<br>\n"; }

if ($merkezi_isitma == "E") { echo "<input type=\"checkbox\" name=\"merkezi_isitma\" value=\"E\" checked> Merkezi Isýtma<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"merkezi_isitma\" value=\"E\"> Merkezi Isýtma<br>\n"; }

if ($metroya_yakin == "E") { echo "<input type=\"checkbox\" name=\"metroya_yakin\" value=\"E\" checked> Metroya Yakýn<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"metroya_yakin\" value=\"E\"> Metroya Yakýn<br>\n"; }

if ($mobilyali == "E") { echo "<input type=\"checkbox\" name=\"mobilyali\" value=\"E\" checked> Mobilyalý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"mobilyali\" value=\"E\"> Mobilyalý<br>\n"; }
?>
    <td width="32%" valign="top">
<?
if ($otoyola_yakin == "E") { echo "<input type=\"checkbox\" name=\"otoyola_yakin\" value=\"E\" checked> Otoyola Yakýn<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"otoyola_yakin\" value=\"E\"> Otoyola Yakýn<br>\n"; }

if ($panjur == "E") { echo "<input type=\"checkbox\" name=\"panjur\" value=\"E\" checked> Panjur<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"panjur\" value=\"E\"> Panjur<br>\n"; }

if ($PVC_dograma == "E") { echo "<input type=\"checkbox\" name=\"PVC_dograma\" value=\"E\" checked> PVC Doðrama<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"PVC_dograma\" value=\"E\"> PVC Doðrama<br>\n"; }

if ($sauna == "E") { echo "<input type=\"checkbox\" name=\"sauna\" value=\"E\" checked> Sauna<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"sauna\" value=\"E\"> Sauna<br>\n"; }

if ($sehir_manzarali == "E") { echo "<input type=\"checkbox\" name=\"sehir_manzarali\" value=\"E\" checked> Þehir Manzaralý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"sehir_manzarali\" value=\"E\"> Þehir Manzaralý<br>\n"; }

if ($somine == "E") { echo "<input type=\"checkbox\" name=\"somine\" value=\"E\" checked> Þömine<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"somine\" value=\"E\"> Þömine<br>\n"; }

if ($toplu_ulasima_yakin == "E") { echo "<input type=\"checkbox\" name=\"toplu_ulasima_yakin\" value=\"E\" checked> Toplu Ulaþýma Yakýn<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"toplu_ulasima_yakin\" value=\"E\"> Toplu Ulaþýma Yakýn<br>\n"; }

if ($tramvaya_yakin == "E") { echo "<input type=\"checkbox\" name=\"tramvaya_yakin\" value=\"E\" checked> Tramvaya Yakýn<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"tramvaya_yakin\" value=\"E\"> Tramvaya Yakýn<br>\n"; }

if ($yali == "E") { echo "<input type=\"checkbox\" name=\"yali\" value=\"E\" checked> Yalý<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"yali\" value=\"E\"> Yalý<br>\n"; }

if ($yali_dairesi == "E") { echo "<input type=\"checkbox\" name=\"yali_dairesi\" value=\"E\" checked> Yalý Dairesi<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"yali_dairesi\" value=\"E\"> Yalý Dairesi<br>\n"; }

if ($yangin_merdiveni == "E") { echo "<input type=\"checkbox\" name=\"yangin_merdiveni\" value=\"E\" checked> Yangýn Merdiveni<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"yangin_merdiveni\" value=\"E\"> Yangýn Merdiveni<br>\n"; }

if ($yazlik == "E") { echo "<input type=\"checkbox\" name=\"yazlik\" value=\"E\" checked> Yazlýk<br>\n"; }
else { echo "<input type=\"checkbox\" name=\"yazlik\" value=\"E\"> Yazlýk<br><br>\n"; }
?>
  </tr>
</table>
<br>
<b>Ýlan Aktifliði:
<? //echo "AA:$selected_aktivite"; ?> </b>
<select name="aktivite">
<?
$i = 0;

$qc = mysql_query("SELECT * FROM aktivite");
while($qd = mysql_fetch_array($qc))
{
 $aktivite = $qd['aktivite'];
if ($aktivite == $selected_aktivite)  //yukarýda $selected_aktivite deðeri alýndý
{
$secim_kontrol = " selected";
}
else
{
$secim_kontrol = "";
}
echo "<option $secim_kontrol value=\"$aktivite\">$aktivite</option>\n";
$i++;
}
?>
</select>
<input type="submit" value="Kaydý Deðiþtir">
</form>
<?
echo '
<script>
var tip2sayi=2
var groups=10
var group=new Array(groups)
for (i=0; i<groups; i++)
  group[i]=new Array()

group[0][0]=new Option("ÝLÇE (ÖNCE ÝL SEÇÝNÝZ)","javascript:window.location.value");';
echo "\n";
// echo ends here, please
//echo "<script>\n";
$tip2sayi=2;
$i = 0; $yy=0;
$ozindex=0;
$qx = mysql_query("SELECT tip_ozelligi, tip_ozelligi.no AS ozno, tip1.tip1 AS tip1tip1,  tip2.tip2 AS tip2tip2, tip1.no AS tip1no, tip2.no AS tip2no
FROM tip_ozelligi, tip1, tip2
WHERE tip_ozelligi.tip1 = tip1.tip1 AND tip_ozelligi.tip2 = tip2.tip2
ORDER BY tip_ozelligi  ");
while($qq = mysql_fetch_array($qx))
{
  $tip_ozelligi = $qq['tip_ozelligi'];
  $no=$qq['ozno'];
  $tip1 = $qq['tip1no'];
  $tip2 = $qq['tip2no'];
  $z=(($tip1-1) * $tip2sayi) + $tip2;
  echo "group[$z][group[$z].length]=new Option(\"$tip_ozelligi\",\"$tip_ozelligi\");\n";
  $i++;
	if (($qq['tip2tip2']== $emlaktip2) AND ($qq['tip1tip1']== $emlaktip1)){ 
    if ($tip_ozelligi==$emlak_tip_ozelligi) 
	     $ozindex=$yy;
	  $yy++;
		}
}
echo "\n";
echo "var ozellik=document.form1.tip_ozelligi\n";
$qx = mysql_query("SELECT tip1.no as tip1no, tip2.no as tip2no FROM tip1, tip2 WHERE tip1.tip1='". $emlaktip1 . "' AND tip2.tip2='". $emlaktip2 . "'");
if ($qq = mysql_fetch_array($qx)) {
  $tn1=$qq['tip1no']-1;
	$tn2=$qq['tip2no']-1;
  echo "redirect(" . $tn1 . "," . $tn2 . ");\n";
	}
else 	
  echo "redirect(0,0);\n" ;
echo "ozellik.options[" . $ozindex . "].selected=true\n";	
?>
function redirect(x,y){
  for (m=ozellik.options.length-1;m>0;m--)
    ozellik.options[m]=null
  z=(x * tip2sayi) + y + 1;
  for (i=0;i<group[z].length;i++){
    ozellik.options[i]=new Option(group[z][i].text,group[z][i].value)
    }
  ozellik.options[0].selected=true
  }
</script>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>

</html>
