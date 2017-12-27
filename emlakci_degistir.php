<?
include "kontrol.inc.php";
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";

//$emlakci_no = $_GET['emlakci_no'];
$emlakci_no = $_SESSION['kullanici_emlakci_no'];

$qx = mysql_query("SELECT * FROM emlakci, il, ilce WHERE emlakci_no='$emlakci_no' AND emlakci.il_no=il.il_no AND emlakci.ilce_no=ilce.ilce_no");
$qq = mysql_fetch_array($qx);

$emlakci_no = $qq['emlakci_no'];
$isim = $qq['isim'];
$adi = $qq['adi'];
$soyadi = $qq['soyadi'];
$adres_satiri1 = $qq['adres_satiri1'];
$adres_satiri2 = $qq['adres_satiri2'];
if (empty($_POST['il_no'])) $emlakci_il_no = $qq['il_no'];
if (empty($_POST['ilce_no'])) $emlakci_ilce_no = $qq['ilce_no'];
$bolge = $qq['bolge'];
$is_tel = $qq['is_tel'];
$cep_tel = $qq['cep_tel'];
$is_tel2 = $qq['is_tel2'];
$cep_tel2 = $qq['cep_tel2'];
$email = $qq['email'];
?>
<br><br>
<b><font color="#FF0000">EMLAKÇI BÝLGÝLERÝ DEÐÝÞTÝRME FORMU:</font></b>
<form method="post" action="gonder.php" id="form1" name="form1">
<input type="hidden" name="__EVENT" value="" />
<input type="hidden" name="__ARGUMENT" value="" />
<input type="hidden" name="form_tipi" value="emlakcidegistir">
<input type="hidden" name="emlakci_no" value="<? echo $emlakci_no; ?>">
<b>Ýþletme Adý:</b> <input type="text" name="isim" value="<? echo $isim; ?>"><br><br>
<b>Emlakçýnýn Adý:</b> <input type="text" name="adi" value="<? echo $adi; ?>">
<b>Soyadý:</b> <input type="text" name="soyadi" value="<? echo $soyadi; ?>"><br><br>
<b>Adres:</b><br>
<input type="text" size="50" name="adres_satiri1" value="<? echo $adres_satiri1; ?>"><br>
<input type="text" size="50" name="adres_satiri2" value="<? echo $adres_satiri2; ?>"><br><br>
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
		theform.submit();
	}
// -->
</script>
<select name="il_no" onchange="__doPostBack('il_no:degisti','emlakci_degistir')" language="javascript" id="il_no">
<?
$i = 0;

$qx = mysql_query("SELECT * FROM il ORDER BY il_no");

while($qq = mysql_fetch_array($qx))
{
 $il_no = $qq['il_no'];
 $il_adi = $qq['il_adi'];
 $il_kodu = $qq['il_kodu'];

echo "<option ";
if (($_POST['il_no'] == $il_no)) echo "selected=\"selected\" ";
else if (($il_no == $emlakci_il_no)) echo "selected=\"selected\" ";
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
     $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $emlakci_il_no . " ORDER BY ilce_adi");
else 
  $qy = mysql_query("SELECT * FROM ilce WHERE il_no=" . $_POST['il_no'] . " ORDER BY ilce_adi");

while($qt = mysql_fetch_array($qy))
 {
  $ilce_no = $qt['ilce_no'];
  $ilce_adi = $qt['ilce_adi'];

  echo "<option ";
  if (($_POST['ilce_no'] == $ilce_no)) echo "selected=\"selected\" ";
	else if (($ilce_no == $emlakci_ilce_no)) echo "selected=\"selected\" ";
 
  echo "value=\"$ilce_no\">$ilce_adi</option>\n";

  //echo "<option value=\"$ilce_no\">$ilce_adi</option>\n";

  $i++;
} // end of while loop
?>
</select>
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>Semt/Bölge:</b> <input type="text" name="bolge" value="<? echo $bolge; ?>"><br><br>
<b>Ýþ Tel:</b> <input type="text" name="is_tel" value="<? echo $is_tel; ?>">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b></b>
<b>Cep Tel:</b> <input type="text" name="cep_tel" value="<? echo $cep_tel; ?>">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span><br><br>
<b>Ýþ Tel-2:</b> <input type="text" name="is_tel2" value="<? echo $is_tel2; ?>">
<span style="background-color: #FF6600">&nbsp;&nbsp;</span>
<b></b>
<b>Cep Tel-2:</b> <input type="text" name="cep_tel2" value="<? echo $cep_tel2; ?>">
<span style="background-color: #99CC00">&nbsp;&nbsp;</span>
<b>E-mail:</b> <input type="text" name="email" value="<? echo $email; ?>"><br><br>
<input type="submit" value="Bilgileri Deðiþtir">
</form>
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
