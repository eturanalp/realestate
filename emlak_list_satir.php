<?
include "kontrol.inc.php";
setlocale(LC_MONETARY, 'tr_TR');
$yaricilt=5;  // Bir cilt 11 sayfa
$basla=$_GET['basla'];
//if ((!isset($basla)) OR (empty($basla)))  $basla=1;
$basla=intval($basla);
if (empty($_GET['siralan'])){
   $_SESSION['siralan']="tarih";
	 $_SESSION['ascdesc']="DESC";
	 }
else {
	 if (($_GET['bas']=="OK") && ($_SESSION['siralan']==$_GET['siralan']))
	    if ($_SESSION['ascdesc']=="DESC")
			 	 $_SESSION['ascdesc']="";
	    else
	     	 $_SESSION['ascdesc']="DESC";
   $_SESSION['siralan']=$_GET['siralan'];
	 }   	 
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";
?>

<?
$qx = mysql_query("SELECT * FROM emlak, emlakci WHERE emlak.emlakci_no='" . $_SESSION['kullanici_emlakci_no'] . "' AND emlak.emlakci_no=emlakci.emlakci_no ");
$nrows=mysql_num_rows($qx);
echo "Portföyünüzdeki Emlak Sayýsý: $nrows <br><br>"; 


$ob="eklenme_zamani";
if ($_SESSION['siralan']=="islem")
  $ob="islem_tipi";
else if ($_SESSION['siralan']=="bolge")
  $ob="emlak.bolge";
else if ($_SESSION['siralan']=="tip")
  $ob="tip_ozelligi";
else if ($_SESSION['siralan']=="fiyat")
  $ob="fiyat";
else	
  $ob="eklenme_zamani";
$limit=$listeleme * ($yaricilt + 1);	
$query="SELECT *, emlak.bolge as embol FROM emlak, emlakci WHERE emlak.emlakci_no='" . $_SESSION['kullanici_emlakci_no'] . "' AND emlak.emlakci_no=emlakci.emlakci_no ";
$query .= "ORDER BY $ob " . $_SESSION['ascdesc'] . " ";
$query .= "LIMIT $basla , $limit";
$qx = mysql_query($query);
$data=mysql_num_rows($qx);

echo "<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\">";
echo "<font color=\"#FF0000\"><b>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><b>F</b></td> 
    <td bgcolor=\"#E1F0FF\" align=\"center\"><b>A</b></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"emlak_list_satir.php?siralan=tarih&bas=OK\">Ýlan tarihi </a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"emlak_list_satir.php?siralan=islem&bas=OK\">Ýþlem</a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"emlak_list_satir.php?siralan=bolge&bas=OK\">Mahalle</a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"emlak_list_satir.php?siralan=tip&bas=OK\">Gayrimenkul</a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\">Net/Brüt</td>
    <td bgcolor=\"#E1F0FF\" align=\"center\"><a href=\"emlak_list_satir.php?siralan=fiyat&bas=OK\">Fiyat</a></td>
    <td bgcolor=\"#E1F0FF\" align=\"center\">Oda</td>
    </b></font>
";
$i = 0;
while(($qq = mysql_fetch_array($qx))&&($i<$listeleme))
{
$emlakci = $qq['isim'];
$emlak_no = $qq['emlak_no'];
$aktivite = $qq['aktivite'];
//$ekz = $qq['ekz']; //bunu kullanmýyoruz 
$eklenme_zamani=$qq['eklenme_zamani'];
$tip1 = $qq['tip1'];
$tip2 = $qq['tip2'];
$tip_ozelligi = $qq['tip_ozelligi'];
$islem_tipi = $qq['islem_tipi'];
$adres = $qq['adres'];
$il_no = $qq['emlak.il_no'];
$ilce_no = $qq['emlak.ilce_no'];
$semt_no = $qq['emlak.semt_no'];
$bolge = $qq['embol'];
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

if (!((empty($netm2)) AND(empty($brutm2)))) $m2string="m<sup>2</sup>";
if (empty($netm2)) $netm2="-";
if (empty($brutm2)) $brutm2="-";
if (mysql_fetch_array(mysql_query("SELECT * FROM foto WHERE emlak_no=$emlak_no")))
  echo "<tr onmouseover=\"this.style.background='#ccffcc';\" onmouseout=\"this.style.background='';\"><td><a href=\"emlak.php?emlak_no=$emlak_no\"><img src=\"images/camera.gif\" alt=\"Fotoðrafý mevcut !\" border=\"0\"></a></td>";
else
  echo "<tr onmouseover=\"this.style.background='#ccffcc';\" onmouseout=\"this.style.background='';\"><td></td>";
if ($aktivite == "Aktif")
  echo "<td><a href=\"emlak.php?emlak_no=$emlak_no\"><img src=\"images/active.gif\" alt=\"Aktif:Bu ilan internette!\" border=\"0\"></a></td>";
else
  echo "<td></td>";
echo "<td><a href=\"emlak.php?emlak_no=$emlak_no\">";
$bolge30=substr($bolge,0,30);
echo rtrim(date("d.m.y",strtotime($eklenme_zamani))) . "</a></td>
    <td><a href=\"emlak.php?emlak_no=$emlak_no\">$islem_tipi</a></td>
    <td><a href=\"emlak.php?emlak_no=$emlak_no\">$bolge30</a></td>
    <td><a href=\"emlak.php?emlak_no=$emlak_no\">$tip_ozelligi</a></td>
    <td><a href=\"emlak.php?emlak_no=$emlak_no\">$netm2/$brutm2 $m2string</a></td>
    <td><a href=\"emlak.php?emlak_no=$emlak_no\">"; echo money_format('%!.0n', $fiyat) . " " . $fiyat_birimi . "</a></td>
    <td><a href=\"emlak.php?emlak_no=$emlak_no\">$oda_sayisi+$salon_sayisi</a></td>
  </tr>\n
";

$i++;
} // while
//echo "rows: $data";
$ob=$_SESSION['siralan'];
echo "<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\">";
$index="";
$onceki = $basla - $listeleme;
$sonraki = $basla + $listeleme;
if ($basla<=0)
  if ($data<$listeleme)
    echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\">« Önceki | Sonraki »</font></td></tr>";
  else {
	  $index="[1]" ;	 
    for($j=2; (($j-1)<($data/$listeleme)) ; $j=$j+1) {
		   $bb=($j-1)*$listeleme;
			 $index=$index . "  " . "<a href=\"emlak_list_satir.php?basla=$bb&siralan=$ob\">" . $j . "</a>";
			 } 
		echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\">« Önceki</font> <font color=\"FF0000\">|</font>   $index   <font color=\"FF0000\">|</font> <a href=\"emlak_list_satir.php?basla=$sonraki&siralan=$ob\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>";	
		}	  	      
else
  if ($data<$listeleme){
	  $jj=(($basla-($listeleme*$yaricilt))<=0)?1:(($basla/$listeleme)-$yaricilt);
    for($j=$jj; (($j-1)<($basla/$listeleme)) ; $j=$j+1) {
		   $bb=($j-1)*$listeleme;
			 $index=$index . "  " . "<a href=\"emlak_list_satir.php?basla=$bb&siralan=$ob\">" . $j . "</a>";
			 }  
		$index=$index . "  [" . (($basla/$listeleme)+1) . "]" ;	   
		echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"emlak_list_satir.php?basla=$onceki&siralan=$ob\">Önceki</a> <font color=\"FF0000\">|</font>  $index   <font color=\"FF0000\">|</font> <font color=\"#CCCCCC\">Sonraki »</font></td></tr>";
		}
	else	{
	  $jj=(($basla-($listeleme*$yaricilt))<=0)?1:(($basla/$listeleme)-$yaricilt);
    for($j=$jj; (($j-1)<($basla/$listeleme)) ; $j=$j+1) {
		   $bb=($j-1)*$listeleme;
			 $index=$index . "  " . "<a href=\"emlak_list_satir.php?basla=$bb&siralan=$ob\">" . $j . "</a>";
			 }   
		$index=$index . "  [" . (($basla/$listeleme)+1) . "]" ;	  
    for($j=($basla/$listeleme)+1; ($j<(($basla+$data)/$listeleme)) ; $j=$j+1) {
		   $bb=($j)*$listeleme; 
			 $index=$index . "  " . "<a href=\"emlak_list_satir.php?basla=$bb&siralan=$ob\">" . ($j+1) . "</a>";
			 }     
		echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"emlak_list_satir.php?basla=$onceki&siralan=$ob\">Önceki</a> <font color=\"FF0000\">|</font> $index <font color=\"FF0000\">|</font> <a href=\"emlak_list_satir.php?basla=$sonraki&siralan=$ob\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>";	 
		}
//if ($onceki+1 < 0 AND $data < $listeleme+1) { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\">« Önceki | Sonraki »</font></td></tr>"; }

//elseif ($onceki+1 < 0) { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"#000000\">« Önceki</font> <font color=\"FF0000\">|</font> <a href=\"emlak_list_satir.php?basla=$sonraki\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>"; }

//elseif ($data > $sonraki+1) { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"emlak_list_satir.php?basla=$onceki\">Önceki</a> <font color=\"FF0000\">|</font> <a href=\"emlak_list_satir.php?basla=$sonraki\">Sonraki</a> <font color=\"FF0000\">»</font></td></tr>"; }

//else { echo "<tr><td width=\"100%\" bgcolor=\"#E1F0FF\" align=\"center\" valign=\"bottom\" colspan=\"2\"><font color=\"FF0000\">«</font> <a href=\"emlak_list_satir.php?basla=$onceki\">Önceki</a> <font color=\"FF0000\">|</font> <font color=\"#CCCCCC\">Sonraki »</font></td></tr>"; }

echo "</table>";
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
