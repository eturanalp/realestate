<? include "html.php"; ?>
<script language="javascript">
function ignoreSpaces(string){
	var temp = "";
	string = '' + string;
	splitstring = string.split(" ");
	for(i = 0; i < splitstring.length; i++) temp += splitstring[i];
	return temp;
}

function emptyStringControl(str){
	if(ignoreSpaces(str).length==0) return true;
	else return false;
}

function validate(Gönderen, Email, Mesaj){
	if (emptyStringControl(Gönderen)) {
		alert('Ýsminizi yazmadýnýz.');
		return false;
	}
	else if (evbulur.Email.value != "" && evbulur.Email.value.indexOf('@',0) == -1) {
		alert('Geçersiz e-posta adresi!');
		return false;
	}
	else if (emptyStringControl(Mesaj)) {
		alert('Mesajýnýzý yazmadan gönderim yapamazsýnýz.');
		return false;
	}
	else {
		return true;
		}
}
</script>
                      <center>
                      <b><font color="#0066CC">ANKARA Merkez:</font></b><br>
                      <b>Ýzmir Cad. Menekþe Sok. Moda iþhaný A Blok 2. Kat No: 21/110<br>Kýzýlay / ANKARA</b><br>
                      <br>
                      <b><font color="#0066CC">Telefon:</font></b><br>
                      <b>0 312 418 9034</b><br>
                      <br>
                      <b><font color="#0066CC">Ýlan Hizmetleri E-mail:</font></b><br>
                      <b><a href="mailto:ilan@evbulur.com">ilan@EvBulur.com</a></b><br>
                      <br>
                      <b><font color="#0066CC">Teknik Hizmetler E-mail:</font></b><br>
                      <b><a href="mailto:web@evbulur.com">web@EvBulur.com</a></b><br>
                      <br>
                      <b><font color="#0066CC">Müþteri Temsilciliði E-mail:</font></b><br>
                      <b><a href="mailto:bilgi@evbulur.com">bilgi@EvBulur.com</a></b><br>
                      <br>
                      <font color="#FF0000">____________________</font><br>
                      <br>
                      <br>
                      <b><font color="#0066CC">ÞUBELER:</font></b><br>
                      <br>
                      <a href="bizeulasin_konya.php?sablon=5">Konya Þubesi</a> - <a href="bizeulasin_trabzon.php?sablon=5">Trabzon Þubesi</a> - Antalya Þubesi<br>
                      <br>
                      <font color="#FF0000">____________________</font><br>
                      <br>
                      <br>
                      Bize ulaþmak için aþaðýdaki formu da kullanabilirsiniz.
                      <br>
                      <form name="evbulur" method="post" action="http://www.40ikindi.com/formmail/formmail.php" onsubmit="return validate(self.document.evbulur.Gönderen.value,self.document.evbulur.Email.value,self.document.evbulur.Mesaj.value);">
                      <input type="hidden" name="subject" value="EvBulur.com Ziyaretçisinden">
                      <input type="hidden" name="recipient" value="bilgi@evbulur.com">
                      <input type="hidden" name="redirect" value="http://www.evbulur.com/tesekkurler.php">
                      <font color="#FF0000"><b>Ýsminiz:</b></font><br>
                      <input type="text" size="20" name="Gönderen"><br>
                      <br>
                      <font color="#FF0000"><b>E-mail adresiniz:</b></font><br>
                      <input type="text" size="20" name="Email"><br>
                      <br>
                      <font color="#FF0000"><b>Mesajýnýz:</b></font><br>
                      <textarea name="Mesaj" rows="8" cols="40" wrap="virtual"></textarea><br>
                      <br>
                      <input type="submit" value="Gönder">
                      </td>
                      </form>
                      </center>
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
