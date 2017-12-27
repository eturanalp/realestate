<?
//include "kontrol.inc.php";
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";

$emlak_no = intval($_GET['emlak_no']);
include "emlak.menu.inc.php";

setlocale(LC_MONETARY, 'tr_TR');
$qx = mysql_query("SELECT * FROM emlak, il, ilce WHERE emlak_no='$emlak_no' AND emlak.il_no=il.il_no AND emlak.ilce_no=ilce.ilce_no");
$qq = mysql_fetch_array($qx);

$emlakci_no = $qq['emlakci_no'];

$qy = mysql_query("SELECT isim,is_tel,foto_dosyasi FROM emlakci WHERE emlakci_no='$emlakci_no'");
$qt = mysql_fetch_array($qy);

$emlakci = $qt['isim'];
$is_tel = $qt['is_tel'];
$emlakci_foto =  $qt['foto_dosyasi'];
$emlak_no = $qq['emlak_no'];
$aktivite = $qq['aktivite'];
$eklenme_zamani = $qq['eklenme_zamani'];
$tip1 = $qq['tip1'];
$tip2 = $qq['tip2'];
$tip_ozelligi = $qq['tip_ozelligi'];
$islem_tipi = $qq['islem_tipi'];
$adres = $qq['adres'];
$il_no = $qq['il_no'];
$ilce_no = $qq['ilce_no'];
$semt_no = $qq['semt_no'];
$fiyat = $qq['fiyat'];
$fiyat_birimi = $qq['fiyat_birimi'];
$brutm2 = $qq['brutm2'];
$netm2 = $qq['netm2'];
$yapi_durumu = $qq['yapi_durumu'];
$isitma_sistemi = $qq['isitma_sistemi'];
$binadaki_kat_sayisi = $qq['binadaki_kat_sayisi'];
$bulundugu_kat = $qq['bulundugu_kat'];
$oda_sayisi = $qq['oda_sayisi'];
$salon_sayisi = $qq['salon_sayisi'];
$balkon_sayisi = $qq['balkon_sayisi'];
$banyo_tuvalet_sayisi = $qq['banyo_tuvalet_sayisi'];
$islak_zeminler = $qq['islak_zeminler'];
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
$ilisim = $qq['il_adi'];
$ilceisim = $qq['ilce_adi'];
$bolge= $qq['bolge'];

// FOTO
$fotono=intval($_GET['foto']);
if (empty($_GET['foto'])) 
  $query="SELECT * FROM foto WHERE emlak_no='$emlak_no'";
else 
  $query="SELECT * FROM foto WHERE emlak_no='$emlak_no' AND no='$fotono' UNION (SELECT * FROM foto WHERE emlak_no='$emlak_no')";
if (empty($emlakci_foto)) $img="images/logo.gif";
else $img="photos/emlakci/" . $emlakci_foto;	

if (($qf = mysql_query($query)) && (mysql_num_rows($qf)>0)) 
    if ($qff = mysql_fetch_array($qf)){  
  	  $img=$qff['path'];
			$fno=$qff['no'];
      $faciklama=$qff['aciklama'];
			if (!mysql_data_seek($qf,0)) echo "Foto okumada hata [U0025]"; 
		  }			
?>
<table border="0" width="100%" cellspacing="3" cellpadding="0">
  <tr>
    <td width="50%" bgcolor="#EEEEEE" align="center" valign="bottom">
      <table border="0" width="100%" cellspacing="0" cellpadding="3">
        <tr>
          <td width="100%" align="center">
<a href="<?=$img?>" target="emlakfoto"> <img src="<?=$img?>" alt="<?=$faciklama?>" width="270" height="230" border="0" /></a><br />
<?
  if ($qff = mysql_fetch_array($qf)) {
	  $img=$qff['path'];$fisim=$qff['isim'];$faciklama=$qff['aciklama'];$fno=$qff['no'];
    echo "[$fisim]  ";
		}
  while ($qff = mysql_fetch_array($qf)) {
	  $img=$qff['path'];$fisim=$qff['isim'];$faciklama=$qff['aciklama'];$fno=$qff['no'];
    echo "<a href=\"emlak.php?emlak_no=$emlak_no&foto=" . $fno . "\" alt=\"$faciklama\">$fisim  </a>  ";
		}
?>
          </td>
        </tr>
      </table>
      <table border="0" width="100%" cellspacing="0" cellpadding="3">
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Açýklama:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? echo $aciklama;  if (strlen($aciklama)>245) echo "...";?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Emlak Ofisi:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo "<a href=\"emlakci.php?emlakci_no=$emlakci_no\">$emlakci</a>" ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Telefon:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $is_tel; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Emlak no:</td>
          <td width="50%" bgcolor="#EAF4FF"><? echo $emlak_no; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Ýlan Aktifliði:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $aktivite; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Ýlan Tarihi:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? echo(date("d.m.Y",empty($eklenme_zamani)?0:strtotime($eklenme_zamani))); ?></td>
        </tr>
      </table>
    </td>
    <td width="50%" bgcolor="#EEEEEE">
      <table border="0" width="100%" cellspacing="0" cellpadding="3">
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Gayrimenkul Tipi:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? echo $tip1 . "-" . $tip2; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Tip Özelliði:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $tip_ozelligi; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Ýþlem Tipi:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? echo $islem_tipi; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Ýl:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $ilisim; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Ýlçe:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? echo $ilceisim; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Bölge:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $bolge; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Fiyatý:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? if ($fiyat != "0") { echo money_format('%!.0n', $fiyat) . " " . $fiyat_birimi; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Brüt m<sup>2</sup>:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? if ($brutm2 != "0") { echo $brutm2; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Net m<sup>2</sup>:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? if ($netm2 != "0") { echo $netm2; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Yapý Durumu:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $yapi_durumu; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Isýtma Sistemi:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? echo ($tip1=='Arsa')?"":$isitma_sistemi; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Binadaki Kat Sayýsý:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? if ($binadaki_kat_sayisi != "0") { echo $binadaki_kat_sayisi; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Bulunduðu Kat:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? if ($bulundugu_kat != "0") { echo $bulundugu_kat; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Oda Sayýsý:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? if ($oda_sayisi != "0") { echo "$oda_sayisi"; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Salon Sayýsý:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? if ($salon_sayisi != "0") { echo "$salon_sayisi"; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Balkon Sayýsý:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? if ($balkon_sayisi != "0") { echo "$balkon_sayisi"; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Banyo/Tuvalet Sayýsý:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? if ($banyo_tuvalet_sayisi != "0") { echo "$banyo_tuvalet_sayisi"; } else { echo "-"; } ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Islak Zeminler:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $islak_zeminler; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Cephe:</b></td>
          <td width="50%" bgcolor="#EAF4FF"><? echo $cephe; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#C1E0FF"><b>Adres:</b></td>
          <td width="50%" bgcolor="#C1E0FF"><? echo $adres; ?></td>
        </tr>
        <tr>
          <td width="50%" bgcolor="#EAF4FF"><b>Diðer Özellikler:</b></td>
          <td width="50%" bgcolor="#EAF4FF">
<?
if ($ahsap == "E") { echo "- Ahþap<br>"; }
else {}

if ($ahsap_dograma == "E") { echo "- Ahþap Doðrama<br>"; }
else {}

if ($asansor == "E") { echo "- Asansör<br>"; }
else {}

if ($bahce == "E") { echo "- Bahçe<br>"; }
else {}

if ($betonarme == "E") { echo "- Betonarme<br>"; }
else {}

if ($celik_kapi == "E") { echo "- Çelik Kapý<br>"; }
else {}

if ($deniz_manzarali == "E") { echo "- Deniz Manzaralý<br>"; }
else {}

if ($denize_yakin == "E") { echo "- Denize Yakýn<br>"; }
else {}

if ($doga_icinde == "E") { echo "- Doða Ýçinde<br>"; }
else {}

if ($doga_manzarali == "E") { echo "- Doða Manzaralý<br>"; }
else {}

if ($dogalgazli == "E") { echo "- Doðalgazlý<br>"; }
else {}

if ($dusakabin == "E") { echo "- Duþakabin<br>"; }
else {}

if ($esyali == "E") { echo "- Eþyalý<br>"; }
else {}

if ($garaj_otopark == "E") { echo "- Garaj/Otopark<br>"; }
else {}

if ($gol_manzarali == "E") { echo "- Göl Manzaralý<br>"; }
else {}

if ($guvenlik == "E") { echo "- Güvenlik<br>"; }
else {}

if ($jakuzi == "E") { echo "- Jakuzi<br>"; }
else {}

if ($kat_mulkiyeti == "E") { echo "- Kat Mülkiyeti<br>"; }
else {}

if ($klima == "E") { echo "- Klima<br>"; }
else {}

if ($kombi == "E") { echo "- Kombi<br>"; }
else {}

if ($konak == "E") { echo "- Konak<br>"; }
else {}

if ($merkezi_havalandirma == "E") { echo "- Merkezi Havalandýrma<br>"; }
else {}

if ($merkezi_isitma == "E") { echo "- Merkezi Isýtma<br>"; }
else {}

if ($metroya_yakin == "E") { echo "- Metroya Yakýn<br>"; }
else {}

if ($mobilyali == "E") { echo "- Mobilyalý<br>"; }
else {}

if ($otoyola_yakin == "E") { echo "- Otoyola Yakýn<br>"; }
else {}

if ($panjur == "E") { echo "- Panjur<br>"; }
else {}

if ($PVC_dograma == "E") { echo "- PVC Doðrama<br>"; }
else {}

if ($sauna == "E") { echo "- Sauna<br>"; }
else {}

if ($sehir_manzarali == "E") { echo "- Þehir Manzaralý<br>"; }
else {}

if ($somine == "E") { echo "- Þömine<br>"; }
else {}

if ($toplu_ulasima_yakin == "E") { echo "- Toplu Ulaþýma Yakýn<br>"; }
else {}

if ($tramvaya_yakin == "E") { echo "- Tramvaya Yakýn<br>"; }
else {}

if ($yali == "E") { echo "- Yalý<br>"; }
else {}

if ($yali_dairesi == "E") { echo "- Yalý Dairesi<br>"; }
else {}

if ($yangin_merdiveni == "E") { echo "- Yangýn Merdiveni<br>"; }
else {}

if ($yazlik == "E") { echo "- Yazlýk"; }
else {}
?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="3" cellpadding="3">
  <tr>
    <td width="100%" bgcolor="#666699" align="center"><b><a href="tavsiye.php?emlak_no=<? echo "$emlak_no"; ?>"><font color="#FFFFFF">[ BU EMLAK KAYDINI ARKADAÞIMA GÖNDER ]</font></a></b></td>
  </tr>
	
<?
if (strlen($aciklama)>245) {
  $qx = mysql_query("SELECT * FROM emlak_detay WHERE emlak_no='$emlak_no'");
  if ($qq = mysql_fetch_array($qx)){
    $aciklama_html= $qq['aciklama_html'];
  	echo "<tr><td width=\"100%\" bgcolor=\"#EAF4FF\" align=\"center\"> - DETAYLI AÇIKLAMA - <br />$aciklama_html</td></tr>";
    } 
}

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
<? include "taban.php"; ?>
</body>

</html>
