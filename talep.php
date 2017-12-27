<? 

include "mysql.inc.php";
include "html.php";

$talep_krit=$_GET['islem'];
$talep_krit .=" , " . $il . " (" . $_GET['il_no'] . ")";
$talep_krit .=" , " . $ilce . " (" . $_GET['ilce_no'] . ")";
if (!(empty($_GET['bolge']))) $talep_krit .=" , " . $_GET['bolge'];
if (!(empty($_GET['tip_ozelligi']))) $talep_krit .=" , " . $_GET['tip_ozelligi'];
if (!(empty($_GET['emci']))) $talep_krit .=" , " . $emlakci . " (" . $_GET['emci'] . ")";
if (!(empty($_GET['m2_1']))) $talep_krit .=" , en az alan " . $_GET['m2_1'] . " m2";
if (!(empty($_GET['m2_2']))) $talep_krit .=" , en çok alan " . $_GET['m2_2'] . " m2";
if (!(empty($_GET['m2_2']))) $talep_krit .=" , yaklaþýk alan " . $_GET['m2'] . " m2";
if (!(empty($_GET['fiyat1']))) $talep_krit .=" , fiyat alt limit " . $_GET['fiyat1'] . " " . $_GET['fiyat_birimi'];
if (!(empty($_GET['fiyat2']))) $talep_krit .=" , fiyat üst limit " . $_GET['fiyat2'] . " " . $_GET['fiyat_birimi'];
if (!(empty($_GET['fiyat']))) $talep_krit .=" , yaklaþýk fiyatý " . $_GET['fiyat'] . " " . $_GET['fiyat_birimi'];
if (!(empty($_GET['isitma_sistemi']))) $talep_krit .=" , Isýtma " . $_GET['isitma_sistemi'];

$islem_tipi = $_GET['islem'];
$il_no = $_GET['il_no'];
$ilce_no = $_GET['ilce_no'];
$bolge = $_GET['bolge'];
$tip_ozelligi = $_GET['tip_ozelligi'];
$emlakci_no = $_GET['emci'];
$m2_1 = $_GET['m2_1'];
$m2_2 = $_GET['m2_2'];
$m2 = $_GET['m2'];
$fiyat1 = $_GET['fiyat1'];
$fiyat2 = $_GET['fiyat2'];
$fiyat = $_GET['fiyat'];
$fiyat_birimi = $_GET['fiyat_birimi'];
$isitma_sistemi = $_GET['isitma_sistemi'];
$islak_zeminler = $_GET['islak_zeminler'];
$binadaki_kat_sayisi1 = $_GET['bks1'];
$binadaki_kat_sayisi2 = $_GET['bks2'];
$bulundugu_kat1 = $_GET['b_kat1'];
$bulundugu_kat2 = $_GET['b_kat2'];
$oda_sayisi1 = $_GET['os1'];
$oda_sayisi2 = $_GET['os2'];
$salon_sayisi = $_GET['sals'];
$banyo_tuvalet_sayisi1 = $_GET['bs1'];
$banyo_tuvalet_sayisi2 = $_GET['bs2'];
$balkon_sayisi = $_GET['balkon_sayisi'];
$dogu = $_GET['dogu'];
if ($dogu != "Doðu") { $dogu = "-"; }
$bati = $_GET['bati'];
if ($bati != "Batý") { $bati = "-"; }
$kuzey = $_GET['kuzey'];
if ($kuzey != "Kuzey") { $kuzey = "-"; }
$guney = $_GET['guney'];
if ($guney != "Güney") { $guney = "-"; }
$cephe = "$dogu, $bati, $kuzey, $guney";
$aciklama = $_GET['aciklama'];
$adres = $_GET['adres'];
$ahsap = $_GET['ahsap'];
if ($ahsap != "E") { $ahsap = "H"; }
$betonarme = $_GET['betonarme'];
if ($betonarme != "E") { $betonarme = "H"; }
$doga_icinde = $_GET['doga_icinde'];
if ($doga_icinde != "E") { $doga_icinde = "H"; }
$jakuzi = $_GET['jakuzi'];
if ($jakuzi != "E") { $jakuzi = "H"; }
$konak = $_GET['konak'];
if ($konak != "E") { $konak = "H"; }
$tramvaya_yakin = $_GET['tramvaya_yakin'];
if ($tramvaya_yakin != "E") { $tramvaya_yakin = "H"; }
$PVC_dograma = $_GET['PVC_dograma'];
if ($PVC_dograma != "E") { $PVC_dograma = "H"; }
$sauna = $_GET['sauna'];
if ($sauna != "E") { $sauna = "H"; }
$ahsap_dograma = $_GET['ahsap_dograma'];
if ($ahsap_dograma != "E") { $ahsap_dograma = "H"; }
$celik_kapi = $_GET['celik_kapi'];
if ($celik_kapi != "E") { $celik_kapi = "H"; }
$doga_manzarali = $_GET['doga_manzarali'];
if ($doga_manzarali != "E") { $doga_manzarali = "H"; }
$garaj_otopark = $_GET['garaj_otopark'];
if ($garaj_otopark != "E") { $garaj_otopark = "H"; }
$kat_mulkiyeti = $_GET['kat_mulkiyeti'];
if ($kat_mulkiyeti != "E") { $kat_mulkiyeti = "H"; }
$merkezi_havalandirma = $_GET['merkezi_havalandirma'];
if ($merkezi_havalandirma != "E") { $merkezi_havalandirma = "H"; }
$esyali = $_GET['esyali'];
if ($esyali != "E") { $esyali = "H"; }
$mobilyali = $_GET['mobilyali'];
if ($mobilyali != "E") { $mobilyali = "H"; }
$toplu_ulasima_yakin = $_GET['toplu_ulasima_yakin'];
if ($toplu_ulasima_yakin != "E") { $toplu_ulasima_yakin = "H"; }
$yali_dairesi = $_GET['yali_dairesi'];
if ($yali_dairesi != "E") { $yali_dairesi = "H"; }
$asansor = $_GET['asansor'];
if ($asansor != "E") { $asansor = "H"; }
$deniz_manzarali = $_GET['deniz_manzarali'];
if ($deniz_manzarali != "E") { $deniz_manzarali = "H"; }
$dogalgazli = $_GET['dogalgazli'];
if ($dogalgazli != "E") { $dogalgazli = "H"; }
$gol_manzarali = $_GET['gol_manzarali'];
if ($gol_manzarali != "E") { $gol_manzarali = "H"; }
$klima = $_GET['klima'];
if ($klima != "E") { $klima = "H"; }
$metroya_yakin = $_GET['metroya_yakin'];
if ($metroya_yakin != "E") { $metroya_yakin = "H"; }
$otoyola_yakin = $_GET['otoyola_yakin'];
if ($otoyola_yakin != "E") { $otoyola_yakin = "H"; }
$sehir_manzarali = $_GET['sehir_manzarali'];
if ($sehir_manzarali != "E") { $sehir_manzarali = "H"; }
$yangin_merdiveni = $_GET['yangin_merdiveni'];
if ($yangin_merdiveni != "E") { $yangin_merdiveni = "H"; }
$bahce = $_GET['bahce'];
if ($bahce != "E") { $bahce = "H"; }
$denize_yakin = $_GET['denize_yakin'];
if ($denize_yakin != "E") { $denize_yakin = "H"; }
$dusakabin = $_GET['dusakabin'];
if ($dusakabin != "E") { $dusakabin = "H"; }
$guvenlik = $_GET['guvenlik'];
if ($guvenlik != "E") { $guvenlik = "H"; }
$yazlik = $_GET['yazlik'];
if ($yazlik != "E") { $yazlik = "H"; }
$panjur = $_GET['panjur'];
if ($panjur != "E") { $panjur = "H"; }
$somine = $_GET['somine'];
if ($somine != "E") { $somine = "H"; }
$merkezi_isitma = $_GET['merkezi_isitma'];
if ($merkezi_isitma != "E") { $merkezi_isitma = "H"; }
$yali = $_GET['yali'];
if ($yali != "E") { $yali = "H"; }

$talepci = $_POST['talepci'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$detay = $_POST['detay'];
$talep_tarihi = date ("Y-m-d H:i:s");

// TALEP.PHP nin input parametrelerinin isimleri emlakara.php ninki ile ayný.
// Bu yukarýdaki satýrlardan da anlaþýlabilir.
// TALEP.PHP talepci bilgilerini ve talep edilen emlagin kriter bilgilerini
// [talep] tablosuna yazar. Talep Tarihini atar. 

// Daha sonra yazma iþlemi baþarýyla sonuçlanmýþsa, talepçiye talebinin baaçarýyla kaydedildiði 
// Talep kriter bilgileriyle birlikte bildirilir. Ýlginiz için teçekkür ederiz denir. 
//

if(mysql_query("INSERT INTO talep (islem_tipi,il_no,ilce_no,bolge,tip_ozelligi,emlakci_no,m2_1,m2_2,m2,fiyat1,fiyat2,fiyat,fiyat_birimi,isitma_sistemi,islak_zeminler,binadaki_kat_sayisi1,binadaki_kat_sayisi2,bulundugu_kat1,bulundugu_kat2,oda_sayisi1,oda_sayisi2,salon_sayisi,banyo_tuvalet_sayisi1,banyo_tuvalet_sayisi2,balkon_sayisi,aciklama,adres,cephe,ahsap,betonarme,doga_icinde,jakuzi,konak,tramvaya_yakin,PVC_dograma,sauna,ahsap_dograma,celik_kapi,doga_manzarali,garaj_otopark,kat_mulkiyeti,merkezi_havalandirma,mobilyali,esyali,toplu_ulasima_yakin,yali_dairesi,asansor,deniz_manzarali,dogalgazli,gol_manzarali,klima,metroya_yakin,otoyola_yakin,sehir_manzarali,yangin_merdiveni,bahce,denize_yakin,dusakabin,guvenlik,yazlik,panjur,somine,merkezi_isitma,yali,talepci,email,tel,detay,talep_tarihi) VALUES ('$islem_tipi','$il_no','$ilce_no','$bolge','$tip_ozelligi','$emlakci_no','$m2_1','$m2_2','$m2','$fiyat1','$fiyat2','$fiyat','$fiyat_birimi','$isitma_sistemi','$islak_zeminler','$binadaki_kat_sayisi1','$binadaki_kat_sayisi2','$bulundugu_kat1','$bulundugu_kat2','$oda_sayisi1','$oda_sayisi2','$salon_sayisi','$banyo_tuvalet_sayisi1','$banyo_tuvalet_sayisi2','$balkon_sayisi','$aciklama','$adres','$cephe','$ahsap','$betonarme','$doga_icinde','$jakuzi','$konak','$tramvaya_yakin','$PVC_dograma','$sauna','$ahsap_dograma','$celik_kapi','$doga_manzarali','$garaj_otopark','$kat_mulkiyeti','$merkezi_havalandirma','$mobilyali','$esyali','$toplu_ulasima_yakin','$yali_dairesi','$asansor','$deniz_manzarali','$dogalgazli','$gol_manzarali','$klima','$metroya_yakin','$otoyola_yakin','$sehir_manzarali','$yangin_merdiveni','$bahce','$denize_yakin','$dusakabin','$guvenlik','$yazlik','$panjur','$somine','$merkezi_isitma','$yali','$talepci','$email','$tel','$detay','$talep_tarihi')"))
 { echo "Talebiniz baþarýyla kaydedilmiþtir.<br>Talebiniz 15 gün süreyle sistemimize üye emlakçýlar tarafýndan görülebilecektir. Ýlginiz için teþekkür ederiz."; }
else 
 { echo "Talebiniz kaydedilirken bir hata oluþtu. [T43]<br>Sebep:".mysql_error(); }

mysql_close();
?>
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
