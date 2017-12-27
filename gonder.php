<?
// Bu dosya EMLAK tablosundaki veriyi deðiþtirir

$event=$_POST['__EVENT'];
$arg=$_POST['__ARGUMENT'];
if ($event == "il_no:degisti") {
   if ($arg == "emlakci_degistir")
	   include "emlakci_degistir.php";
   else if ($arg == "emlak_degistir")
	   include "emlak_degistir.php";
   else //echo "Emlak Ekleye yönlendiriyorum..";
     include "emlak_ekle.php";
   }
else {
include "kontrol.inc.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "html.php";
include "menu.inc.php";

function sahip($eno,$emlakci){
if(mysql_fetch_array(mysql_query("SELECT * FROM emlak WHERE emlak_no='$eno' AND emlakci_no='$emlakci'")))
  return true;
else 
  return false;	
}

// Ýlaný çýkar, pasif yap
if (($_GET['isl']== "cikar") AND (!empty($_GET['emlak_no']))) {
  $emlak_no=intval($_GET['emlak_no']);
	if (!(sahip($emlak_no,$_SESSION['kullanici_emlakci_no']))) {
    echo "No authorization. \n Emlak kaydý deðiþtirilemedi.";
		return;	
		}
	if (!(sahip($emlak_no,$_SESSION['kullanici_emlakci_no']))) {
    echo "No authorization. \n Emlak kaydý deðiþtirilemedi.";
		}
  else if(mysql_query("UPDATE emlak SET aktivite='Pasif' WHERE emlak_no='$emlak_no'")){
     echo "<a href=\"emlak.php?emlak_no=$emlak_no\"> $emlak_no ilan numaralý </a> emlak kaydý internet ilan sayfalarýndan çýkarýldý.<br />";
     echo "Dilediðinizde Emlak Deðiþtirme formundaki Aktif seçeneðini seçerek ilan durumunu geri aktif yapabilirsiniz.";
     }
  else {
     echo "Emlak kaydý deðiþtirilemedi.";
     echo "<br> Sebep: ".mysql_error();
     }	
	return;	 
  }

// ÝÞLEM=sil
if (($_GET['isl']== "sil") AND (!empty($_GET['emlak_no']))) {
  $emlak_no=intval($_GET['emlak_no']);
	if (!(sahip($emlak_no,$_SESSION['kullanici_emlakci_no']))) {
    echo "No authorization. \n Emlak kaydý deðiþtirilemedi.";
		return;	
		}	
	if (!mysql_query("insert into DEL_emlak select * from emlak where emlak_no=$emlak_no"))
	     echo "<a href=\"emlak.php?emlak_no=$emlak_no\"> $emlak_no ilan numaralý </a> emlak kaydý aktarýlamadý. ";
  if (mysql_query("DELETE FROM emlak WHERE emlak_no=$emlak_no")){
      echo "<a href=\"emlak.php?emlak_no=$emlak_no\"> $emlak_no ilan numaralý </a> emlak kaydý silindi. ";
      }
  else {
       echo "Emlak kaydý silinemedi.";
       echo "<br> Sebep: ".mysql_error();
       }	 	
	return;	 
  }
	
$_SESSION['s_il_no']=$_POST['il_no'];
$_SESSION['s_ilce_no']=$_POST['ilce_no'];
$form_tipi = $_POST['form_tipi'];
$emlak_no = $_POST['emlak_no'];
//echo "ENO:$emlak_no";
$aktivite = $_POST['aktivite'];
$tip1 = $_POST['tip1'];
$tip2 = $_POST['tip2'];
$tip_ozelligi = $_POST['tip_ozelligi'];
$islem_tipi = $_POST['islem_tipi'];
$adres = $_POST['adres'];
$il_no = $_POST['il_no'];
$ilce_no = $_POST['ilce_no'];
$bolge = strtr($_POST['bolge'],"ÝI","iý");  // i ve ý harflerinin küçük ve büyükleri karþýlaþtýrýldýðýnda MYSQL ayný olmadýklarýný düþünüyor; o nedenle Ý ve I larý küçültüyoruz. Arama yaparken de küçülteceðiz(hara.php) 
if ($bolge != "") $_SESSION['s_bolge']=$bolge;
$fiyat = str_replace(".", "", $_POST['fiyat']); 
$fiyat_birimi = $_POST['fiyat_birimi'];
$brutm2 = $_POST['brutm2'];
$netm2 = $_POST['netm2'];
$yapi_durumu = $_POST['yapi_durumu'];
$isitma_sistemi = $_POST['isitma_sistemi'];
$binadaki_kat_sayisi = $_POST['binadaki_kat_sayisi'];
$bulundugu_kat = $_POST['bulundugu_kat'];
$oda_sayisi = $_POST['oda_sayisi'];
$salon_sayisi = $_POST['salon_sayisi'];
$balkon_sayisi = $_POST['balkon_sayisi'];
$banyo_tuvalet_sayisi = $_POST['banyo_tuvalet_sayisi'];
$islak_zeminler = $_POST['islak_zeminler'];
$dogu = $_POST['dogu'];
if ($dogu != "Doðu") { $dogu = "-"; }
$bati = $_POST['bati'];
if ($bati != "Batý") { $bati = "-"; }
$kuzey = $_POST['kuzey'];
if ($kuzey != "Kuzey") { $kuzey = "-"; }
$guney = $_POST['guney'];
if ($guney != "Güney") { $guney = "-"; }
$cephe = "$dogu, $bati, $kuzey, $guney";
$aciklama = $_POST['aciklama'];
$ahsap = $_POST['ahsap'];
if ($ahsap == "E") {} else { $ahsap = "H"; }
$betonarme = $_POST['betonarme'];
if ($betonarme == "E") {} else { $betonarme = "H"; }
$doga_icinde = $_POST['doga_icinde'];
if ($doga_icinde == "E") {} else { $doga_icinde = "H"; }
$jakuzi = $_POST['jakuzi'];
if ($jakuzi == "E") {} else { $jakuzi = "H"; }
$konak = $_POST['konak'];
if ($konak == "E") {} else { $konak = "H"; }
$tramvaya_yakin = $_POST['tramvaya_yakin'];
if ($tramvaya_yakin == "E") {} else { $tramvaya_yakin = "H"; }
$PVC_dograma = $_POST['PVC_dograma'];
if ($PVC_dograma == "E") {} else { $PVC_dograma = "H"; }
$sauna = $_POST['sauna'];
if ($sauna == "E") {} else { $sauna = "H"; }
$ahsap_dograma = $_POST['ahsap_dograma'];
if ($ahsap_dograma == "E") {} else { $ahsap_dograma = "H"; }
$celik_kapi = $_POST['celik_kapi'];
if ($celik_kapi == "E") {} else { $celik_kapi = "H"; }
$doga_manzarali = $_POST['doga_manzarali'];
if ($doga_manzarali == "E") {} else { $doga_manzarali = "H"; }
$garaj_otopark = $_POST['garaj_otopark'];
if ($garaj_otopark == "E") {} else { $garaj_otopark = "H"; }
$kat_mulkiyeti = $_POST['kat_mulkiyeti'];
if ($kat_mulkiyeti == "E") {} else { $kat_mulkiyeti = "H"; }
$merkezi_havalandirma = $_POST['merkezi_havalandirma'];
if ($merkezi_havalandirma == "E") {} else { $merkezi_havalandirma = "H"; }
$esyali = $_POST['esyali'];
if ($esyali == "E") {} else { $esyali = "H"; }
$mobilyali = $_POST['mobilyali'];
if ($mobilyali == "E") {} else { $mobilyali = "H"; }
$toplu_ulasima_yakin = $_POST['toplu_ulasima_yakin'];
if ($toplu_ulasima_yakin == "E") {} else { $toplu_ulasima_yakin = "H"; }
$yali_dairesi = $_POST['yali_dairesi'];
if ($yali_dairesi == "E") {} else { $yali_dairesi = "H"; }
$asansor = $_POST['asansor'];
if ($asansor == "E") {} else { $asansor = "H"; }
$deniz_manzarali = $_POST['deniz_manzarali'];
if ($deniz_manzarali == "E") {} else { $deniz_manzarali = "H"; }
$dogalgazli = $_POST['dogalgazli'];
if ($dogalgazli == "E") {} else { $dogalgazli = "H"; }
$gol_manzarali = $_POST['gol_manzarali'];
if ($gol_manzarali == "E") {} else { $gol_manzarali = "H"; }
$klima = $_POST['klima'];
if ($klima == "E") {} else { $klima = "H"; }
$metroya_yakin = $_POST['metroya_yakin'];
if ($metroya_yakin == "E") {} else { $metroya_yakin = "H"; }
$otoyola_yakin = $_POST['otoyola_yakin'];
if ($otoyola_yakin == "E") {} else { $otoyola_yakin = "H"; }
$sehir_manzarali = $_POST['sehir_manzarali'];
if ($sehir_manzarali == "E") {} else { $sehir_manzarali = "H"; }
$yangin_merdiveni = $_POST['yangin_merdiveni'];
if ($yangin_merdiveni == "E") {} else { $yangin_merdiveni = "H"; }
$bahce = $_POST['bahce'];
if ($bahce == "E") {} else { $bahce = "H"; }
$denize_yakin = $_POST['denize_yakin'];
if ($denize_yakin == "E") {} else { $denize_yakin = "H"; }
$dusakabin = $_POST['dusakabin'];
if ($dusakabin == "E") {} else { $dusakabin = "H"; }
$guvenlik = $_POST['guvenlik'];
if ($guvenlik == "E") {} else { $guvenlik = "H"; }
$yazlik = $_POST['yazlik'];
if ($yazlik == "E") {} else { $yazlik = "H"; }
$panjur = $_POST['panjur'];
if ($panjur == "E") {} else { $panjur = "H"; }
$somine = $_POST['somine'];
if ($somine == "E") {} else { $somine = "H"; }
$merkezi_isitma = $_POST['merkezi_isitma'];
if ($merkezi_isitma == "E") {} else { $merkezi_isitma = "H"; }
$yali = $_POST['yali'];
if ($yali == "E") {} else { $yali = "H"; }
$eklenme_zamani = date ("Y-m-d H:i:s");

$emlakci_no = intval($_POST['emlakci_no']);
if ($_SESSION['kullanici_emlakci_no']>0) 
   $emlakci_no = $_SESSION['kullanici_emlakci_no']; 
$isim = $_POST['isim'];
$adi = $_POST['adi'];
$soyadi = $_POST['soyadi'];
$email = $_POST['email'];
$adres_satiri1 = $_POST['adres_satiri1'];
$adres_satiri2 = $_POST['adres_satiri2'];
$is_tel = $_POST['is_tel'];
$cep_tel = $_POST['cep_tel'];
$is_tel2 = $_POST['is_tel2'];
$cep_tel2 = $_POST['cep_tel2'];

if($form_tipi == "emlakekle"){
  $eno=rand(1,2000000000); // 2 milyar
  if(mysql_query("INSERT INTO emlak (emlak_no,emlakci_no,aktivite,tip1,tip2,tip_ozelligi,islem_tipi,adres,il_no,ilce_no,bolge,fiyat,fiyat_birimi,brutm2,netm2,yapi_durumu,isitma_sistemi,binadaki_kat_sayisi,bulundugu_kat,oda_sayisi,salon_sayisi,balkon_sayisi,banyo_tuvalet_sayisi,islak_zeminler,cephe,aciklama,ahsap,betonarme,doga_icinde,jakuzi,konak,tramvaya_yakin,PVC_dograma,sauna,ahsap_dograma,celik_kapi,doga_manzarali,garaj_otopark,kat_mulkiyeti,merkezi_havalandirma,mobilyali,esyali,toplu_ulasima_yakin,yali_dairesi,asansor,deniz_manzarali,dogalgazli,gol_manzarali,klima,metroya_yakin,otoyola_yakin,sehir_manzarali,yangin_merdiveni,bahce,denize_yakin,dusakabin,guvenlik,yazlik,panjur,somine,merkezi_isitma,yali,eklenme_zamani) VALUES ('$eno','$emlakci_no','$aktivite','$tip1','$tip2','$tip_ozelligi','$islem_tipi','$adres','$il_no','$ilce_no','$bolge','$fiyat','$fiyat_birimi','$brutm2','$netm2','$yapi_durumu','$isitma_sistemi','$binadaki_kat_sayisi','$bulundugu_kat','$oda_sayisi','$salon_sayisi','$balkon_sayisi','$banyo_tuvalet_sayisi','$islak_zeminler','$cephe','$aciklama','$ahsap','$betonarme','$doga_icinde','$jakuzi','$konak','$tramvaya_yakin','$PVC_dograma','$sauna','$ahsap_dograma','$celik_kapi','$doga_manzarali','$garaj_otopark','$kat_mulkiyeti','$merkezi_havalandirma','$mobilyali','$esyali','$toplu_ulasima_yakin','$yali_dairesi','$asansor','$deniz_manzarali','$dogalgazli','$gol_manzarali','$klima','$metroya_yakin','$otoyola_yakin','$sehir_manzarali','$yangin_merdiveni','$bahce','$denize_yakin','$dusakabin','$guvenlik','$yazlik','$panjur','$somine','$merkezi_isitma','$yali','$eklenme_zamani')")){
    //include "\'emlak.php?emlak_no=" . "$eno\'";
    echo "Emlak kaydý baþarýyla eklendi. <b>Emlak ilan numarasý:</b> <a href=\"emlak.php?emlak_no=$eno\">$eno</a> ";
    if (strlen($aciklama)>245)
		  if (!(mysql_query("INSERT INTO `emlak_detay` ( `emlak_no` , `aciklama_html`) VALUES ('$eno', '$aciklama')")))
        echo "<br /> Ancak açýklama alanýnýn yazýlmasýnda bir problem oluþtu . Lütfen sistem yöneticisine durumu iletiniz. ".mysql_error();
		}
  else {
    echo "Emlak kaydý eklenemedi.";
    //echo "<br> Sebep: ".mysql_error();
    }
  }
	
// Emlak KAydý Deðiþtir
if($form_tipi == "emlakdegistir"){
	if (!(sahip($emlak_no,$_SESSION['kullanici_emlakci_no']))) {
    echo "No authorization. \n Emlak kaydý deðiþtirilemedi.[Gonder_U20]";
		return;	
		}	
  if(mysql_query("UPDATE emlak SET aktivite='$aktivite',tip1='$tip1',tip2='$tip2',tip_ozelligi='$tip_ozelligi',islem_tipi='$islem_tipi',adres='$adres',il_no='$il_no',ilce_no='$ilce_no',bolge='$bolge',fiyat='$fiyat',fiyat_birimi='$fiyat_birimi',brutm2='$brutm2',netm2='$netm2',yapi_durumu='$yapi_durumu',isitma_sistemi='$isitma_sistemi',binadaki_kat_sayisi='$binadaki_kat_sayisi',bulundugu_kat='$bulundugu_kat',oda_sayisi='$oda_sayisi',salon_sayisi='$salon_sayisi',balkon_sayisi='$balkon_sayisi',banyo_tuvalet_sayisi='$banyo_tuvalet_sayisi',islak_zeminler='$islak_zeminler',cephe='$cephe',aciklama='$aciklama',ahsap='$ahsap',betonarme='$betonarme',doga_icinde='$doga_icinde',jakuzi='$jakuzi',konak='$konak',tramvaya_yakin='$tramvaya_yakin',PVC_dograma='$PVC_dograma',sauna='$sauna',ahsap_dograma='$ahsap_dograma',celik_kapi='$celik_kapi',doga_manzarali='$doga_manzarali',garaj_otopark='$garaj_otopark',kat_mulkiyeti='$kat_mulkiyeti',merkezi_havalandirma='$merkezi_havalandirma',mobilyali='$mobilyali',esyali='$esyali',toplu_ulasima_yakin='$toplu_ulasima_yakin',yali_dairesi='$yali_dairesi',asansor='$asansor',deniz_manzarali='$deniz_manzarali',dogalgazli='$dogalgazli',gol_manzarali='$gol_manzarali',klima='$klima',metroya_yakin='$metroya_yakin',otoyola_yakin='$otoyola_yakin',sehir_manzarali='$sehir_manzarali',yangin_merdiveni='$yangin_merdiveni',bahce='$bahce',denize_yakin='$denize_yakin',dusakabin='$dusakabin',guvenlik='$guvenlik',yazlik='$yazlik',panjur='$panjur',somine='$somine',merkezi_isitma='$merkezi_isitma',yali='$yali' WHERE emlak_no='$emlak_no'")){ 
    echo "<a href=\"emlak.php?emlak_no=$emlak_no\"><b>$emlak_no ilan numaralý</b></a> emlak kaydý deðiþtirildi. ";
		if (strlen($aciklama)>245)
		  if (!(mysql_query("UPDATE `emlak_detay` SET aciklama_html='$aciklama' WHERE emlak_no='$emlak_no' LIMIT 1")))
        echo "<br /> Ancak açýklama alanýnýn yazýlmasýnda bir problem oluþtu . Lütfen sistem yöneticisine durumu iletiniz. ".mysql_error();
    //echo mysql_error();
    }
  else {
    echo "Emlak kaydý deðiþtirilemedi.[Gonder_H21]";
    //echo "<br> Sebep: ".mysql_error();
    }
  }

/*
if($form_tipi == "emlakciekle")
{
if(mysql_query("INSERT INTO emlakci (emlakci_no,isim,adi,soyadi,adres_satiri1,adres_satiri2,il_no,ilce_no,bolge,is_tel,cep_tel) VALUES (null,'$isim','$adi','$soyadi','$adres_satiri1','$adres_satiri2','$il_no','$ilce_no','$bolge','$is_tel','$cep_tel')"))
{
echo "Emlakçý kaydý eklendi.";
echo mysql_error();
}
else {
echo "Emlakçý kaydý eklenemedi.";
echo "<br> Sebep: ".mysql_error();
}
}
*/

if (($form_tipi == "emlakcidegistir") AND ($_SESSION['kullanici_emlakci_no']==$emlakci_no))
{
if(mysql_query("UPDATE emlakci SET isim='$isim',adi='$adi',soyadi='$soyadi',email='$email',adres_satiri1='$adres_satiri1',adres_satiri2='$adres_satiri2',il_no='$il_no',ilce_no='$ilce_no',bolge='$bolge',is_tel='$is_tel',cep_tel='$cep_tel',is_tel2='$is_tel2',cep_tel2='$cep_tel2' WHERE emlakci_no='$emlakci_no'"))
{
echo "Emlakçý kaydý deðiþtirildi.";
//echo mysql_error();
}
else {
echo "Emlakçý kaydý deðiþtirilemedi.";
echo "<br> Sebep: ".mysql_error();
}
}
}
?>