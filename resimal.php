<?php
include "ayar.inc.php";
include "mysql.inc.php";
include "html.php";
include "menu.inc.php";
$maxK=600000;
$minK=100000;
$emlak_no=intval($_GET['eno']);
include "emlak.menu.inc.php";
//$ii=$_POST['aciklama'][0];
//echo "\n $ii \n";
function sahip($eno,$emlakci){
if(mysql_fetch_array(mysql_query("SELECT * FROM emlak WHERE emlak_no='$eno' AND emlakci_no='$emlakci'")))
  return true;
else 
  return false;	
}

function kucult($filename) {  // Dosya 100K dan buyukse ve jpeg ise onu kucult, basar�l�ysa TRUE donderir.
  list($width, $height , $type , $attr) = getimagesize($filename);
	if (empty($height)) return False;
  if (($width/$height)>(2.5)) return False;
  if (($height>2500) || ($width>3300)) return False;
  if ($height<480) $percent_h = 1.0;
  else $percent_h = 480/$height;
  //$percent_w= 640/$width; 
  $new_width = $width * $percent_h;
  $new_height = $height * $percent_h;
  $image_p = imagecreatetruecolor($new_width, $new_height);
  $image = imagecreatefromjpeg($filename);
  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
  // EvBulur.com m�hr�
  $textcolor = imagecolorallocate($image_p, 0, 0, 255);
  imagestring($image_p, 4, $new_width*0.7 , $new_height*0.9, "www.EvBulur.com", $textcolor);
  imagejpeg($image_p, $filename, 75);
  //imagejpeg($image_p);
  return True;
}

if (!(sahip($emlak_no,$_SESSION['kullanici_emlakci_no']))) {
    echo "No authorization. \n Emlak kayd�na foto eklenemedi.[Resimal_U23]";
		return;	
		}	

// �nce emlak varsa ve mevcut fotograf varsa fotolar� sil.
if (mysql_fetch_array(mysql_query("SELECT * FROM emlak where emlak_no='$emlak_no'"))) {
  if ($qf=mysql_query("SELECT * FROM foto where emlak_no='$emlak_no'"))
	  if (mysql_num_rows($qf)>0){ // emla�a ait foto var, sil hepsini
	     while($qff = mysql_fetch_array($qf)) unlink($qff['path']);
       if(!mysql_query("DELETE FROM foto where emlak_no='$emlak_no'"))
	        echo "$emlak_no numaral� emla�a ait foto kayd� silinemedi. \n";
			 }		
	}	
else {
  echo "$emlak_no numaral� emlak kay�tl� de�il. \n";
	return;
  }
echo '<pre>';
$uploaddir = 'photos/';
$i=0;
$sayi=count($_FILES['resdos']['name']);
//echo "sayi: $sayi";
// SONRA tek tek dosyalar� foto tablosuna ve photos dizinine kaydet
while (($i<5) AND ($i<$sayi) AND (!empty($_FILES['resdos']['name'][$i]))) { // AND ($_FILES['resdos']['error'][i]==0)) {
	//$resim=$_FILES['resdos']['name'][$i];
  //$uploadfile = $uploaddir . "_" . $emlak_no . "_" . $i . "_." . strtolower(substr($resim, -3, 3)); // . basename($resim);
  //$uploadfile = "123456.jpg";
  //$_FILES['userfile']['tmp_name'][0]
  $err=$_FILES['resdos']['error'][$i];
  $resim=$_FILES['resdos']['name'][$i];
  //echo "error: $err";
	
	if ($_FILES['resdos']['error'][$i]==0){
	  if (filesize($_FILES['resdos']['tmp_name'][$i])<=$maxK){
        $uploadfile = $uploaddir . "_" . $emlak_no . "_" . $i . "_." . strtolower(substr($resim, -3, 3)); // . basename($resim);
			  $aciklama=$_POST['aciklama'][$i];
			  $isim=substr($_POST['isim'][$i], 0, 15);
 			  if ($qq=mysql_query("INSERT INTO foto VALUES('','$emlak_no','$resim','$isim','$uploadfile','$aciklama')")) {
          if ($qq=mysql_fetch_array(mysql_query("SELECT LAST_INSERT_ID() as liid"))){ 
		  		  $liid=$qq['liid'];
            $uploadfile= $uploaddir . "_" . $liid . "_" . strtr(strtolower($resim), "������������", "ugiscougisco"); 
	  				if (move_uploaded_file($_FILES['resdos']['tmp_name'][$i], $uploadfile)) {
						   if ((filesize($uploadfile) < $minK) || ((exif_imagetype($uploadfile) == 2)&&(kucult($uploadfile)))){  //JPEG ise
  					     if (mysql_query("UPDATE foto SET path='$uploadfile' WHERE no='$liid'"))
                    echo "<br />$resim resim dosyas� ba�ar�yla g�nderildi.<br />";  
  						   else 
	  					      echo "<br />$resim resim dosyas� ba�ar�yla g�nderildi ancak dosya yolunun kayd�nda hata olu�tu.<br />" . mysql_error() .  " \n";
								 }
							 else { 
                 echo "<br />$resim resim dosyas� 100KByte'dan b�y�k ve k���ltme i�lemi ba�ar�l� olmad�.<br /> L�tfen foto�raf�n�z� 480x640 jpeg ebad�na getirerek tekrar yollay�n�z.<br /><br />";
								 if(file_exists($uploadfile))unlink($uploadfile);
								 mysql_query("DELETE FROM foto WHERE no='$liid'");
								 }							   	 		
		    		   }
	          else {
               echo "Kopyalama hatas� nedeniyle $resim resim dosyas� g�nderilemedi!\n";
               }
					  } 	 
				  else 
				    echo "Sistemden Resim no al�namad���ndan $resim resim dosyas� g�nderilemedi!\n" . mysql_error() .  " \n";
			    }
			  else
		   	  echo "Veritaban� yazma hatas� nedeniyle $resim resim dosyas� g�nderilemedi! \n " . mysql_error() .  " \n";
			  } 	 
		else  // yani maxK dan b�y�kse
		  echo "<br />Ba�ar�s�z.";		 
	}	 	
	else if ($_FILES['resdos']['error'][$i]==2)
	  echo "$resim resim dosyas� 600Kb dan b�y�k. Dosya g�nderilemedi..<br />";
	else 
	  echo "$resim resim dosyas� g�nderilirken hata olu�tu. Dosya g�nderilemedi. L�tfen tekrar deneyiniz..<br />";	 
  
	$i++;
}

//echo 'Here is some more debugging info:';
//print_r($_FILES);

print "</pre>";
echo " <br /> Emlak Sayfas�na geri d�nmek i�in<a href=\"emlak.php?emlak_no=$emlak_no\"> buraya t�klay�n�z.</a>";
?> 

</body>
</html>
