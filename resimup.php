<?
include "html.php";
include "ayar.inc.php";
include "mysql.inc.php";
include "menu.inc.php";
$emlak_no=intval($_GET['eno']);
include "emlak.menu.inc.php";
?>
<br />
<?=$emlak_no?> numaral� emlak i�in toplam 5 adet emlak foto�raf�n� ilan�n�za ekleyebilirsiniz:<br />
Ziyaret�ilere emlak sayfas�n�n �abuk gelmesi i�in dosyan�n 64 KB'dan k���k olmas� tavsiye edilir. <br />
Sistemimiz 64 KB'dan b�y�k olarak sadece jpeg format�nda dosya kabul etmektedir.<br />
Bir foto�raf dosyas� en fazla 512 KB olabilir. <br />
Foto�raflar�n�z�n b�y�kl���ne g�re y�kleme i�lemi birka� dakika s�rebilir.<br />
<b>Dikkat: </b>Bu dosyalar� g�nderdi�inizde bu ilana daha �nce eklenmi� foto�raflar silinecektir!<br/><br/>
<form enctype="multipart/form-data" action="resimal.php?eno=<?=$emlak_no	?>" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="600000" />
<u><b>Emlak Foto�raf� 1:</b></u> <input name="resdos[]" type="file" /><br />  �sim: <input name="isim[]" type="text" value="foto1" size="10" />
<IMG SRC="images/button.help.gif" WIDTH=20 HEIGHT=20 border="0" ALT="�sim alan�na foto�raf�n�z� di�erlerinden ay�rdedecek bir isim yaz�n�z. �rne�in 'Salon'.">
  A��klama: <input name="aciklama[]" type="text" />
<IMG SRC="images/button.help.gif" WIDTH=20 HEIGHT=20 border="0" ALT="A��klama alan�na daha detayl� bilgi girebilirsiniz. �rne�in 'Salon laminat parkedir' gibi..">
<br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Foto�raf� 2:</b></u> <input name="resdos[]" type="file" /><br />  �sim: <input name="isim[]" type="text" value="foto2" size="10" />  A��klama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Foto�raf� 3:</b></u> <input name="resdos[]" type="file" /><br />  �sim: <input name="isim[]" type="text" value="foto3" size="10" />  A��klama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Foto�raf� 4:</b></u> <input name="resdos[]" type="file" /><br />  �sim: <input name="isim[]" type="text" value="foto4" size="10" />  A��klama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
<u><b>Emlak Foto�raf� 5:</b></u> <input name="resdos[]" type="file" /><br />  �sim: <input name="isim[]" type="text" value="foto5" size="10" />  A��klama: <input name="aciklama[]" type="text" /><br /><hr style="width: 100%; height: 2px;"><br />
		
    <input type="submit" value="Foto�raflar� g�nder.." />
</form>
