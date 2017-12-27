<?
//include "kontrol.inc.php";
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
//include "menu.inc.php";

$emlakci_no = intval($_GET['emlakci_no']);

$qx = mysql_query("SELECT * FROM emlakci, il, ilce  WHERE emlakci_no='$emlakci_no' AND il.il_no=emlakci.il_no AND emlakci.ilce_no=ilce.ilce_no");
$qq = mysql_fetch_array($qx);

$emlakci_no = $qq['emlakci_no'];
$isim = $qq['isim'];
$adi = $qq['adi'];
$soyadi = $qq['soyadi'];
$email = $qq['email'];
$abonelik_tipi = $qq['abonelik_tipi'];
$adres_satiri1 = $qq['adres_satiri1'];
$adres_satiri2 = $qq['adres_satiri2'];
$il_no = $qq['il_adi'];
$ilce_no = $qq['ilce_adi'];
$gercek_il_no=$qq['il_no'];
$gercek_ilce_no=$qq['ilce_no'];
$semt_no = $qq['semt_no'];
$is_tel = $qq['is_tel'];
$cep_tel = $qq['cep_tel'];
$is_tel2 = $qq['is_tel2'];
$cep_tel2 = $qq['cep_tel2'];
$fax = $qq['fax'];
$motto = $qq['motto'];
$web_link = $qq['web_link'];
$web_sayfasi = $qq['web_sayfasi'];
$emlakci_foto=  $qq['foto_dosyasi'];
?>
<table border="0" width="100%" cellspacing="3" cellpadding="0">
<td width="40%" bgcolor="#EEEEEE">
<table border="0" width="100%" cellspacing="0" cellpadding="3">
<tr>
<td width="100%" align="center" valign="top"><img src="<?="photos/emlakci/".$emlakci_foto?>" alt="<?=$isim?>" width="250" height="250" border="0" /><br /></td>
</tr>
<tr>
<td width="100%" align="center" valign="top"><a href="emlakara.php?il_no=<?=$gercek_il_no?>&emci=<?=$emlakci_no ?>&ilce_no=<?=$gercek_ilce_no?>"> Bu emlakçýnýn diðer ilanlarýný bulmak için týklayýnýz</a></td>
</tr>
</table>
</td>
    <td width="60%" bgcolor="#EEEEEE" valign="top">
      <table border="0" width="100%" cellspacing="0" cellpadding="3">
        <tr>
          <td width="40%" bgcolor="#CCCCFF"><b>Ýþletme:</b></td>
          <td width="60%" bgcolor="#CCCCFF"><? echo $isim; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CC99FF"><b>Emlakçýnýn <br>adý - soyadý:</b></td>
          <td width="60%" bgcolor="#CC99FF"><? echo "$adi $soyadi"; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CCCCFF"><b>E-mail:</b></td>
          <td width="60%" bgcolor="#CCCCFF"><? echo "$email"; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CC99FF"><b>Adres:</b></td>
          <td width="60%" bgcolor="#CC99FF"><? echo "$adres_satiri1 $adres_satiri2"; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CCCCFF"><b>Ýl:</b></td>
          <td width="60%" bgcolor="#CCCCFF"><? echo $il_no; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CC99FF"><b>Ýlçe:</b></td>
          <td width="60%" bgcolor="#CC99FF"><? echo $ilce_no; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CCCCFF"><b>Semt:</b></td>
          <td width="60%" bgcolor="#CCCCFF"><? echo $semt_no; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CC99FF"><b>Ýþ Tel:</b></td>
          <td width="60%" bgcolor="#CC99FF"><? echo $is_tel . " ,<br /> " . $is_tel2; ?></td>
        </tr>			
        <tr>
          <td width="40%" bgcolor="#CCCCFF"><b>Cep Tel:</b></td>
          <td width="60%" bgcolor="#CCCCFF"><? echo $cep_tel . " ,<br /> " . $cep_tel2; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CC99FF"><b>Fax:</b></td>
          <td width="60%" bgcolor="#CC99FF"><? echo $fax; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CCCCFF"><b>Tanýtým Mesajý:</b></td>
          <td width="60%" bgcolor="#CCCCFF"><? echo $motto; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CC99FF"><b>Web adresi:</b></td>
          <td width="60%" bgcolor="#CC99FF"><? echo "<a href=\"$web_link\">$web_link</a>"; ?></td>
        </tr>
        <tr>
          <td width="40%" bgcolor="#CCCCFF"><b>Web sayfasý:</b></td>
          <td width="60%" bgcolor="#CCCCFF"><? echo "$web_sayfasi"; ?></td>
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
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<? include "taban.php"; ?>
</body>

</html>
