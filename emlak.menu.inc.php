<?php  
if (empty($_SESSION['uuser'])) return;
?>
<script language="javascript">
function sil(id) {
  if (confirm("Silmek istedi�inizden emin misiniz?")){
    window.location.href = 'gonder.php?isl=sil&emlak_no=' + id; }
  else {
    alert("Silme i�lemi iptal edildi.");
  }
}

function cikar(id) {
  if (confirm("�lan� internetten ��karmak istiyor musunuz?")){
    window.location.href = 'gonder.php?isl=cikar&emlak_no=' + id;
    }
  else {
    alert("��karma i�lemi iptal edildi.");
    }
}

</script>
<table border="0" cellpadding="1" cellspacing="0" bgcolor="<? echo $tablo_kenar; ?>">
<tr>
<td><table width="100%" border="0" cellpadding="4" cellpadding="0" bgcolor="<? echo $acik; ?>">
<tr>
<td><b>EMLAK MEN�S�:    </b> <a href="emlak.php?emlak_no=<?=$emlak_no?>">Emlak Detay</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="emlak_degistir.php?emlak_no=<?=$emlak_no?>">De�i�tir</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="javascript:sil(<?=$emlak_no ?>)">Sil</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="javascript:cikar(<?=$emlak_no ?>)">�lan� ��kar</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="resimup.php?eno=<?=$emlak_no?>">Foto�raf Ekle</a></td>
</tr>
</table></td>
</tr>
</table>
