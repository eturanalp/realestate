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

function validate(G�nderen, Email, Mesaj){
	if (emptyStringControl(G�nderen)) {
		alert('�sminizi yazmad�n�z.');
		return false;
	}
	else if (evbulur.Email.value != "" && evbulur.Email.value.indexOf('@',0) == -1) {
		alert('Ge�ersiz e-posta adresi!');
		return false;
	}
	else if (emptyStringControl(Mesaj)) {
		alert('Mesaj�n�z� yazmadan g�nderim yapamazs�n�z.');
		return false;
	}
	else {
		return true;
		}
}
</script>
                      <center>
											<b><font color="#0066EE">TRABZON �ubesi</font></b><br><br>
                      <b><font color="#0066CC">M��teri Temsilcisi Cep Tel:</font></b><br>
                      <b>0 533 348 63 17</b><br>
                      <br>
                      <b><font color="#0066CC">�lan Hizmetleri E-mail:</font></b><br>
                      <b><a href="mailto:ilan@evbulur.com">ilan@EvBulur.com</a></b><br>
                      <br>
                      <b><font color="#0066CC">Teknik Hizmetler E-mail:</font></b><br>
                      <b><a href="mailto:web@evbulur.com">web@EvBulur.com</a></b><br>
                      <br>
                      <b><font color="#0066CC">M��teri Temsilcili�i E-mail:</font></b><br>
                      <b><a href="mailto:bilgi@evbulur.com">bilgi@EvBulur.com</a></b>
                      <br>
                      <br>
                      <font color="#FF0000">
                      ____________________</font><br>
                      <br>
                      Bize ula�mak i�in a�a��daki formu da kullanabilirsiniz.
                      <br>
                      <form name="evbulur" method="post" action="http://www.40ikindi.com/formmail/formmail.php" onsubmit="return validate(self.document.evbulur.G�nderen.value,self.document.evbulur.Email.value,self.document.evbulur.Mesaj.value);">
                      <input type="hidden" name="subject" value="EvBulur.com Ziyaret�isinden">
                      <input type="hidden" name="recipient" value="bilgi@evbulur.com">
                      <input type="hidden" name="redirect" value="http://www.evbulur.com/tesekkurler.php">
                      <font color="#FF0000"><b>�sminiz:</b></font><br>
                      <input type="text" size="20" name="G�nderen"><br>
                      <br>
                      <font color="#FF0000"><b>E-mail adresiniz:</b></font><br>
                      <input type="text" size="20" name="Email"><br>
                      <br>
                      <font color="#FF0000"><b>Mesaj�n�z:</b></font><br>
                      <textarea name="Mesaj" rows="8" cols="40" wrap="virtual"></textarea><br>
                      <br>
                      <input type="submit" value="G�nder">
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
