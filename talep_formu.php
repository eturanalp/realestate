<?   echo "<br />Aradiginiz özelliklerde emlak bilgisini bulamadiysaniz <b>talep býrakarak </b>üye emlak ofislerimizin sizinle irtibata geçmelerini saglayabilirsiniz.<br /> <b>Talep býrakmak için</b> aþaðýdaki formu doldurmanýz yeterli olacaktýr.
	Elektronik posta (Email) adresi alanýný doldurmanýz zorunludur.<br />";
$qs=$_SERVER['QUERY_STRING'];
echo "
                      <form action=\"talep.php?$qs\" method=\"POST\" name=\"talepformu\" onsubmit=\"return validate(self.document.talepformu.email.value);\">
                      <font color=\"#FF0000\"><b>Ýsminiz:</b></font><br>
                      <input type=\"text\" size=\"20\" name=\"talepci\"><br>
                      <font color=\"#FF0000\"><b>E-mail adresiniz:</b><br>
                      <input type=\"text\" size=\"40\" name=\"email\">*</font><br>
                      <font color=\"#FF0000\"><b>Telefon:</b></font><br>
                      <input type=\"text\" size=\"40\" name=\"tel\"><br>
                      <font color=\"#FF0000\"><b>Talebinizle ilgili Detay/Açýklama:</b></font><br>
                      <textarea name=\"detay\" rows=\"4\" cols=\"40\" wrap=\"virtual\"></textarea><br>
                      <br>Talep Býrak tuþuna basýnca belirttiðiniz arama kriterleri talebinizle birlikte kaydedilecektir.<br>
                      <input type=\"submit\" value=\"Talep Býrak\"> 
       </form>
"; 
?>