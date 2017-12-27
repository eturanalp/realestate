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

function kucult($filename) {  // Dosya 100K dan buyukse ve jpeg ise onu kucult, basarýlýysa TRUE donderir.
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
  // EvBulur.com mührü
  $textcolor = imagecolorallocate($image_p, 0, 0, 255);
  imagestring($image_p, 4, $new_width*0.7 , $new_height*0.9, "www.EvBulur.com", $textcolor);
  imagejpeg($image_p, $filename, 75);
  //imagejpeg($image_p);
  return True;
}

if (!(sahip($emlak_no,$_SESSION['kullanici_emlakci_no']))) {
    echo "No authorization. \n Emlak kaydýna foto eklenemedi.[Resimal_U23]";
		return;	
		}	

// önce emlak varsa ve mevcut fotograf varsa fotolarý sil.
if (mysql_fetch_array(mysql_query("SELECT * FROM emlak where emlak_no='$emlak_no'"))) {
  if ($qf=mysql_query("SELECT * FROM foto where emlak_no='$emlak_no'"))
	  if (mysql_num_rows($qf)>0){ // emlaða ait foto var, sil hepsini
	     while($qff = mysql_fetch_array($qf)) unlink($qff['path']);
       if(!mysql_query("DELETE FROM foto where emlak_no='$emlak_no'"))
	        echo "$emlak_no numaralý emlaða ait foto kaydý silinemedi. \n";
			 }		
	}	
else {
  echo "$emlak_no numaralý emlak kayýtlý deðil. \n";
	return;
  }
echo '<pre>';
$uploaddir = 'photos/';
$i=0;
$sayi=count($_FILES['resdos']['name']);
//echo "sayi: $sayi";
// SONRA tek tek dosyalarý foto tablosuna ve photos dizinine kaydet
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
            $uploadfile= $uploaddir . "_" . $liid . "_" . strtr(strtolower($resim), "ÜÐÝÞÇÖüðýþçö", "ugiscougisco"); 
	  				if (move_uploaded_file($_FILES['resdos']['tmp_name'][$i], $uploadfile)) {
						   if ((filesize($uploadfile) < $minK) || ((exif_imagetype($uploadfile) == 2)&&(kucult($uploadfile)))){  //JPEG ise
  					     if (mysql_query("UPDATE foto SET path='$uploadfile' WHERE no='$liid'"))
                    echo "<br />$resim resim dosyasý baþarýyla gönderildi.<br />";  
  						   else 
	  					      echo "<br />$resim resim dosyasý baþarýyla gönderildi ancak dosya yolunun kaydýnda hata oluþtu.<br />" . mysql_error() .  " \n";
								 }
							 else { 
                 echo "<br />$resim resim dosyasý 100KByte'dan büyük ve küçültme iþlemi baþarýlý olmadý.<br /> Lütfen fotoðrafýnýzý 480x640 jpeg ebadýna getirerek tekrar yollayýnýz.<br /><br />";
								 if(file_exists($uploadfile))unlink($uploadfile);
								 mysql_query("DELETE FROM foto WHERE no='$liid'");
								 }							   	 		
		    		   }
	          else {
               echo "Kopyalama hatasý nedeniyle $resim resim dosyasý gönderilemedi!\n";
               }
					  } 	 
				  else 
				    echo "Sistemden Resim no alýnamadýðýndan $resim resim dosyasý gönderilemedi!\n" . mysql_error() .  " \n";
			    }
			  else
		   	  echo "Veritabaný yazma hatasý nedeniyle $resim resim dosyasý gönderilemedi! \n " . mysql_error() .  " \n";
			  } 	 
		else  // yani maxK dan büyükse
		  echo "<br />Baþarýsýz.";		 
	}	 	
	else if ($_FILES['resdos']['error'][$i]==2)
	  echo "$resim resim dosyasý 600Kb dan büyük. Dosya gönderilemedi..<br />";
	else 
	  echo "$resim resim dosyasý gönderilirken hata oluþtu. Dosya gönderilemedi. Lütfen tekrar deneyiniz..<br />";	 
  
	$i++;
}

//echo 'Here is some more debugging info:';
//print_r($_FILES);

print "</pre>";
echo " <br /> Emlak Sayfasýna geri dönmek için<a href=\"emlak.php?emlak_no=$emlak_no\"> buraya týklayýnýz.</a>";
?> 

</body>
</html>
