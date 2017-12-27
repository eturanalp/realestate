<?
include "kontrol.inc.php";
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";
?>
<b><font color="#FF0000">EMLAK EKLEME FORMU:</font></b>
<form method="post" action="gonder.php" id="form1" name="form1">
<input type="hidden" name="__EVENT" value="" />
<input type="hidden" name="__ARGUMENT" value="" />
<input type="hidden" name="form_tipi" value="emlakekle">
<b><?=$_SESSION['s_emlakci']?> aracýlýðýyla 
<select name="islem_tipi">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM islem_tipi");

while($qq = mysql_fetch_array($qx))
{
 $islem_tipi = $qq['islem_tipi'];

echo "<option value=\"$islem_tipi\">$islem_tipi</option>\n";

$i++;
}
?>
</select> Emlak:</b><br><br>
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
		theform.action="emlak_ekle.php";
		theform.submit();
		
	}
// -->
</script>
<select name="il_no" onchange="__doPostBack('il_no:degisti','')" language="javascript" id="il_no">
<?
$i = 0;
$ino=42;
if (!empty($_POST['il_no'])) $ino=$_POST['il_no']; 
else if (!empty($_SESSION['s_il_no'])) $ino=$_SESSION['s_il_no'];
$qx = mysql_query("SELECT * FROM il ORDER BY il_no");
while($qq = mysql_fetch_array($qx))
{
  $il_no = $qq['il_no'];
  $il_adi = $qq['il_adi'];
  $il_kodu = $qq['il_kodu'];
  echo "<option ";
  if ($ino == $il_no) echo "selected=\"selected\" ";
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
   if ($_SESSION['s_il_no'] == 0)
     $qy = mysql_query("SELECT * FROM ilce ORDER BY ilce_adi");
   else
     $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $_SESSION['s_il_no'] . " ORDER BY ilce_adi");
else 
  $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . intval($_POST['il_no']) . " ORDER BY ilce_adi");

//$qy = mysql_query("SELECT * FROM ilce ORDER BY ilce_no");

while($qt = mysql_fetch_array($qy))
 {
  $ilce_no = $qt['ilce_no'];
  $ilce_adi = $qt['ilce_adi'];

  echo "<option ";
  if (($_POST['ilce_no'] == $ilce_no) OR ($_SESSION['s_ilce_no'] == $ilce_no)) echo "selected=\"selected\" ";
  echo "value=\"$ilce_no\">$ilce_adi</option>\n";

  //echo "<option value=\"$ilce_no\">$ilce_adi</option>\n";

  $i++;
} // end of while loop
?>
</select>
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Mahalle/Bölge:</b> <input type="text" name="bolge" value="<?=$_SESSION['s_bolge']?>"><br><br>
<script src="js/csscript.js"></script>
<b>Fiyatý:</b> <input type="text" id="fiyat" name="fiyat" style="text-align:right;" onkeyup="ucle(event.keyCode,document.form1.fiyat,'Fiyat alanýna sadece rakam yazýnýz',0)">
<select name="fiyat_birimi">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM para_birimi");

while($qq = mysql_fetch_array($qx))
{
 $para_birimi = $qq['para_birimi'];

echo "<option value=\"$para_birimi\">$para_birimi</option>\n";

$i++;
}
?>
</select><br><br>
<b>Brüt m<sup>2</sup>:</b> <input type="text" name="brutm2">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Net m<sup>2</sup>:</b> <input type="text" name="netm2"><br><br>
<b>Yapý durumu:</b>
<select name="yapi_durumu">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM yapi_durumu");

while($qq = mysql_fetch_array($qx))
{
 $yapi_durumu = $qq['yapi_durumu'];

echo "<option value=\"$yapi_durumu\">$yapi_durumu</option>\n";

$i++;
}
?>
</select>  <span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Isýtma Sistemi:</b>
<select name="isitma_sistemi">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM isitma_sistemi");

while($qq = mysql_fetch_array($qx))
{
 $isitma_sistemi = $qq['isitma_sistemi'];

echo "<option value=\"$isitma_sistemi\">$isitma_sistemi</option>\n";

$i++;
}
?>
</select><br><br>
<b>Gayrimenkul Tipi:</b>
<select name="tip1" language="javascript" onchange="redirect(this.options.selectedIndex,document.form1.tip2.selectedIndex)">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM tip1");

while($qq = mysql_fetch_array($qx))
{
 $tip1 = $qq['tip1'];

echo "<option value=\"$tip1\">$tip1</option>\n";

$i++;
}
?>
</select>
<select name="tip2" language="javascript" onchange="redirect(document.form1.tip1.selectedIndex,this.options.selectedIndex)">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM tip2");

while($qq = mysql_fetch_array($qx))
{
 $tip2 = $qq['tip2'];

echo "<option value=\"$tip2\">$tip2</option>\n";

$i++;
}
?>
</select>
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Tip Özelliði:</b>
<select name="tip_ozelligi">
<option selected>-----YAPI-KONUT-----</option>
<option value="Yapý-Konut">Yapý-Konut</option>
<option value="Apartman Dairesi">Apartman Dairesi</option>
<option value="Çiftlik">Çiftlik</option>
<option value="Çiftlik Evi">Çiftlik Evi</option>
<option value="Devre Mülk">Devre Mülk</option>
<option value="Dublex">Dublex</option>
<option value="Ýkiz Ev">Ýkiz Ev</option>
<option value="Komple Site">Komple Site</option>
<option value="Köþk">Köþk</option>
<option value="Köy Evi">Köy Evi</option>
<option value="Kulübe">Kulübe</option>
<option value="Müstakil">Müstakil</option>
<option value="Triplex">Triplex</option>
<option value="Tüm Bina">Tüm Bina</option>
<option value="Yalý">Yalý</option>
<option value="Villa">Villa</option>
<option>-----YAPI-TÝCARÝ-----</option>
<option value="Depo">Depo</option>
<option value="Endüstri Kompleksi">Endüstri Kompleksi</option>
<option value="Endüstriyel Bina">Endüstriyel Bina</option>
<option value="Galeri/Showroom">Galeri/Showroom</option>
<option value="Garaj Binasý/Otopark">Garaj Binasý/Otopark</option>
<option value="Ýmalathane">Ýmalathane</option>
<option value="Maðaza/Dükkan">Maðaza/Dükkan</option>
<option value="Modern Zirai Ýþletme">Modern Zirai Ýþletme</option>
<option value="Ofis">Ofis</option>
<option value="Ofis Katý">Ofis Katý</option>
<option value="Ofis Plazasý">Ofis Plazasý</option>
<option value="Ev Otel">Ev Otel</option>
<option value="Petrol Ýstasyonu">Petrol Ýstasyonu</option>
<option value="Restaurant">Restaurant</option>
<option value="Ticari Bina">Ticari Bina</option>
<option value="Ticari Villa">Ticari Villa</option>
<option>-----ARSA-KONUT-----</option>
<option value="Kooperatif">Kooperatif</option>
<option value="Muhtelif Arsa">Muhtelif Arsa</option>
<option value="Özel Kullaným">Özel Kullaným</option>
<option value="T.K. için Tahsis">T.K. için Tahsis</option>
<option value="Turizm Ýmarlý">Turizm Ýmarlý</option>
<option>-----ARSA-TÝCARÝ-----</option>
<option value="Depo">Depo</option>
<option value="Kooperatif">Kooperatif</option>
<option value="Muhtelif Arsa">Muhtelif Arsa</option>
<option value="Maden Ocaðý">Maden Ocaðý</option>
<option value="Sanayi Ýmarlý">Sanayi Ýmarlý</option>
<option value="Tarým Arazisi">Tarým Arazisi</option>
<option value="Ticarethane Ýmarlý">Ticarethane Ýmarlý</option>
<option value="Turizm Ýmarlý">Turizm Ýmarlý</option>
</select><br><br>
<b>Oda Sayýsý:</b> <input type="text" name="oda_sayisi" size="2">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Salon Sayýsý:</b> <input type="text" name="salon_sayisi" size="2">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Banyo/Tuvalet Sayýsý: </b><input type="text" name="banyo_tuvalet_sayisi" size="2">
<IMG SRC="images/button.help.gif" WIDTH=20 HEIGHT=20 border="0" ALT="Tek duþu yarým sayýnýz. Tek tuvaleti yarým sayýnýz. Mesela bir klozetli banyosu ve ayrý bir tuvaleti olan ev için 1.5 deðeri giriniz.">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Balkon Sayýsý:</b> <input type="text" name="balkon_sayisi" size="2"><br><br>
<b>Islak Zeminler:</b>
<select name="islak_zeminler">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM islak_zeminler ORDER BY islak_zeminler");

while($qq = mysql_fetch_array($qx))
{
 $islak_zeminler = $qq['islak_zeminler'];

echo "<option value=\"$islak_zeminler\">$islak_zeminler</option>\n";

$i++;
}
?>
</select><br><br>
<b>Binadaki Kat Sayýsý:</b> <input type="text" name="binadaki_kat_sayisi" size="2">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Bulunduðu Kat:</b> <input type="text" name="bulundugu_kat" size="2"><br><br>
<b>Cephe:</b>
<input type="checkbox" name="dogu" value="Doðu">  Doðu&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="bati" value="Batý"> Batý&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="kuzey" value="Kuzey"> Kuzey&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="guney" value="Güney"> Güney<br><br>
<b>Açýklama:</b>
<textarea name="aciklama" rows="3" cols="20"></textarea>
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Adres:</b>
<textarea name="adres" rows="3" cols="20"></textarea><br><br><br>
<b>DÝÐER ÖZELLÝKLER:</b>
<br>
<table border="0" width="70%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="32%" valign="top">
<input type="checkbox" name="ahsap" value="E">  Ahþap<br>
<input type="checkbox" name="ahsap_dograma" value="E"> Ahþap Doðrama<br>
<input type="checkbox" name="asansor" value="E"> Asansör<br>
<input type="checkbox" name="bahce" value="E"> Bahçe<br>
<input type="checkbox" name="betonarme" value="E"> Betonarme<br>
<input type="checkbox" name="celik_kapi" value="E"> Çelik Kapý<br>
<input type="checkbox" name="deniz_manzarali" value="E"> Deniz Manzaralý<br>
<input type="checkbox" name="denize_yakin" value="E"> Denize Yakýn<br>
<input type="checkbox" name="doga_icinde" value="E"> Doða Ýçinde<br>
<input type="checkbox" name="doga_manzarali" value="E"> Doða Manzaralý<br>
<input type="checkbox" name="dogalgazli" value="E"> Doðalgazlý<br>
<input type="checkbox" name="dusakabin" value="E"> Duþakabin</td>
    <td width="36%" valign="top">
<input type="checkbox" name="esyali" value="E"> Eþyalý<br>
<input type="checkbox" name="garaj_otopark" value="E">  Garaj/Otopark<br>
<input type="checkbox" name="gol_manzarali" value="E"> Göl Manzaralý<br>
<input type="checkbox" name="guvenlik" value="E"> Güvenlik<br>
<input type="checkbox" name="jakuzi" value="E"> Jakuzi<br>
<input type="checkbox" name="kat_mulkiyeti" value="E"> Kat Mülkiyeti<br>
<input type="checkbox" name="klima" value="E"> Klima<br>
<input type="checkbox" name="konak" value="E"> Konak<br>
<input type="checkbox" name="merkezi_havalandirma" value="E"> Merkezi Havalandýrma<br>
<input type="checkbox" name="merkezi_isitma" value="E"> Merkezi Isýtma<br>
<input type="checkbox" name="metroya_yakin" value="E"> Metroya Yakýn<br>
<input type="checkbox" name="mobilyali" value="E"> Mobilyalý</td>
    <td width="32%" valign="top">
<input type="checkbox" name="otoyola_yakin" value="E"> Otoyola Yakýn<br>
<input type="checkbox" name="panjur" value="E"> Panjur<br>
<input type="checkbox" name="PVC_dograma" value="E"> PVC Doðrama<br>
<input type="checkbox" name="sauna" value="E"> Sauna<br>
<input type="checkbox" name="sehir_manzarali" value="E"> Þehir Manzaralý<br>
<input type="checkbox" name="somine" value="E"> Þömine<br>
<input type="checkbox" name="toplu_ulasima_yakin" value="E"> Toplu Ulaþýma Yakýn<br>
<input type="checkbox" name="tramvaya_yakin" value="E"> Tramvaya Yakýn<br>
<input type="checkbox" name="yali" value="E"> Yalý<br>
<input type="checkbox" name="yali_dairesi" value="E"> Yalý Dairesi<br>
<input type="checkbox" name="yangin_merdiveni" value="E"> Yangýn Merdiveni<br>
<input type="checkbox" name="yazlik" value="E"> Yazlýk</td>
  </tr>
</table>
<br>
<b>Ýlan Aktifliði:</b>
<select name="aktivite">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM aktivite");

while($qq = mysql_fetch_array($qx))
{
 $aktivite = $qq['aktivite'];

echo "<option value=\"$aktivite\">$aktivite</option>\n";

$i++;
}
?>
</select>
<input type="submit" value="Kaydý Ekle">
</form>
<?
echo '
<script>
var tip2sayi=2
var groups=10
var group=new Array(groups)
for (i=0; i<groups; i++)
  group[i]=new Array()

group[0][0]=new Option("?LÇE (ÖNCE ÝL SEÇÝNÝZ)","javascript:window.location.value");';
echo "\n";
// echo ends here, please
//echo "<script>\n";
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
  $i++;
}
echo "\n";
?>
var ozellik=document.form1.tip_ozelligi
redirect(0,0);
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
