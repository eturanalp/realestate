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
<b><?=$_SESSION['s_emlakci']?> arac�l���yla 
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
<b>�l:</b>
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
<b>�l�e:</b>
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
<b>Mahalle/B�lge:</b> <input type="text" name="bolge" value="<?=$_SESSION['s_bolge']?>"><br><br>
<script src="js/csscript.js"></script>
<b>Fiyat�:</b> <input type="text" id="fiyat" name="fiyat" style="text-align:right;" onkeyup="ucle(event.keyCode,document.form1.fiyat,'Fiyat alan�na sadece rakam yaz�n�z',0)">
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
<b>Br�t m<sup>2</sup>:</b> <input type="text" name="brutm2">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Net m<sup>2</sup>:</b> <input type="text" name="netm2"><br><br>
<b>Yap� durumu:</b>
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
<b>Is�tma Sistemi:</b>
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
<b>Tip �zelli�i:</b>
<select name="tip_ozelligi">
<option selected>-----YAPI-KONUT-----</option>
<option value="Yap�-Konut">Yap�-Konut</option>
<option value="Apartman Dairesi">Apartman Dairesi</option>
<option value="�iftlik">�iftlik</option>
<option value="�iftlik Evi">�iftlik Evi</option>
<option value="Devre M�lk">Devre M�lk</option>
<option value="Dublex">Dublex</option>
<option value="�kiz Ev">�kiz Ev</option>
<option value="Komple Site">Komple Site</option>
<option value="K��k">K��k</option>
<option value="K�y Evi">K�y Evi</option>
<option value="Kul�be">Kul�be</option>
<option value="M�stakil">M�stakil</option>
<option value="Triplex">Triplex</option>
<option value="T�m Bina">T�m Bina</option>
<option value="Yal�">Yal�</option>
<option value="Villa">Villa</option>
<option>-----YAPI-T�CAR�-----</option>
<option value="Depo">Depo</option>
<option value="End�stri Kompleksi">End�stri Kompleksi</option>
<option value="End�striyel Bina">End�striyel Bina</option>
<option value="Galeri/Showroom">Galeri/Showroom</option>
<option value="Garaj Binas�/Otopark">Garaj Binas�/Otopark</option>
<option value="�malathane">�malathane</option>
<option value="Ma�aza/D�kkan">Ma�aza/D�kkan</option>
<option value="Modern Zirai ��letme">Modern Zirai ��letme</option>
<option value="Ofis">Ofis</option>
<option value="Ofis Kat�">Ofis Kat�</option>
<option value="Ofis Plazas�">Ofis Plazas�</option>
<option value="Ev Otel">Ev Otel</option>
<option value="Petrol �stasyonu">Petrol �stasyonu</option>
<option value="Restaurant">Restaurant</option>
<option value="Ticari Bina">Ticari Bina</option>
<option value="Ticari Villa">Ticari Villa</option>
<option>-----ARSA-KONUT-----</option>
<option value="Kooperatif">Kooperatif</option>
<option value="Muhtelif Arsa">Muhtelif Arsa</option>
<option value="�zel Kullan�m">�zel Kullan�m</option>
<option value="T.K. i�in Tahsis">T.K. i�in Tahsis</option>
<option value="Turizm �marl�">Turizm �marl�</option>
<option>-----ARSA-T�CAR�-----</option>
<option value="Depo">Depo</option>
<option value="Kooperatif">Kooperatif</option>
<option value="Muhtelif Arsa">Muhtelif Arsa</option>
<option value="Maden Oca��">Maden Oca��</option>
<option value="Sanayi �marl�">Sanayi �marl�</option>
<option value="Tar�m Arazisi">Tar�m Arazisi</option>
<option value="Ticarethane �marl�">Ticarethane �marl�</option>
<option value="Turizm �marl�">Turizm �marl�</option>
</select><br><br>
<b>Oda Say�s�:</b> <input type="text" name="oda_sayisi" size="2">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Salon Say�s�:</b> <input type="text" name="salon_sayisi" size="2">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Banyo/Tuvalet Say�s�: </b><input type="text" name="banyo_tuvalet_sayisi" size="2">
<IMG SRC="images/button.help.gif" WIDTH=20 HEIGHT=20 border="0" ALT="Tek du�u yar�m say�n�z. Tek tuvaleti yar�m say�n�z. Mesela bir klozetli banyosu ve ayr� bir tuvaleti olan ev i�in 1.5 de�eri giriniz.">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Balkon Say�s�:</b> <input type="text" name="balkon_sayisi" size="2"><br><br>
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
<b>Binadaki Kat Say�s�:</b> <input type="text" name="binadaki_kat_sayisi" size="2">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Bulundu�u Kat:</b> <input type="text" name="bulundugu_kat" size="2"><br><br>
<b>Cephe:</b>
<input type="checkbox" name="dogu" value="Do�u">  Do�u&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="bati" value="Bat�"> Bat�&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="kuzey" value="Kuzey"> Kuzey&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="guney" value="G�ney"> G�ney<br><br>
<b>A��klama:</b>
<textarea name="aciklama" rows="3" cols="20"></textarea>
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b>Adres:</b>
<textarea name="adres" rows="3" cols="20"></textarea><br><br><br>
<b>D��ER �ZELL�KLER:</b>
<br>
<table border="0" width="70%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="32%" valign="top">
<input type="checkbox" name="ahsap" value="E">  Ah�ap<br>
<input type="checkbox" name="ahsap_dograma" value="E"> Ah�ap Do�rama<br>
<input type="checkbox" name="asansor" value="E"> Asans�r<br>
<input type="checkbox" name="bahce" value="E"> Bah�e<br>
<input type="checkbox" name="betonarme" value="E"> Betonarme<br>
<input type="checkbox" name="celik_kapi" value="E"> �elik Kap�<br>
<input type="checkbox" name="deniz_manzarali" value="E"> Deniz Manzaral�<br>
<input type="checkbox" name="denize_yakin" value="E"> Denize Yak�n<br>
<input type="checkbox" name="doga_icinde" value="E"> Do�a ��inde<br>
<input type="checkbox" name="doga_manzarali" value="E"> Do�a Manzaral�<br>
<input type="checkbox" name="dogalgazli" value="E"> Do�algazl�<br>
<input type="checkbox" name="dusakabin" value="E"> Du�akabin</td>
    <td width="36%" valign="top">
<input type="checkbox" name="esyali" value="E"> E�yal�<br>
<input type="checkbox" name="garaj_otopark" value="E">  Garaj/Otopark<br>
<input type="checkbox" name="gol_manzarali" value="E"> G�l Manzaral�<br>
<input type="checkbox" name="guvenlik" value="E"> G�venlik<br>
<input type="checkbox" name="jakuzi" value="E"> Jakuzi<br>
<input type="checkbox" name="kat_mulkiyeti" value="E"> Kat M�lkiyeti<br>
<input type="checkbox" name="klima" value="E"> Klima<br>
<input type="checkbox" name="konak" value="E"> Konak<br>
<input type="checkbox" name="merkezi_havalandirma" value="E"> Merkezi Havaland�rma<br>
<input type="checkbox" name="merkezi_isitma" value="E"> Merkezi Is�tma<br>
<input type="checkbox" name="metroya_yakin" value="E"> Metroya Yak�n<br>
<input type="checkbox" name="mobilyali" value="E"> Mobilyal�</td>
    <td width="32%" valign="top">
<input type="checkbox" name="otoyola_yakin" value="E"> Otoyola Yak�n<br>
<input type="checkbox" name="panjur" value="E"> Panjur<br>
<input type="checkbox" name="PVC_dograma" value="E"> PVC Do�rama<br>
<input type="checkbox" name="sauna" value="E"> Sauna<br>
<input type="checkbox" name="sehir_manzarali" value="E"> �ehir Manzaral�<br>
<input type="checkbox" name="somine" value="E"> ��mine<br>
<input type="checkbox" name="toplu_ulasima_yakin" value="E"> Toplu Ula��ma Yak�n<br>
<input type="checkbox" name="tramvaya_yakin" value="E"> Tramvaya Yak�n<br>
<input type="checkbox" name="yali" value="E"> Yal�<br>
<input type="checkbox" name="yali_dairesi" value="E"> Yal� Dairesi<br>
<input type="checkbox" name="yangin_merdiveni" value="E"> Yang�n Merdiveni<br>
<input type="checkbox" name="yazlik" value="E"> Yazl�k</td>
  </tr>
</table>
<br>
<b>�lan Aktifli�i:</b>
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
<input type="submit" value="Kayd� Ekle">
</form>
<?
echo '
<script>
var tip2sayi=2
var groups=10
var group=new Array(groups)
for (i=0; i<groups; i++)
  group[i]=new Array()

group[0][0]=new Option("?L�E (�NCE �L SE��N�Z)","javascript:window.location.value");';
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
