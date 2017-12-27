<?php  
//session_start();
if (empty($_SESSION['uuser'])) return;
if ($_SESSION['emlakci_il_no']==42) $ucrett="|   <a href=\"abone_hesap.php\">Ödeme Bilgileri</a>   ";
//$ucrett.=$_SESSION['emlakci_il_no'] ;
?>

<table border="0" cellpadding="1" cellspacing="0" bgcolor="<? echo $tablo_kenar; ?>">
<tr>
<td><table width="100%" border="0" cellpadding="4" cellpadding="0" bgcolor="<? echo $acik; ?>">
<tr>
<td><b>EMLAKÇI MENÜSÜ:  </b> <a href="emlak_list_satir.php">Emlak Listele</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="emlak_ekle.php">Emlak Ekle</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="emlakci_degistir.php">Emlakçý Bilgileri</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="talep_listele.php">Talepler</a>&nbsp;&nbsp;&nbsp;<?=$ucrett?>|&nbsp;&nbsp;&nbsp;<a href="kapat.php">Çýkýþ</a></td>
</tr>
</table></td>
</tr>
</table>
<br>
