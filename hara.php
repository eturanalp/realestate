<?

session_start();
session_destroy();

$event=$_GET['__EVENT'];
$arg=$_GET['__ARGUMENT'];
if ($event == "il_no:degisti") 
   if ($arg == "html.php"){
	   include "html.php";
		 return;
		 }
	 else if 	 ($arg == "emlakara.php"){
	   include "emlakara.php";
		 return;	   
	   }

setlocale(LC_MONETARY, 'tr_TR');
	 
$basla=intval($_GET['basla']);
//if ((!isset($basla)) OR (empty($basla)))   $basla=0;
if (empty($_GET['siralan']))
   $siralan="tarih";
else
   $siralan=$_GET['siralan'];
if (empty($_GET['ascdesc']))
   $ascdesc="DESC";
else if (strtolower($_GET['ascdesc'])=="desc")
   $ascdesc="DESC";
else if (strtolower($_GET['ascdesc'])=="asc")
   $ascdesc="ASC";
else 
   $ascdesc="DESC";
	 	 
$ob="eklenme_zamani";
if ($siralan=="islem")
  $ob="islem_tipi";
else if ($siralan=="bolge")
  $ob="emlak.bolge";
else if ($siralan=="tip")
  $ob="tip_ozelligi";
else if ($siralan=="fiyat")
  $ob="fiyat";
else	
  $ob="eklenme_zamani";
	 	 
include "ayar.inc.php";
include "mysql.inc.php";
include "html.php";

if ($_GET['ara']=="Bu kriterlere göre Talep Býrak") {
  //echo "QS:".$_SERVER['QUERY_STRING'];	 
  include "talep_formu.php";
  echo "                      </td>
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
</table>";
  include "taban.php";
  echo "</body></html>";
	return;	
}

echo "
<script language=\"javascript\">
function ignoreSpaces(string){
	var temp = \"\";
	string = '' + string;
	splitstring = string.split(\" \");
	for(i = 0; i < splitstring.length; i++) temp += splitstring[i];
	return temp;
}

function emptyStringControl(str){
	if(ignoreSpaces(str).length==0) return true;
	else return false;
}

function validate(email){
	if (emptyStringControl(email)) {
		alert('E-mail adresinizi yazmadýnýz.');
		return false;
	}
	else if (talepformu.email.value != \"\" && talepformu.email.value.indexOf('@',0) == -1) {
		alert('Geçersiz e-posta adresi!');
		return false;
	}
	else {
		return true;
		}
}
</script>
";

//if ((!isset($_GET['islem'])) OR (empty($_GET['islem'])))
// HTML.php den gelen input
   $islem=$_GET['islem'];
   $il_no=intval($_GET['il_no']);
   $ilce_no=intval($_GET['ilce_no']);
   $p_bolge=strtr($_GET['bolge'],"ÝI","iý");
   $m2=intval($_GET['m2']);
   $p_fiyat=intval(str_replace(".", "", $_GET['fiyat']));
   $p_fiyat_birimi=$_GET['fiyat_birimi'];
// EMLAKARA.PHP den gelen kriterler:
$emlakara_krit="";
$emlakara_param_string="";
$p_tip_ozelligi=$_GET['tip_ozelligi'];
if (!empty($p_tip_ozelligi)){
	   $emlakara_krit .="AND tip_ozelligi='$p_tip_ozelligi' ";
	   $emlakara_param_string .="&tip_ozelligi=$p_tip_ozelligi";
	 	 }
if ($_GET['kaynak']=="emlakara") {
  $emlakara_param_string .="&kaynak=emlakara";
  $p_isitma_sistemi=$_GET['isitma_sistemi'];
  if (!empty($p_isitma_sistemi)){
	  $emlakara_krit .="AND isitma_sistemi='$p_isitma_sistemi' ";
	  $emlakara_param_string .="&isitma_sistemi=$p_isitma_sistemi";
		}		
  $p_islak_zeminler=$_GET['islak_zeminler'];
  if (!empty($p_islak_zeminler)){
	  $emlakara_krit .="AND islak_zeminler='$p_islak_zeminler' ";
	  $emlakara_param_string .="&islak_zeminler=$p_islak_zeminler";
		}		
  $p_bks1=intval($_GET['bks1']);
  if (!empty($p_bks1)){
	  $emlakara_krit .="AND binadaki_kat_sayisi>='$p_bks1' ";
	  $emlakara_param_string .="&bks1=$p_bks1";
		}		
  $p_bks2=intval($_GET['bks2']);
  if (!empty($p_bks2)){
	  $emlakara_krit .="AND binadaki_kat_sayisi<='$p_bks2' ";
	  $emlakara_param_string .="&bks2=$p_bks2";
		}		
  $p_b_kat1=intval($_GET['b_kat1']);
  if (!empty($p_b_kat1)){
	  $emlakara_krit .="AND bulundugu_kat>='$p_b_kat1' ";
	  $emlakara_param_string .="&b_kat1=$p_b_kat1";
		}		
  $p_b_kat2=intval($_GET['b_kat2']);
  if (!empty($p_b_kat2)){
	  $emlakara_krit .="AND bulundugu_kat<='$p_b_kat2' ";
	  $emlakara_param_string .="&b_kat2=$p_b_kat2";
		}		
  $p_os1=intval($_GET['os1']);
  if (!empty($p_os1)){
	  $emlakara_krit .="AND oda_sayisi>='$p_os1' ";
	  $emlakara_param_string .="&os1=$p_os1";
		}		
  $p_os2=intval($_GET['os2']);
  if (!empty($p_os2)){
	  $emlakara_krit .="AND oda_sayisi<='$p_os2' ";
	  $emlakara_param_string .="&os2=$p_os2";
		}		
  $p_sals=intval($_GET['sals']);
  if (!empty($p_sals)){
	  $emlakara_krit .="AND salon_sayisi='$p_sals' ";
	  $emlakara_param_string .="&sals=$p_sals";
		}				
  $p_bs1=floatval($_GET['bs1']);
  if (!empty($p_bs1)){
	  $emlakara_krit .="AND banyo_tuvalet_sayisi>='$p_bs1' ";
	  $emlakara_param_string .="&bs1=$p_bs1";
		}		
  $p_bs2=floatval($_GET['bs2']);
  if (!empty($p_bs2)){
	  $emlakara_krit .="AND banyo_tuvalet_sayisi<='$p_bs2' ";
	  $emlakara_param_string .="&bs2=$p_bs2";
		}
  if (($_GET['bati']=="Batý")||($_GET['dogu']=="Doðu")||($_GET['kuzey']=="Kuzey")||($_GET['guney']=="Güney")){
	  $cephe_krit="%";
    if ($_GET['bati']=="Batý") {$cephe_krit.="Batý%"; $emlakara_param_string .="&bati=Batý";}
    if ($_GET['dogu']=="Doðu") {$cephe_krit.="Doðu%"; $emlakara_param_string .="&dogu=Doðu";}
    if ($_GET['kuzey']=="Kuzey") {$cephe_krit.="Kuzey%"; $emlakara_param_string .="&kuzey=Kuzey";}
    if ($_GET['guney']=="Güney") {$cephe_krit.="Güney%"; $emlakara_param_string .="&guney=Güney";}
	  $emlakara_krit .="AND cephe like '$cephe_krit' ";
		}
  $p_aciklama=$_GET['aciklama'];
  if (!empty($p_aciklama)){
	  $emlakara_krit .="AND aciklama like '%$p_aciklama%' ";
	  $emlakara_param_string .="&aciklama=$p_aciklama";
		}	
  $p_adres=$_GET['adres'];
  if (!empty($p_adres)){
	  $emlakara_krit .="AND adres like '%$p_adres%' ";
	  $emlakara_param_string .="&adres=$p_adres";
		}		
  $p_emci=intval($_GET['emci']);
  if (!empty($p_emci)){
	  $emlakara_krit .="AND emlak.emlakci_no='$p_emci' ";
	  $emlakara_param_string .="&emci=$p_emci";
		}
  $p_fiyat1=intval(str_replace(".", "", $_GET['fiyat1']));
  $p_fiyat2=intval(str_replace(".", "", $_GET['fiyat2']));	
  if (!empty($p_fiyat1))
	  $emlakara_param_string .="&fiyat1=$p_fiyat1";
	if (!empty($p_fiyat2))
	  $emlakara_param_string .="&fiyat2=$p_fiyat2";	 	
  $p_m2_1=intval($_GET['m2_1']);
  $p_m2_2=intval($_GET['m2_2']);	
  if (!empty($p_m2_1))
	  $emlakara_param_string .="&m2_1=$p_m2_1";
	if (!empty($p_m2_2))
	  $emlakara_param_string .="&m2_2=$p_m2_2";	 	
	if ($_GET['ahsap']=="E") {$emlakara_krit.="AND ahsap='E' "; $emlakara_param_string .="&ahsap=E";}
	if ($_GET['ahsap_dograma']=="E") {$emlakara_krit.="AND ahsap_dograma='E' "; $emlakara_param_string .="&ahsap_dograma=E";}
	if ($_GET['asansor']=="E") {$emlakara_krit.="AND asansor='E' "; $emlakara_param_string .="&asansor=E";}
	if ($_GET['bahce']=="E") {$emlakara_krit.="AND bahce='E' "; $emlakara_param_string .="&bahce=E";}
	if ($_GET['betonarme']=="E") {$emlakara_krit.="AND betonarme='E' "; $emlakara_param_string .="&betonarme=E";}
	if ($_GET['celik_kapi']=="E") {$emlakara_krit.="AND celik_kapi='E' "; $emlakara_param_string .="&celik_kapi=E";}
	if ($_GET['deniz_manzarali']=="E") {$emlakara_krit.="AND deniz_manzarali='E' "; $emlakara_param_string .="&deniz_manzarali=E";}
	if ($_GET['denize_yakin']=="E") {$emlakara_krit.="AND denize_yakin='E' "; $emlakara_param_string .="&denize_yakin=E";}
	if ($_GET['doga_icinde']=="E") {$emlakara_krit.="AND doga_icinde='E' "; $emlakara_param_string .="&doga_icinde=E";}
	if ($_GET['doga_manzarali']=="E") {$emlakara_krit.="AND doga_manzarali='E' "; $emlakara_param_string .="&doga_manzarali=E";}
	if ($_GET['dogalgazli']=="E") {$emlakara_krit.="AND dogalgazli='E' "; $emlakara_param_string .="&dogalgazli=E";}
	if ($_GET['dusakabin']=="E") {$emlakara_krit.="AND dusakabin='E' "; $emlakara_param_string .="&dusakabin=E";}
	if ($_GET['esyali']=="E") {$emlakara_krit.="AND esyali='E' "; $emlakara_param_string .="&esyali=E";}
	if ($_GET['garaj_otopark']=="E") {$emlakara_krit.="AND garaj_otopark='E' "; $emlakara_param_string .="&garaj_otopark=E";}
	if ($_GET['gol_manzarali']=="E") {$emlakara_krit.="AND gol_manzarali='E' "; $emlakara_param_string .="&gol_manzarali=E";}
	if ($_GET['guvenlik']=="E") {$emlakara_krit.="AND guvenlik='E' "; $emlakara_param_string .="&guvenlik=E";}
	if ($_GET['jakuzi']=="E") {$emlakara_krit.="AND jakuzi='E' "; $emlakara_param_string .="&jakuzi=E";}
	if ($_GET['kat_mulkiyeti']=="E") {$emlakara_krit.="AND kat_mulkiyeti='E' "; $emlakara_param_string .="&kat_mulkiyeti=E";}
	if ($_GET['klima']=="E") {$emlakara_krit.="AND klima='E' "; $emlakara_param_string .="&klima=E";}
	if ($_GET['konak']=="E") {$emlakara_krit.="AND konak='E' "; $emlakara_param_string .="&konak=E";}
	if ($_GET['merkezi_havalandirma']=="E") {$emlakara_krit.="AND merkezi_havalandirma='E' "; $emlakara_param_string .="&merkezi_havalandirma=E";}
	if ($_GET['merkezi_isitma']=="E") {$emlakara_krit.="AND merkezi_isitma='E' "; $emlakara_param_string .="&merkezi_isitma=E";}
	if ($_GET['metroya_yakin']=="E") {$emlakara_krit.="AND metroya_yakin='E' "; $emlakara_param_string .="&metroya_yakin=E";}
	if ($_GET['mobilyali']=="E") {$emlakara_krit.="AND mobilyali='E' "; $emlakara_param_string .="&mobilyali=E";}
	if ($_GET['otoyola_yakin']=="E") {$emlakara_krit.="AND otoyola_yakin='E' "; $emlakara_param_string .="&otoyola_yakin=E";}
	if ($_GET['panjur']=="E") {$emlakara_krit.="AND panjur='E' "; $emlakara_param_string .="&panjur=E";}
	if ($_GET['pvc_dograma']=="E") {$emlakara_krit.="AND pvc_dograma='E' "; $emlakara_param_string .="&pvc_dograma=E";}
	if ($_GET['sauna']=="E") {$emlakara_krit.="AND sauna='E' "; $emlakara_param_string .="&sauna=E";}
	if ($_GET['sehir_manzarali']=="E") {$emlakara_krit.="AND sehir_manzarali='E' "; $emlakara_param_string .="&sehir_manzarali=E";}
	if ($_GET['somine']=="E") {$emlakara_krit.="AND somine='E' "; $emlakara_param_string .="&somine=E";}
	if ($_GET['toplu_ulasima_yakin']=="E") {$emlakara_krit.="AND toplu_ulasima_yakin='E' "; $emlakara_param_string .="&toplu_ulasima_yakin=E";}
	if ($_GET['tramvaya_yakin']=="E") {$emlakara_krit.="AND tramvaya_yakin='E' "; $emlakara_param_string .="&tramvaya_yakin=E";}
	if ($_GET['yali']=="E") {$emlakara_krit.="AND yali='E' "; $emlakara_param_string .="&yali=E";}
	if ($_GET['yali_dairesi']=="E") {$emlakara_krit.="AND yali_dairesi='E' "; $emlakara_param_string .="&yali_dairesi=E";}
	if ($_GET['yangin_merdiveni']=="E") {$emlakara_krit.="AND yangin_merdiveni='E' "; $emlakara_param_string .="&yangin_merdiveni=E";}
	if ($_GET['yazlik']=="E") {$emlakara_krit.="AND yazlik='E' "; $emlakara_param_string .="&yazlik=E";}
}
else {
    $emlakara_param_string .="&kaynak=html";
}

?>
			
<html>

<head>
<meta content=tr http-equiv=Content-Language>
<meta content="text/html; charset=ISO-8859-9" http-equiv=Content-Type>
<meta name="Author" content="EvBulur.com">
<meta name="Keywords" content="ev, mesken, konut, emlak, arsa, daire, satýlýk, kiralýk, villa, dükkan">
<meta name="Description" content="Aradýðýnýz evi burada bulursunuz.">
<meta name="Identifier-URL" content="http://www.evbulur.com">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1 day">
<title>EvBulur.com</title>
<link rel="stylesheet" href="images/style.css" type="text/css">
<script language="javascript" src="js/mouseover.js"></script>
</head>

<body>
<?

//include "kontrol.inc.php";
//include "menu.inc.php";

//echo "islem: $islem\n";
//echo "ilno: $il_no\n";
//echo "ilce: $ilce_no\n";
//echo "m2: $m2";
//echo "fiyat: $p_fiyat";
//echo "birim: $p_fiyat_birimi";
//echo "bolge: $p_bolge";
?>

<table border="1" width="100%" cellspacing="0" cellpadding="3">
<?
$ob_p=(empty($_GET['siralan']))?"":("&siralan=" . $_GET['siralan']);
if ($_GET['sutbas']=="E")
  $ascdesc_p= (empty($_GET['ascdesc']))?"&ascdesc=desc":((strtolower($_GET['ascdesc'])=="asc")?"&ascdesc=desc":"&ascdesc=asc");
$param_string="islem=$islem&il_no=$il_no&ilce_no=$ilce_no&bolge=$p_bolge&m2=$m2&fiyat=$p_fiyat&fiyat_birimi=$p_fiyat_birimi$ob_p$ascdesc_p";
$param_string.=$emlakara_param_string;

//echo $param_string;
echo "
    <td bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>F</b></font></td> 
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"hara.php?$param_string&siralan=tarih&sutbas=E\"><font color=\"#FF0000\"><b>Tarih</b></font></a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Emlakçý</b></font></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Ýþlem</b></font></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"hara.php?$param_string&siralan=bolge&sutbas=E\"><font color=\"#FF0000\"><b>Mahalle</b></font></a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"hara.php?$param_string&siralan=tip&sutbas=E\"><font color=\"#FF0000\"><b>Gayrimenkul</b></font></a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Net/Brüt</b></font></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"hara.php?$param_string&siralan=fiyat&sutbas=E\"><font color=\"#FF0000\"><b>Fiyat</b></font></a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Oda</b></font></td>
";
$i = 0;
//emlak.fiyat*para_birimi.$p_fiyat_birimi
if (((!isset($p_fiyat)) OR (empty($p_fiyat))) AND ((empty($p_fiyat1)) AND (empty($p_fiyat2)))) 
   $query="SELECT *, emlak.bolge as bolge FROM emlak, emlakci WHERE emlak.aktivite='Aktif' AND emlak.islem_tipi='$islem' AND emlak.il_no='$il_no' AND emlak.ilce_no='$ilce_no' AND emlak.emlakci_no=emlakci.emlakci_no ";
else
   $query="SELECT *, emlak.bolge as bolge FROM emlak, emlakci, para_birimi WHERE emlak.aktivite='Aktif' AND emlak.islem_tipi='$islem' AND emlak.il_no='$il_no' AND emlak.ilce_no='$ilce_no' AND emlak.emlakci_no=emlakci.emlakci_no AND emlak.fiyat_birimi=para_birimi.para_birimi ";
if ((isset($p_bolge)) AND (!empty($p_bolge))) $query.="AND emlak.bolge like '%$p_bolge%' ";
if (!empty($m2)) {
  $m2alt=$m2*8/10; $m2ust=$m2*12/10;
  $query.="AND ((emlak.brutm2>0 AND emlak.brutm2>='$m2alt' AND emlak.brutm2<='$m2ust') OR (emlak.netm2>0 AND emlak.netm2>='$m2alt' AND emlak.netm2<='$m2ust')) ";
	}
else if (!empty($p_m2_1)) { 
  $query.="AND ((emlak.brutm2>0 AND emlak.brutm2>='$p_m2_1') OR (emlak.netm2>0 AND emlak.netm2>='$p_m2_1')) "; 
  if (!empty($p_m2_2)) 
  $query.="AND ((emlak.brutm2>0 AND emlak.brutm2<='$p_m2_2') OR (emlak.netm2>0 AND emlak.netm2<='$p_m2_2')) ";
  } 
else if (!empty($p_m2_2)) 
  $query.="AND ((emlak.brutm2>0 AND emlak.brutm2<='$p_m2_2') OR (emlak.netm2>0 AND emlak.netm2<='$p_m2_2')) ";
if (!empty($p_fiyat)) {
  $fiyatalt=$p_fiyat*8/10; $fiyatust=$p_fiyat*12/10;
  $query.="AND (emlak.fiyat*para_birimi.$p_fiyat_birimi)>='$fiyatalt' AND (emlak.fiyat*para_birimi.$p_fiyat_birimi)<='$fiyatust' ";
  }
else if (!empty($p_fiyat1)) { 
  $query.="AND (emlak.fiyat*para_birimi.$p_fiyat_birimi)>='$p_fiyat1' "; //AND (emlak.fiyat*para_birimi.$p_fiyat_birimi)<='$fiyatust' ";
  if (!empty($p_fiyat2)) {
    $query.="AND (emlak.fiyat*para_birimi.$p_fiyat_birimi)<='$p_fiyat2' ";
		}
//	else {
//	  $fiyatust=$p_fiyat1*12/8;
//		$query.="AND (emlak.fiyat*para_birimi.$p_fiyat_birimi)<='$fiyatust' ";
//		}
  } 
else if (!empty($p_fiyat2)) {
  $query.="AND (emlak.fiyat*para_birimi.$p_fiyat_birimi)<='$p_fiyat2' ";
} 	
$query .= $emlakara_krit;
$query .= "ORDER BY $ob $ascdesc ";
if ($basla<100) $query .= "LIMIT $basla , $listeleme";
else $query .= "LIMIT 100,1";
//echo $query;
if ($qx = mysql_query($query)) {
  //echo "Basari";
  //echo mysql_error();
  }
else {
  echo "Sorgulama gerçekleþtirilemedi.";
  echo "<br> Sebep: ".mysql_error();
  }
$data=mysql_num_rows($qx);
//echo "rows:$data";
while($qq = mysql_fetch_array($qx)) {
  $emlakci = $qq['isim'];
  $emlak_no = $qq['emlak_no'];
  $aktivite = $qq['aktivite'];
  $eklenme_zamani=$qq['eklenme_zamani'];
  $tip1 = $qq['tip1'];
  $tip2 = $qq['tip2'];
  $tip_ozelligi = $qq['tip_ozelligi'];
  $islem_tipi = $qq['islem_tipi'];
  $adres = $qq['adres'];
  $il_no = $qq['il_no'];
  $ilce_no = $qq['ilce_no'];
  $semt_no = $qq['semt_no'];
  $bolge = $qq['bolge'];
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

  if (!((empty($netm2)) AND(empty($brutm2)))) $m2string="m<sup>2</sup>";
  if (empty($netm2)) $netm2="-";
  if (empty($brutm2)) $brutm2="-";
	echo "<a href=\"em.php?emlak_no=$emlak_no\">";
  if (mysql_fetch_array(mysql_query("SELECT * FROM foto WHERE emlak_no=$emlak_no")))
    echo "<tr style=\"cursor: hand\" onmouseover=\"this.style.background='#ccffcc';\" onmouseout=\"this.style.background='';\"><td><img src=\"images/camera.gif\" alt=\"Fotoðrafý mevcut !\" border=\"0\"></td>";
  else
    echo "<tr style=\"cursor: hand\" onmouseover=\"this.style.background='#ccffcc';\" onmouseout=\"this.style.background='';\"><td>&nbsp;</td>";
  echo "<td>";
	echo rtrim(date("d.m.y",strtotime($eklenme_zamani))) . "</td>";
  echo "<td>";
	$bolge30=substr($bolge,0,30);
  echo $emlakci . "</td>
    <td>$islem_tipi</td>
    <td>$bolge30 </td>
    <td>$tip_ozelligi</td>
    <td>$netm2/$brutm2 $m2string</td>
    <td>"; echo money_format('%!.0n', $fiyat) . " " . $fiyat_birimi . "</td>";
echo"<td>$oda_sayisi+$salon_sayisi</td>";
echo "  </tr></a>\n";

  $i++;
} // end of while
echo "</table>";
if (empty($data)) echo " <br>Verilen kriterlere uygun emlak kaydý bulunamadý. <br>";
echo "<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\">";
$onceki = $basla - $listeleme;
$sonraki = $basla + $listeleme;

if ($basla<=0)
  if ($data<$listeleme)
    echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\"></font></td></tr>";
  else
    echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\"></font> <font color=\"FF0000\">|</font> <a href=\"hara.php?basla=$sonraki&$param_string\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>";	  	      
else
  if ($data<$listeleme)
    echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"hara.php?basla=$onceki&$param_string\">Önceki</a> <font color=\"FF0000\">|</font> </td></tr>";
	else	
    echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"hara.php?basla=$onceki&$param_string\">Önceki</a> <font color=\"FF0000\">|</font> <a href=\"hara.php?basla=$sonraki&$param_string\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>";

echo "</table>";
if (($basla>99)&&($data>0)) {
  echo "<br />Belirtiðiniz arama kriterlerine uygun 100'ün üzerinde emlak ilaný bulundu.<br />
 Bunlar içinde ilk 100 adedi yukarýda listelenmiþtir. <br />
Aradýðýnýz nitelikteki emlaðý kolay bulabilmeniz için daha detaylý arama kriterleri belirterek arama yapmanýzý tavsiye 
ederiz. Örneðin mahalle, alan veya fiyat belirtebilirsiniz. Çýkan sonuçlarý dilediðiniz sütuna göre sýralamak için sütun 
baþýna týklayabilisiniz. Örneðin \"fiyat\"a týklarsanýz, sonuçlar fiyat sýralý gösterilecektir. 
<a href=\"emlakara.php?arama_help=Yes&basla=$onceki&$param_string\"> Emlak arama ile ilgili daha detaylý bilgi almak için týklayýnýz.<a/>";
  }
else if ($data<$listeleme){
  echo "<br />Aradýðýnýz özelliklerde $islem $p_tip_ozelligi bulamadýysanýz <b>talep býrakarak </b>üye emlak ofislerimizin 
	sizinle irtibata geçmelerini saglayabilirsiniz.<br /> <b>Talep býrakmak için</b> aþaðýdaki formu doldurmanýz yeterli olacaktýr.
	Elektronik posta (Email) adresi alanýný doldurmanýz zorunludur.<br />";
echo "
                      <form action=\"talep.php?basla=$onceki&$param_string\" method=\"POST\" name=\"talepformu\" onsubmit=\"return validate(self.document.talepformu.email.value);\">
                      <font color=\"#FF0000\"><b>Ýsminiz:</b></font><br>
                      <input type=\"text\" size=\"20\" name=\"talepci\"><br>
                      <font color=\"#FF0000\"><b>E-mail adresiniz:</b><br>
                      <input type=\"text\" size=\"40\" name=\"email\">*</font><br>
                      <font color=\"#FF0000\"><b>Telefon:</b></font><br>
                      <input type=\"text\" size=\"40\" name=\"tel\"><br>																					
                      <font color=\"#FF0000\"><b>Talebinizle ilgili Detay/Açýklama:</b></font><br>
                      <textarea name=\"detay\" rows=\"4\" cols=\"40\" wrap=\"virtual\"></textarea><br>
                      <br>Talep Býrak tuþuna basýnca son yaptýðýnýz arama kriterleri talebinizle birlikte kaydedilecektir.<br>
                      <input type=\"submit\" value=\"Talep Býrak\"> 
       </form>
";
}
if ($_GET['kaynak']=="emlakara") 
  echo "<br /><font color=\"CCCCCC\" ><a href=\"emlakara.php?basla=$onceki&$param_string\"> «« Arama Formuna Geri Dön</a></font>";
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
<? 
if (!(mysql_query("INSERT INTO aramalar VALUES (CURRENT_TIMESTAMP,'" . $il_no . "','" . $ilce_no . "','" . $p_bolge . "','" . $_SERVER["REMOTE_ADDR"] ."','" . $islem ."')"))){
  error_log("\n" . date("d.m.Y H:i") . "---Hata:" . mysql_errno() . ": " . mysql_error() , 3, "mysql_hatalari.log");
}
//mysql_close();
 ?>