<?  
session_start();
session_destroy();
setlocale(LC_MONETARY, 'tr_TR');
include "ayar.inc.php";
include "mysql.inc.php";
$vitrin=5; //vitrindeki resim sayýsý

// EMLAK VÝTRÝNÝ BÝLGÝLERÝNÝ [vitrin] tablosundan oku
if (!($qx = mysql_query("SELECT * FROM vitrin, foto, emlak WHERE emlak.emlak_no=vitrin.emlak_no AND vitrin.emlak_no=foto.emlak_no AND vitrin.foto_isim=foto.isim LIMIT 0,10" ))) {
  echo "Veriye ulaþmada bir sorun oluþtu. Vitrin görüntülenemedi.[V001]";
	  //echo "<br> Sebep: ".mysql_error();
	return;
  }
	
for ($j=0;$j<$vitrin;$j++){	
  if (!mysql_data_seek($qx, rand(0,mysql_num_rows($qx)-1))) {
			 echo "Resim Bulunamadý \n";
       continue;
   }
	if ($qq = mysql_fetch_array($qx)){
    $emlak_no[$j] = $qq['emlak_no'];
  	$ozet[$j] = $qq['ozet'];
  	$path[$j] = $qq['path'];
	  $alt_satir[$j] = $qq['alt_satir'];
	  }
	for ($i=0;$i<$j;$i++) if  ($emlak_no[$i]==$emlak_no[$j])	$j--;
  }	 
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
<tr>
<td width="100%" align="center"><font class="spot" color="#CC3300"><b>- EMLAK VÝTRÝNÝ -</font></td>
</tr>
<tr>
<td width="100%" height="20"></td>
</tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
<tr>
<td width="33%" align="center" valign="top"><a href="em.php?emlak_no=<? echo $emlak_no[1]; ?>">
<img alt="<?=$ozet[1] ?>" src="http://www.evbulur.com/<?=$path[1] ?>" height="150" width="150" />
<br /> <?=$alt_satir[1] ?></a></td>
<td width="34%" align="center" valign="top"><a href="em.php?emlak_no=<?=$emlak_no[2] ?>"><img alt="<?=$ozet[2] ?>" src="http://www.evbulur.com/<?=$path[2] ?>" height="150" width="150" />
<br /><?=$alt_satir[2]?></a></td>
<td width="33%" align="center"  valign="top"><a href="em.php?emlak_no=<?=$emlak_no[3] ?>"><img alt="<?=$ozet[3] ?>" src="http://www.evbulur.com/<?=$path[3] ?>" height="150" width="150" />
<br /><?=$alt_satir[3]?></a></td>
</tr>
<tr>
<td width="33%" align="center" valign="top">&nbsp;</td>
<td width="34%" align="center" valign="top">&nbsp;</td>
<td width="33%" align="center"  valign="top">&nbsp;</td>
</tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
<tr>
<td width="100%" height="30"></td>
</tr>
<tr>
<td width="100%" align="center"><font class="spot" color="#CC3300"><b>- EN YENÝ GAYRÝMENKUL ÝLANLARI -</font></td>
</tr>
<tr>
<td width="100%" height="20"></td>
</tr>
</table>
<table border="1" width="100%" cellspacing="0" cellpadding="2">
<?
//$il_no=42;
//$param_string="il_no=$il_no";
echo "
  <tr>
    <td width=\"20\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>F</b></font></td> 
    <td width=\"160\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Emlak Ofisi</font></b></td>
    <td width=\"60\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Ýþlem</b></font></td>
    <td width=\"120\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Mahalle</b></font></td>
    <td width=\"120\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Gayrimenkul</b></font></td>
    <td width=\"120\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Net/Brüt</b></font></td>
    <td width=\"120\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Fiyat</b></font></td>
    <td width=\"60\" bgcolor=\"#E1F0FF\" align=\"center\"><font color=\"#FF0000\"><b>Oda</b></font></td>
  </tr>
";
$i = 0;
$query="SELECT *, emlak.bolge as bolge FROM emlak, emlakci, ilce , il WHERE emlak.aktivite='Aktif' AND emlak.emlakci_no=emlakci.emlakci_no AND emlak.il_no=il.il_no AND emlak.ilce_no=ilce.ilce_no ";
$query .= "ORDER BY eklenme_zamani DESC ";
$query .= "LIMIT 0 , 20";
//echo $query;
if (!($qx = mysql_query($query))) {
  echo "Veriye ulaþmada bir sorun oluþtuðundan son 10 emlak görüntülenemedi.";
	  echo "<br> Sebep: ".mysql_error();
	return;
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
  $il_adi = $qq['il_adi'];
  $ilce_adi = $qq['ilce_adi'];
  $semt_no = $qq['semt_no'];
  $bolge = $qq['bolge'];
  $fiyat = $qq['fiyat'];
  $fiyat_birimi = $qq['fiyat_birimi'];
  $brutm2 = $qq['brutm2'];
  $netm2 = $qq['netm2'];
  $binadaki_kat_sayisi = $qq['binadaki_kat_sayisi'];
  $bulundugu_kat = $qq['bulundugu_kat'];
  $oda_sayisi = $qq['oda_sayisi'];
  $salon_sayisi = $qq['salon_sayisi'];
  $balkon_sayisi = $qq['balkon_sayisi'];
  $banyo_tuvalet_sayisi = $qq['banyo_tuvalet_sayisi'];
  $il_ilce=(stripos($ilce_adi,"erkez"))? $il_adi : $ilce_adi ;
  if (!((empty($netm2)) AND(empty($brutm2)))) $m2string="m<sup>2</sup>";
  if (empty($netm2)) $netm2="-";
  if (empty($brutm2)) $brutm2="-";
	if (empty($bolge)) $bolge="&nbsp;";
	echo "<a href=\"em.php?emlak_no=$emlak_no\">";
  if (mysql_fetch_array(mysql_query("SELECT * FROM foto WHERE emlak_no='$emlak_no'")))
    echo "<tr style=\"cursor: hand\" onmouseover=\"this.style.background='#ccffcc';\" onmouseout=\"this.style.background='';\"><td width=\"20\"><img src=\"images/camera.gif\" alt=\"Fotoðrafý mevcut !\" border=\"0\"></td>\n";
  else
    echo "<tr style=\"cursor: hand\" onmouseover=\"this.style.background='#ccffcc';\" onmouseout=\"this.style.background='';\"><td width=\"20\">&nbsp;</td>\n";
  echo "<td width=\"160\">";
	$emlakci40=substr($emlakci,0,40);
  echo substr($emlakci40,0,(stripos($emlakci40,"Emlak")>0)?stripos($emlakci40,"Emlak"):40) . "</td>	
    <td width=\"60\">$islem_tipi</td>
    <td width=\"120\">$bolge / $il_ilce</td>
    <td width=\"120\">$tip_ozelligi</td>
    <td width=\"120\">$netm2 / $brutm2 $m2string</td>
    <td width=\"120\">"; echo money_format('%!.0n', $fiyat) . " " . $fiyat_birimi . "</td>";
echo"<td width=\"60\">$oda_sayisi+$salon_sayisi</td>";
echo "</tr></a>\n";
  $i++;
} // end of while
if (empty($data)) echo " <br>Verilen kriterlere uygun emlak kaydý bulunamadý. <br>";
?>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
<tr>
<td width="100%" height="30"></td>
</tr>
<tr>
<td width="100%" height="30" bgcolor="#FFF2C1">
<?
echo "<marquee onmouseover=\"this.stop();\" onmouseout=\"this.start();\" scrollamount=\"2\" scrolldelay=\"20\" direction=\"left\" behavior=\"scroll\" loop=\"-1\"><font color=\"#CC3300\"><b>ÝLANLARIYLA ZÝRVEDEKÝLER -></b></font> ";

$i = 0;
$query="SELECT emlakci.emlakci_no, isim, count(emlak.emlak_no) as sayi FROM emlak, emlakci WHERE emlak.aktivite='Aktif' AND emlak.emlakci_no=emlakci.emlakci_no GROUP BY emlakci.emlakci_no ";
$query .= "ORDER BY sayi DESC ";
$query .= "LIMIT 0 , 10";
//echo $query;
if (!($qx = mysql_query($query))) {
  echo "Veriye ulaþmada bir sorun oluþtuðundan zirvedekiler görüntülenemedi.";
	  echo "<br> Sebep: ".mysql_error();
	return;
  }
//$data=mysql_num_rows($qx);
//echo "rows:$data";
while($qq = mysql_fetch_array($qx)) {
  $emlakci = $qq['isim'];
  $emlak_sayisi = $qq['sayi'];
	$emlakci_no= $qq['emlakci_no'];
	$emlakci_=str_ireplace("EMLAK","E.Ofisi",str_ireplace("EMLAK OFÝSÝ","E.Ofisi",$emlakci));
echo "<a href=\"emlakci.php?emlakci_no=$emlakci_no\"><b>$emlakci_</b></a>&nbsp;&nbsp;&nbsp;<font color=\"#CC3300\">|</font>&nbsp;&nbsp;&nbsp;";
	} // while
echo "</marquee>";
?>
</td>
</tr>
</table>
<table>
<tr>
<td>
<?php
if (rand(1,100)<6) {// emlak_kisayol dosyasýný yeniden olustur
  unlink("emlak_kisayol.html");
	include 'emlak_kisayolunu_olustur.php';
	}
?>
</td>
</tr>
</table>
 <tr>	 <td> <? include "sss.html"; ?>  </td>  </tr>
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
<?php
mysql_close();
// hit counter
$cont=fopen('anasayac.txt','r');
$incr=fgets($cont,20);
$incr++;
fclose($cont);
$cont=fopen('anasayac.txt','w');
fwrite($cont,$incr,20);
fclose($cont);
if ($_GET['sayac']=="E") echo "<br><center>Sitemiz $incr defa ziyaret edilmiþtir.</center>";
?>
</body>

</html>
