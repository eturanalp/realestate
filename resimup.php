<?
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";
$emlak_no=intval($_GET['eno']);
include "emlak.menu.inc.php";
?>
<br />
<?=$emlak_no?> numaralý emlak için toplam 5 adet emlak fotoðrafýný ilanýnýza ekleyebilirsiniz:<br />
Ziyaretçilere emlak sayfasýnýn çabuk gelmesi için dosyanýn 64 KB'dan küçük olmasý tavsiye edilir. <br />
Sistemimiz 64 KB'dan büyük olarak sadece jpeg formatýnda dosya kabul etmektedir.<br />
Bir fotoðraf dosyasý en fazla 512 KB olabilir. <br />
Fotoðraflarýnýzýn büyüklüðüne göre yükleme iþlemi birkaç dakika sürebilir.<br />
<b>Dikkat: </b>Bu dosyalarý gönderdiðinizde bu ilana daha önce eklenmiþ fotoðraflar silinecektir!<br/><br/>
<form enctype="multipart/form-data" action="resimal.php?eno=<?=$emlak_no	?>" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="600000" />
<u><b>Emlak Fotoðrafý 1:</b></u> <input name="resdos[]" type="file" /><br />  Ýsim: <input name="isim[]" type="text" value="foto1" size="10" />
<IMG SRC="images/button.help.gif" WIDTH=20 HEIGHT=20 border="0" ALT="Ýsim alanýna fotoðrafýnýzý diðerlerinden ayýrdedecek bir isim yazýnýz. Örneðin 'Salon'.">
  Açýklama: <input name="aciklama[]" type="text" />
<IMG SRC="images/button.help.gif" WIDTH=20 HEIGHT=20 border="0" ALT="Açýklama alanýna daha detaylý bilgi girebilirsiniz. Örneðin 'Salon laminat parkedir' gibi..">
<br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Fotoðrafý 2:</b></u> <input name="resdos[]" type="file" /><br />  Ýsim: <input name="isim[]" type="text" value="foto2" size="10" />  Açýklama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Fotoðrafý 3:</b></u> <input name="resdos[]" type="file" /><br />  Ýsim: <input name="isim[]" type="text" value="foto3" size="10" />  Açýklama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Fotoðrafý 4:</b></u> <input name="resdos[]" type="file" /><br />  Ýsim: <input name="isim[]" type="text" value="foto4" size="10" />  Açýklama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Fotoðrafý 5:</b></u> <input name="resdos[]" type="file" /><br />  Ýsim: <input name="isim[]" type="text" value="foto5" size="10" />  Açýklama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
		
    <input type="submit" value="Fotoðraflarý gönder.." />
</form>
