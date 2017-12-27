<?
include "kontrol.inc.php";
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";
?>

<script language="javascript" type="text/javascript">
	function _il_gonder() {
		var theform;
		if (window.navigator.appName.toLowerCase().indexOf("microsoft") > -1) {
			theform = document.ilgonder;
		}
		else {
			theform = document.forms["ilgonder"];
		}
		theform.submit();		
	}
</script>
<?
//setlocale(LC_ALL, 'tr_TR');
$basla=intval($_GET['basla']);
if (empty($_GET['il_no'])) $display_il_no=$_SESSION['emlakci_il_no'];
else $display_il_no=intval($_GET['il_no']);
$gun=15;
echo "<form method=\"get\" name=\"ilgonder\" id=\"ilgonder\" action=\"talep_listele.php\">";
echo "Son $gun günde talep olan iller: <select name=\"il_no\" id=\"il_no\" onchange=\"_il_gonder()\" >";
//Önce Ýl listesini ComboBox'a yaz
$qx = mysql_query("SELECT il_adi as il, talep.il_no as ilno, COUNT(talep_no) AS talep_sayisi FROM talep, il, ilce WHERE talep.il_no=il.il_no AND talep.ilce_no=ilce.ilce_no AND talep_tarihi>'" . date ("Y-m-d H:i:s",time()-($gun*(60*60*24))) . "' GROUP BY ilno ");
while($qq = mysql_fetch_array($qx)){
  $il_no = $qq['ilno'];
	$talep_sayisi=$qq['talep_sayisi'];
	$il=$qq['il'];
  if ($display_il_no==$il_no) echo "<option value=\"$il_no\" SELECTED>$il ($talep_sayisi adet)</option>";
	else echo "<option value=\"$il_no\">$il ($talep_sayisi adet)</option>";
}
echo "</select>";
echo "
<!-- <center><font class=\"spot\" color=\"#CC3300\"><b> - TALEP LÝSTESÝ - </b><br></font></center> -->
<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\">
<tr><td bgcolor=\"#E1F0FF\">EMLAK TALEBÝ</td><td bgcolor=\"#E1F0FF\">ARAMA KRÝTERLERÝ</td></tr>
<br>
";
$listeleme=20;
$i = 0;
$qx = mysql_query("SELECT * FROM talep, il, ilce WHERE talep.il_no='$display_il_no' AND talep.il_no=il.il_no AND talep.ilce_no=ilce.ilce_no AND talep_tarihi>'" . date ("Y-m-d H:i:s",time()-($gun*(60*60*24))) . "' ORDER BY talep_tarihi DESC LIMIT $basla , $listeleme");
$data=mysql_num_rows($qx);
while($qq = mysql_fetch_array($qx))
{

$talep_no = $qq['talep_no'];
$islem_tipi = $qq['islem_tipi'];
$il_no = $qq['talep.il_no'];
$ilce_no = $qq['talep.ilce_no'];
$il=$qq['il_adi'];
$ilce=$qq['ilce_adi'];
$bolge = $qq['bolge'];
$tip_ozelligi = $qq['tip_ozelligi'];
$emlakci_no = $qq['emlakci_no'];
$m2_1 = $qq['m2_1'];
$m2_2 = $qq['m2_2'];
$m2 = $qq['m2'];
$fiyat1 = $qq['fiyat1'];
$fiyat2 = $qq['fiyat2'];
$fiyat = $qq['fiyat'];
$fiyat_birimi = $qq['fiyat_birimi'];
$isitma_sistemi = $qq['isitma_sistemi'];
$islak_zeminler = $qq['islak_zeminler'];
$binadaki_kat_sayisi1 = $qq['binadaki_kat_sayisi1'];
$binadaki_kat_sayisi2 = $qq['binadaki_kat_sayisi2'];
$bulundugu_kat1 = $qq['bulundugu_kat1'];
$bulundugu_kat2 = $qq['bulundugu_kat2'];
$oda_sayisi1 = $qq['oda_sayisi1'];
$oda_sayisi2 = $qq['oda_sayisi2'];
$salon_sayisi = $qq['salon_sayisi'];
$banyo_tuvalet_sayisi1 = $qq['banyo_tuvalet_sayisi1'];
$banyo_tuvalet_sayisi2 = $qq['banyo_tuvalet_sayisi2'];
$balkon_sayisi = $qq['balkon_sayisi'];
$cephe = $qq['cephe'];
$aciklama = $qq['aciklama'];
$adres = $qq['adres'];
$ahsap = $qq['ahsap'];
$betonarme = $qq['betonarme'];
$doga_icinde = $qq['doga_icinde'];
$jakuzi = $qq['jakuzi'];
$konak = $qq['konak'];
$tramvaya_yakin = $qq['tramvaya_yakin'];
$PVC_dograma = $qq['PVC_dograma'];
$sauna = $qq['sauna'];
$ahsap_dograma = $qq['ahsap_dograma'];
$celik_kapi = $qq['celik_kapi'];
$doga_manzarali = $qq['doga_manzarali'];
$garaj_otopark = $qq['garaj_otopark'];
$kat_mulkiyeti = $qq['kat_mulkiyeti'];
$merkezi_havalandirma = $qq['merkezi_havalandirma'];
$esyali = $qq['esyali'];
$mobilyali = $qq['mobilyali'];
$toplu_ulasima_yakin = $qq['toplu_ulasima_yakin'];
$yali_dairesi = $qq['yali_dairesi'];
$asansor = $qq['asansor'];
$deniz_manzarali = $qq['deniz_manzarali'];
$dogalgazli = $qq['dogalgazli'];
$gol_manzarali = $qq['gol_manzarali'];
$klima = $qq['klima'];
$metroya_yakin = $qq['metroya_yakin'];
$otoyola_yakin = $qq['otoyola_yakin'];
$sehir_manzarali = $qq['sehir_manzarali'];
$yangin_merdiveni = $qq['yangin_merdiveni'];
$bahce = $qq['bahce'];
$denize_yakin = $qq['denize_yakin'];
$dusakabin = $qq['dusakabin'];
$guvenlik = $qq['guvenlik'];
$yazlik = $qq['yazlik'];
$panjur = $qq['panjur'];
$somine = $qq['somine'];
$merkezi_isitma = $qq['merkezi_isitma'];
$yali = $qq['yali'];

$talepci = $qq['talepci'];
$email = $qq['email'];
$tel = $qq['tel'];
$detay = $qq['detay'];
$talep_tarihi = $qq['talep_tarihi'];
?>
  <tr>
    <td width="50%">
    <b>Talep Tarihi:</b> <?echo(date("d.m.Y H:i",empty($talep_tarihi)?0:(strtotime($talep_tarihi)+(60*60*7)))); ?><br>
    <b>Talep No:</b> <? echo "$talep_no"; ?><br>
    <b>Talepte Bulunan:</b> <? if ($talepci != "") { echo "$talepci"; } else { echo "-"; } ?><br>
    <b>E-mail:</b> <? echo "$email"; ?><br>
    <b>Tel:</b> <? if ($tel != "") { echo "$tel"; } else { echo "-"; } ?><br>
    <? if ($detay != "") { echo "<b>Talep Detayý:</b><br> $detay <br>"; } else { echo ""; } ?>
    </td>
    <td width="50%">
    <? if ($islem_tipi != "") { echo "<b>Ýþlem Tipi:</b> $islem_tipi <br>"; } else { echo ""; } ?>
    <? if ($tip_ozelligi != "") { echo "<b>Tip Özelliði:</b> $tip_ozelligi <br>"; } else { echo ""; } ?>
    <? echo "<b>Ýl:</b> $il"; ?><br>
    <b>Ýlçe:</b> <? echo "$ilce"; ?><br>
    <? if ($bolge != "") { echo "<b>Bölge:</b> $bolge <br>";} else { echo ""; } ?>
    <? if ((!empty($m2_1)) OR (!empty($m2_2))) { echo "<b>Alan:</b> $m2_1 - $m2_2 m<sup>2</sup><br>"; } else { echo ""; } ?>
    <? if ((!empty($fiyat1)) OR (!empty($fiyat2))) { echo "<b>Fiyatý:</b> $fiyat1 - $fiyat2 $fiyat_birimi<br>"; } else { echo ""; } ?>
    <? if ($isitma_sistemi != "") { echo "<b>Isýtma Sistemi:</b>$isitma_sistemi<br>"; } else { echo ""; } ?>
    <? if ($islak_zeminler != "") { echo "<b>Islak Zeminler:</b>$islak_zeminler<br>"; } else { echo ""; } ?>
    <? if ((!empty($binadaki_kat_sayisi1)) OR (!empty($binadaki_kat_sayisi2))) { echo "<b>Binadaki Kat Sayýsý:</b> $binadaki_kat_sayisi1 - $binadaki_kat_sayisi2<br>"; } else { echo ""; } ?>
    <? if ((!empty($bulundugu_kat1)) OR (!empty($bulundugu_kat2))) { echo "<b>Bulunduðu Kat:</b> $bulundugu_kat1 - $bulundugu_kat2<br>"; } else { echo ""; } ?>
    <? if ((!empty($oda_sayisi1)) OR (!empty($oda_sayisi2))) { echo "<b>Oda Sayýsý:</b> $oda_sayisi1 - $oda_sayisi2<br>"; } else { echo ""; } ?>
    <? if (!empty($salon_sayisi)) { echo "<b>Salon Sayýsý:</b> $salon_sayisi<br>"; } else { echo ""; } ?>
    <? if ((!empty($banyo_tuvalet_sayisi1)) OR (!empty($banyo_tuvalet_sayisi2))) { echo "<b>Banyo/Tuvalet Sayýsý:</b> $banyo_tuvalet_sayisi1 - $banyo_tuvalet_sayisi2<br>"; } else { echo ""; } ?>
    <? if (!empty($balkon_sayisi)) { echo "<b>Balkon Sayýsý:</b> $balkon_sayisi<br>"; } else { echo ""; } ?>
    <? if (stristr($cephe,"Güney") OR stristr($cephe,"Kuzey") OR stristr($cephe,"Doðu") OR stristr($cephe,"Batý")) echo "<b>Cephe:</b> $cephe<br>"; ?>
    <? if ($aciklama != "") { echo "<b>Açýklama:</b> $aciklama<br>"; } else { echo ""; } ?>
    <? if ($adres != "") { echo "<b>Adres:</b> $adres<br>"; } else { echo ""; } ?>
    <b>Diðer Özellikler:</b>
<?
if ($ahsap == "E") { echo "Ahþap, "; }
else {}

if ($ahsap_dograma == "E") { echo "Ahþap Doðrama, "; }
else {}

if ($asansor == "E") { echo "Asansör, "; }
else {}

if ($bahce == "E") { echo "Bahçe, "; }
else {}

if ($betonarme == "E") { echo "Betonarme, "; }
else {}

if ($celik_kapi == "E") { echo "Çelik Kapý, "; }
else {}

if ($deniz_manzarali == "E") { echo "Deniz Manzaralý, "; }
else {}

if ($denize_yakin == "E") { echo "Denize Yakýn, "; }
else {}

if ($doga_icinde == "E") { echo "Doða Ýçinde, "; }
else {}

if ($doga_manzarali == "E") { echo "Doða Manzaralý, "; }
else {}

if ($dogalgazli == "E") { echo "Doðalgazlý, "; }
else {}

if ($dusakabin == "E") { echo "Duþakabin, "; }
else {}

if ($esyali == "E") { echo "Eþyalý, "; }
else {}

if ($garaj_otopark == "E") { echo "Garaj/Otopark, "; }
else {}

if ($gol_manzarali == "E") { echo "Göl Manzaralý, "; }
else {}

if ($guvenlik == "E") { echo "Güvenlik, "; }
else {}

if ($jakuzi == "E") { echo "Jakuzi, "; }
else {}

if ($kat_mulkiyeti == "E") { echo "Kat Mülkiyeti, "; }
else {}

if ($klima == "E") { echo "Klima, "; }
else {}

if ($kombi == "E") { echo "Kombi, "; }
else {}

if ($konak == "E") { echo "Konak, "; }
else {}

if ($merkezi_havalandirma == "E") { echo "Merkezi Havalandýrma, "; }
else {}

if ($merkezi_isitma == "E") { echo "Merkezi Isýtma, "; }
else {}

if ($metroya_yakin == "E") { echo "Metroya Yakýn, "; }
else {}

if ($mobilyali == "E") { echo "Mobilyalý, "; }
else {}

if ($otoyola_yakin == "E") { echo "Otoyola Yakýn, "; }
else {}

if ($panjur == "E") { echo "Panjur, "; }
else {}

if ($PVC_dograma == "E") { echo "PVC Doðrama, "; }
else {}

if ($sauna == "E") { echo "Sauna, "; }
else {}

if ($sehir_manzarali == "E") { echo "Þehir Manzaralý, "; }
else {}

if ($somine == "E") { echo "Þömine, "; }
else {}

if ($toplu_ulasima_yakin == "E") { echo "Toplu Ulaþýma Yakýn, "; }
else {}

if ($tramvaya_yakin == "E") { echo "Tramvaya Yakýn, "; }
else {}

if ($yali == "E") { echo "Yalý, "; }
else {}

if ($yali_dairesi == "E") { echo "Yalý Dairesi, "; }
else {}

if ($yangin_merdiveni == "E") { echo "Yangýn Merdiveni, "; }
else {}

if ($yazlik == "E") { echo "Yazlýk"; }
else {}

echo "
    </td>
  </tr>\n
";

$i++;
}

echo "<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\">";
$baslangic=$basla;
$onceki = $baslangic - $listeleme;
$sonraki = $baslangic + $listeleme;
if ($basla<=0)
  if ($data<$listeleme)
	  { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\">« Önceki | Sonraki »</font></td></tr>"; }
  else
    { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\">« Önceki</font> <font color=\"FF0000\">|</font> <a href=\"talep_listele.php?basla=$sonraki&il_no=$display_il_no\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>"; }
else
  if ($data<$listeleme)
    { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"talep_listele.php?basla=$onceki&il_no=$display_il_no\">Önceki</a> <font color=\"FF0000\">|</font> <a href=\"talep_listele.php?basla=$sonraki&il_no=$display_il_no\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>"; }
  else 
	  { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"talep_listele.php?basla=$onceki&il_no=$display_il_no\">Önceki</a> <font color=\"FF0000\">|</font> <font color=\"#CCCCCC\">Sonraki »</font></td></tr>"; }
echo "</table>";
mysql_close();
?>
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
    </td>
  </tr>
</table>
</body>

</html>
