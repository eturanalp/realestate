<?
include "html.php"; 
if ($_GET['arama_help']=="Yes") 
  include "arama_help.html";
?>

<script language="javascript">
function clearformEmlakArama(Form){
document.emlakarama.bolge.value="";
document.emlakarama.m2.value="";
document.emlakarama.fiyat.value="";
document.emlakarama.isitma_sistemi.value="";
document.emlakarama.bks1.value="";
document.emlakarama.bks2.value="";
document.emlakarama.b_kat1.value="";
document.emlakarama.b_kat2.value="";
document.emlakarama.os1.value="";
document.emlakarama.os2.value="";
document.emlakarama.sals.value="";
document.emlakarama.bs1.value="";
document.emlakarama.bs2.value="";
document.emlakarama.dogu.checked=false;
document.emlakarama.bati.checked=false;
document.emlakarama.kuzey.checked=false;
document.emlakarama.guney.checked=false;
document.emlakarama.aciklama.value="";
document.emlakarama.adres.value="";
document.emlakarama.ahsap.checked=false;
document.emlakarama.ahsap_dograma.checked=false;
document.emlakarama.asansor.checked=false;
document.emlakarama.bahce.checked=false;
document.emlakarama.betonarme.checked=false;
document.emlakarama.celik_kapi.checked=false;
document.emlakarama.deniz_manzarali.checked=false;
document.emlakarama.denize_yakin.checked=false;
document.emlakarama.doga_icinde.checked=false;
document.emlakarama.doga_manzarali.checked=false;
document.emlakarama.dogalgazli.checked=false;
document.emlakarama.dusakabin.checked=false;
document.emlakarama.esyali.checked=false;
document.emlakarama.garaj_otopark.checked=false;
document.emlakarama.gol_manzarali.checked=false;
document.emlakarama.guvenlik.checked=false;
document.emlakarama.jakuzi.checked=false;
document.emlakarama.kat_mulkiyeti.checked=false;
document.emlakarama.klima.checked=false;
document.emlakarama.konak.checked=false;
document.emlakarama.merkezi_havalandirma.checked=false;
document.emlakarama.merkezi_isitma.checked=false;
document.emlakarama.metroya_yakin.checked=false;
document.emlakarama.mobilyali.checked=false;
document.emlakarama.otoyola_yakin.checked=false;
document.emlakarama.panjur.checked=false;
document.emlakarama.pvc_dograma.checked=false;
document.emlakarama.sauna.checked=false;
document.emlakarama.sehir_manzarali.checked=false;
document.emlakarama.somine.checked=false;
document.emlakarama.toplu_ulasima_yakin.checked=false;
document.emlakarama.tramvaya_yakin.checked=false;
document.emlakarama.yali.checked=false;
document.emlakarama.yali_dairesi.checked=false;
document.emlakarama.yangin_merdiveni.checked=false;
document.emlakarama.yazlik.checked=false;
}
</script>
<script src="js/csscript.js"></script>
                  <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100%" bgcolor="#669999">
                        <table border="0" width="100%" cellpadding="0">
                          <tr>
                            <td width="100%" bgcolor="#669999" align="center"><b><font class="orta" color="#FFFFFF"><? echo ($_GET['talep']=="E")?"EMLAK TALEP FORMU<b><br>(Aradýðýnýz emlaðýn özelliklerini aþaðýda belirtiniz)":"DETAYLI EMLAK ARAMA"; ?></font></b></td>
                          </tr>
                          <tr>
                            <td width="100%" bgcolor="#FFFFFF">
                              <table border="0" width="100%" cellpadding="3">
                                <tr>
                                  <form method="get" name="emlakarama" id="emlakarama" action="hara.php">
                                  <input type="hidden" name="__EVENT" value="" />
                                  <input type="hidden" name="__ARGUMENT" value="" />
                                  <input type="hidden" name="kaynak" value="emlakara" />
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Durum:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <select name="islem">
<?
$i = 0;
$qx = mysql_query("SELECT * FROM islem_tipi");
while($qq = mysql_fetch_array($qx)){
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
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Ýl:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
<script language="javascript" type="text/javascript">
<!--
	function __doPostBackEmlakAra(eventTarget, eventArgument) {
		var theform;
		if (window.navigator.appName.toLowerCase().indexOf("microsoft") > -1) {
			theform = document.emlakarama;
		}
		else {
			theform = document.forms["emlakarama"];
		}
		theform.__EVENT.value = eventTarget;
		theform.__ARGUMENT.value = eventArgument;
		theform.submit();		
	}
// -->
</script>
<select name="il_no" onchange="__doPostBackEmlakAra('il_no:degisti','emlakara.php')" language="javascript" id="il_no">
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
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Ýlçe:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
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
$qy = mysql_query("SELECT * FROM ilce WHERE il_no='" . intval($il_no) . "' ORDER BY ilce_adi");

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
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Mahalle/Bölge:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
                                  <input type="text" name="bolge" id="bolge" value="<?=$_GET['bolge'] ?>">
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Kimden?:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <select name="emci"><option value="javascript:window.location.value">TÜM EMLAKÇILAR</option>
<? 
$i=0;
$qem = mysql_query("SELECT * FROM emlakci WHERE il_no='" . intval($il_no) . "'");
while($qemt = mysql_fetch_array($qem)){
  $temp_emlakci_no = $qemt['emlakci_no'];
  $temp_emlakci_isim = $qemt['isim'];
  echo "<option ";
  if (($_GET['emci'] == $temp_emlakci_no)) echo "selected=\"selected\" ";
  echo "value=\"$temp_emlakci_no\">$temp_emlakci_isim</option>\n";
  $i++;
} // end of while loop
?>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Gayrimenkul Tipi:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
                                  <select name="tip1" language="javascript"  onchange="redirect(this.options.selectedIndex,document.emlakarama.tip2.selectedIndex)">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM tip1");

while($qq = mysql_fetch_array($qx))
{
 $tip1 = $qq['tip1'];
 $tip1_no=$qq['no'];
echo "<option value=\"$tip1_no\">$tip1</option>\n";

$i++;
}
?>
</select>
<select name="tip2" language="javascript"  onchange="redirect(document.emlakarama.tip1.selectedIndex,this.options.selectedIndex)">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM tip2");

while($qq = mysql_fetch_array($qx))
{
 $tip2 = $qq['tip2'];
 $tip2_no=$qq['no'];
echo "<option value=\"$tip2_no\">$tip2</option>\n";

$i++;
}
?>
</select>
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Tip Özelliði:</b>
<select name="tip_ozelligi">
<option selected>-----YAPI-KONUT-----</option>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Alan:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
														<?
														
														if (empty($_GET['m2_1']))
 														  $mm1=(empty($_GET['m2'])?"":intval($_GET['m2']));
														else {
														  $mm1 = intval($_GET['m2_1']);
														  $mm2=(empty($_GET['m2_2'])?"":intval($_GET['m2_2']));
														  }	 
														
														
														?>																	
                                  <input type="text" name="m2_1" id="m2_1" value="<?=$mm1 ?>"  size="5" style="text-align:right;"> m<sup>2</sup>  ile  
                                  <input type="text" name="m2_2" id="m2_2" value="<?=$mm2 ?>"  size="5" style="text-align:right;"> m<sup>2</sup>  arasý
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Fiyat:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
														<? 
														
														if (empty($_GET['fiyat1']))
 														  $ff1=(empty($_GET['fiyat'])?"":$_GET['fiyat']);
														else {
														  $ff1 = $_GET['fiyat1'];
														  $ff2=(empty($_GET['fiyat2'])?"":$_GET['fiyat2']);
														  }	 
														
														
														?>
                                  <input type="text" name="fiyat1" value="<?=$ff1 ?>" size="10" id="fiyat1" style="text-align:right;" onkeyup="ucle(event.keyCode,document.emlakarama.fiyat1,'Fiyat alanýna sadece rakam yazýnýz.',0)">  ile   
																	<input type="text" name="fiyat2" value="<?=$ff2 ?>" size="10" id="fiyat2" style="text-align:right;" onkeyup="ucle(event.keyCode,document.emlakarama.fiyat2,'Fiyat alanýna sadece rakam yazýnýz.',0)">
                                  <select name="fiyat_birimi">
                                  <option value="YTL" <? if ($_GET['fiyat_birimi']=="YTL") echo "selected" ?>>YTL</option>
                                  <option value="EURO" <? if ($_GET['fiyat_birimi']=="EURO") echo "selected" ?>>EURO</option>
                                  <option value="USD" <? if ($_GET['fiyat_birimi']=="USD") echo "selected" ?>>USD</option>
                                  </select> arasý
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Isýtma Sistemi:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <select name="isitma_sistemi" id="isitma_sistemi">
<?
$i = 0;
$qx = mysql_query("SELECT * FROM isitma_sistemi ORDER BY isitma_sistemi");
while($qq = mysql_fetch_array($qx)){
 $isitma_sistemi = $qq['isitma_sistemi'];
 if ($_GET['isitma_sistemi']==$isitma_sistemi)
   echo "<option value=\"$isitma_sistemi\" SELECTED >$isitma_sistemi</option>\n";
 else
   echo "<option value=\"$isitma_sistemi\">$isitma_sistemi</option>\n";
 $i++;
 }
?>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Islak Zeminler:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
                                  <select name="islak_zeminler" id="islak_zeminler">
<?
$i = 0;
$qx = mysql_query("SELECT * FROM islak_zeminler ORDER BY islak_zeminler");
while($qq = mysql_fetch_array($qx)){
 $islak_zeminler = $qq['islak_zeminler'];
 if ($_GET['islak_zeminler']==$islak_zeminler)
   echo "<option value=\"$islak_zeminler\" SELECTED >$islak_zeminler</option>\n";
 else 
    echo "<option value=\"$islak_zeminler\">$islak_zeminler</option>\n";
 $i++;
 }
?>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Binadaki Kat Sayýsý:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <input type="text" id="bks1" name="bks1" size="3" value="<?=$_GET['bks1'] ?>"> ile <input type="text" name="bks2" id="bks2" size="3" value="<?=$_GET['bks2'] ?>"> arasý
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Bulunduðu Kat:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
                                  <input type="text" name="b_kat1" id="b_kat1" size="3" value="<?=$_GET['b_kat1'] ?>"> ile <input type="text" name="b_kat2" id="b_kat2" size="3" value="<?=$_GET['b_kat2'] ?>"> arasý
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Oda Sayýsý:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <input type="text" name="os1" id="os1" size="3" value="<?=$_GET['os1'] ?>"> ile <input type="text" name="os2" id="os2" size="3"  value="<?=$_GET['os2'] ?>"> arasý
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Salon Sayýsý:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
                                  <input type="text" name="sals" id="sals" size="5" value="<?=$_GET['sals'] ?>">
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Banyo/Tuvalet Sayýsý:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <input type="text" name="bs1" id="bs1" size="3"  value="<?=$_GET['bs1'] ?>"> ile <input  type="text" name="bs2" id="bs2" size="3"  value="<?=$_GET['bs2'] ?>"> arasý<br />
                                  (<b>Not:</b> Tek duþu yarým sayýnýz. Tek tuvaleti yarým sayýnýz. <br />
                                  Mesela bir klozetli banyosu ve ayrý bir tuvaleti olan ev için 1.5 deðeri giriniz.)
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Balkon Sayýsý:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
                                  <input type="text" name="balkon_sayisi" size="5">
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Cephe:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <input type="checkbox" name="dogu" id="dogu" value="Doðu" <?if($_GET['dogu']=="Doðu") echo "checked" ?>> Doðu&nbsp;&nbsp;&nbsp;
                                  <input type="checkbox" name="bati" id="bati" value="Batý" <?if($_GET['bati']=="Batý") echo "checked" ?>> Batý&nbsp;&nbsp;&nbsp;
                                  <input type="checkbox" name="kuzey" id="kuzey" value="Kuzey" <?if($_GET['kuzey']=="Kuzey") echo "checked" ?>> Kuzey&nbsp;&nbsp;&nbsp;
                                  <input type="checkbox" name="guney" id="guney" value="Güney" <?if($_GET['guney']=="Güney") echo "checked" ?>> Güney
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Açýklama:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
                                  <textarea name="aciklama" id="aciklama" rows="1" cols="20"><?=$_GET['aciklama'] ?></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC" align="right"><b>Adres:</b></td>
                                  <td width="80%" bgcolor="#CCCCCC">
                                  <textarea name="adres" id="adres" rows="1" cols="20"><?=$_GET['adres'] ?></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#EEEEEE" align="right"><b>Diðer Özellikler:</b></td>
                                  <td width="80%" bgcolor="#EEEEEE">
<table border="0" width="80%" cellspacing="0" cellpadding="0">
<tr>
<td width="32%">
<input type="checkbox" name="ahsap" id="ahsap" value="E" <? if($_GET['ahsap']=="E") echo "checked" ?>>Ahþap<br>
<input type="checkbox" name="ahsap_dograma" id="ahsap_dograma" value="E" <? if($_GET['ahsap_dograma']=="E") echo "checked" ?>>Ahþap Doðrama<br>
<input type="checkbox" name="asansor" id="asansor" value="E" <? if($_GET['asansor']=="E") echo "checked" ?>>Asansör<br>
<input type="checkbox" name="bahce" id="bahce" value="E" <? if($_GET['bahce']=="E") echo "checked" ?>>Bahçe<br>
<input type="checkbox" name="asansor" id="betonarme" value="E" <? if($_GET['betonarme']=="E") echo "checked" ?>>Betonarme<br>
<input type="checkbox" name="celik_kapi" id="celik_kapi" value="E" <? if($_GET['celik_kapi']=="E") echo "checked" ?>>Çelik Kapý<br>
<input type="checkbox" name="deniz_manzarali" id="deniz_manzarali" value="E" <? if($_GET['deniz_manzarali']=="E") echo "checked" ?>>Deniz Manzaralý<br>
<input type="checkbox" name="denize_yakin" id="denize_yakin" value="E" <? if($_GET['denize_yakin']=="E") echo "checked" ?>>Denize Yakýn<br>
<input type="checkbox" name="doga_icinde" id="doga_icinde" value="E" <? if($_GET['doga_icinde']=="E") echo "checked" ?>>Doða Ýçinde<br>
<input type="checkbox" name="doga_manzarali" id="doga_manzarali" value="E" <? if($_GET['doga_manzarali']=="E") echo "checked" ?>>Doða Manzaralý<br>
<input type="checkbox" name="dogalgazli" id="dogalgazli" value="E" <? if($_GET['dogalgazli']=="E") echo "checked" ?>>Doðalgazlý<br>
<input type="checkbox" name="dusakabin" id="dusakabin" value="E" <? if($_GET['dusakabin']=="E") echo "checked" ?>>Duþakabin</td>
<td width="36%">
<input type="checkbox" name="esyali" id="esyali" value="E" <? if($_GET['esyali']=="E") echo "checked" ?>>Eþyalý<br>
<input type="checkbox" name="garaj_otopark" id="garaj_otopark" value="E" <? if($_GET['garaj_otopark']=="E") echo "checked" ?>>Garaj/Otopark<br>
<input type="checkbox" name="gol_manzarali" id="gol_manzarali" value="E" <? if($_GET['gol_manzarali']=="E") echo "checked" ?>>Göl Manzaralý<br>
<input type="checkbox" name="guvenlik" id="guvenlik" value="E" <? if($_GET['guvenlik']=="E") echo "checked" ?>>Güvenlik<br>
<input type="checkbox" name="jakuzi" id="jakuzi" value="E" <? if($_GET['jakuzi']=="E") echo "checked" ?>>Jakuzi<br>
<input type="checkbox" name="kat_mulkiyeti" id="kat_mulkiyeti" value="E" <? if($_GET['kat_mulkiyeti']=="E") echo "checked" ?>>Kat Mülkiyeti<br>
<input type="checkbox" name="klima" id="klima" value="E" <? if($_GET['klima']=="E") echo "checked" ?>>Klima<br>
<input type="checkbox" name="konak" id="konak" value="E" <? if($_GET['konak']=="E") echo "checked" ?>>Konak<br>
<input type="checkbox" name="merkezi_havalandirma" id="merkezi_havalandirma" value="E" <? if($_GET['merkezi_havalandirma']=="E") echo "checked" ?>>Merkezi Havalandýrma<br>
<input type="checkbox" name="merkezi_isitma" id="merkezi_isitma" value="E" <? if($_GET['merkezi_isitma']=="E") echo "checked" ?>>Merkezi Isýtma<br>
<input type="checkbox" name="metroya_yakin" id="metroya_yakin" value="E" <? if($_GET['metroya_yakin']=="E") echo "checked" ?>>Metroya Yakýn<br>
<input type="checkbox" name="mobilyali" id="mobilyali" value="E" <? if($_GET['mobilyali']=="E") echo "checked" ?>>Mobilyalý</td>
<td width="32%">
<input type="checkbox" name="asansor" id="otoyola_yakin" value="E" <? if($_GET['otoyola_yakin']=="E") echo "checked" ?>>Otoyola Yakýn<br>
<input type="checkbox" name="panjur" id="panjur" value="E" <? if($_GET['panjur']=="E") echo "checked" ?>>Panjur<br>
<input type="checkbox" name="pvc_dograma" id="pvc_dograma" value="E" <? if($_GET['pvc_dograma']=="E") echo "checked" ?>>PVC Doðrama<br>
<input type="checkbox" name="sauna" id="sauna" value="E" <? if($_GET['sauna']=="E") echo "checked" ?>>Sauna<br>
<input type="checkbox" name="sehir_manzarali" id="sehir_manzarali" value="E" <? if($_GET['sehir_manzarali']=="E") echo "checked" ?>>Þehir Manzaralý<br>
<input type="checkbox" name="somine" id="somine" value="E" <? if($_GET['somine']=="E") echo "checked" ?>>Þömine<br>
<input type="checkbox" name="toplu_ulasima_yakin" id="toplu_ulasima_yakin" value="E" <? if($_GET['toplu_ulasima_yakin']=="E") echo "checked" ?>>Toplu Ulaþýma Yakýn<br>
<input type="checkbox" name="tramvaya_yakin" id="tramvaya_yakin" value="E" <? if($_GET['tramvaya_yakin']=="E") echo "checked" ?>>Tramvaya Yakýn<br>
<input type="checkbox" name="yali" id="yali" value="E" <? if($_GET['yali']=="E") echo "checked" ?>>Yalý<br>
<input type="checkbox" name="yali_dairesi" id="yali_dairesi" value="E" <? if($_GET['yali_dairesi']=="E") echo "checked" ?>>Yalý Dairesi<br>
<input type="checkbox" name="yangin_merdiveni" id="yangin_merdiveni" value="E" <? if($_GET['yangin_merdiveni']=="E") echo "checked" ?>>Yangýn Merdiveni<br>
<input type="checkbox" name="yazlik" id="yazlik" value="E" <? if($_GET['yazlik']=="E") echo "checked" ?>>Yazlýk</td>
</tr>
</table>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="20%" bgcolor="#CCCCCC"><input type="reset" value="Hatýrla">&nbsp;&nbsp;&nbsp;<input type="button"  onclick="clearformEmlakArama(this)" value="Temizle"></td>
                                  <td width="80%"  align="center" bgcolor="#CCCCCC">
                                  <input name="ara" type="submit" value="<? echo ($_GET['talep']=="E")?"Bu kriterlere göre Talep Býrak":"Bu Kriterlere Göre Emlak Ara"; ?>">&nbsp;
																	<!-- <input name="ara" type="submit" value="Bu kriterlere göre Talep Býrak"> -->
                                  </td>
                                  </form>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
<?
echo '
<script>
var tip2sayi=2
var groups=10
var group=new Array(groups)
for (i=0; i<groups; i++)
  group[i]=new Array()

group[0][0]=new Option("SEÇÝNÝZ","javascript:window.location.value");';
echo "\n";
// echo ends here, please
//echo "<script>\n";
$tipa[0][0]=0;$tipa[0][1]=0;$tipa[1][0]=0;$tipa[1][1]=0;
$p_tip_ozelligi=$_GET['tip_ozelligi'];
$toi=0;		$t1=0;		$t2=0;
$tip2sayi=2;
$i = 0;
$qx = mysql_query("SELECT tip_ozelligi, tip_ozelligi.no AS ozno, tip1.no AS tip1no, tip2.no AS tip2no
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
	$tipa[$tip1][$tip2]++;
	if ($tip_ozelligi==$p_tip_ozelligi) {
	  $toi=$tipa[$tip1][$tip2];
		$t1=$tip1-1;
		$t2=$tip2-1;
		}
  $i++;
}
echo "\n";
//$tip1=empty($_GET['tip1'])?0:$_GET['tip1'];
//$tip2=empty($_GET['tip2'])?0:$_GET['tip2'];
//$oz=empty($_GET['tip_ozelligi'])?0:$_GET['tip_ozelligi'];
?>
var ozellik=document.emlakarama.tip_ozelligi
redirect(<?=$t1?>,<?=$t2?>);
ozellik.options[<?=$toi?>].selected=true;
document.emlakarama.tip1.options[<?=$t1?>].selected=true;
document.emlakarama.tip2.options[<?=$t2?>].selected=true;
function redirect(x,y){
  for (m=ozellik.options.length-1;m>0;m--)
    ozellik.options[m]=null
  ozellik.options[0]=new Option("","");
  z=(x * tip2sayi) + y + 1;
  for (i=0;i<group[z].length;i++){
    ozellik.options[i+1]=new Option(group[z][i].text,group[z][i].value)
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

<? include "taban.php"; ?>
</body>

</html>
