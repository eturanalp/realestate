<?   echo "<br />Aradiginiz �zelliklerde emlak bilgisini bulamadiysaniz <b>talep b�rakarak </b>�ye emlak ofislerimizin sizinle irtibata ge�melerini saglayabilirsiniz.<br /> <b>Talep b�rakmak i�in</b> a�a��daki formu doldurman�z yeterli olacakt�r.
	Elektronik posta (Email) adresi alan�n� doldurman�z zorunludur.<br />";
$qs=$_SERVER['QUERY_STRING'];
echo "
                      <form action=\"talep.php?$qs\" method=\"POST\" name=\"talepformu\" onsubmit=\"return validate(self.document.talepformu.email.value);\">
                      <font color=\"#FF0000\"><b>�sminiz:</b></font><br>
                      <input type=\"text\" size=\"20\" name=\"talepci\"><br>
                      <font color=\"#FF0000\"><b>E-mail adresiniz:</b><br>
                      <input type=\"text\" size=\"40\" name=\"email\">*</font><br>
                      <font color=\"#FF0000\"><b>Telefon:</b></font><br>
                      <input type=\"text\" size=\"40\" name=\"tel\"><br>
                      <font color=\"#FF0000\"><b>Talebinizle ilgili Detay/A��klama:</b></font><br>
                      <textarea name=\"detay\" rows=\"4\" cols=\"40\" wrap=\"virtual\"></textarea><br>
                      <br>Talep B�rak tu�una bas�nca belirtti�iniz arama kriterleri talebinizle birlikte kaydedilecektir.<br>
                      <input type=\"submit\" value=\"Talep B�rak\"> 
       </form>
"; 
?>