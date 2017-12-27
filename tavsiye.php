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

function validate(name, email, friendmail1){
	if (emptyStringControl(name)) {
		alert('Ýsminizi yazmadýnýz.');
		return false;
	}
	else if (emptyStringControl(email)) {
		alert('E-posta adresinizi yazmadýnýz.');
		return false;
	}
	else if (tavsiye.email.value != "" && tavsiye.email.value.indexOf('@',0) == -1) {
		alert('E-posta adresiniz geçersiz!');
		return false;
	}
	else if (emptyStringControl(friendmail1)) {
		alert('En az bir arkadaþýnýzýn e-posta adresini yazmalýsýnýz.');
		return false;
	}
	else if (tavsiye.friendmail1.value != "" && tavsiye.friendmail1.value.indexOf('@',0) == -1) {
		alert('1. sýradaki arkadaþýnýzýn e-posta adresi geçersiz!');
		return false;
	}
	else if (tavsiye.friendmail2.value != "" && tavsiye.friendmail2.value.indexOf('@',0) == -1) {
		alert('2. sýradaki arkadaþýnýzýn e-posta adresi geçersiz!');
		return false;
	}
	else if (tavsiye.friendmail3.value != "" && tavsiye.friendmail3.value.indexOf('@',0) == -1) {
		alert('3. sýradaki arkadaþýnýzýn e-posta adresi geçersiz!');
		return false;
	}
	else {
		return true;
		}
}
</script>
<form name="tavsiye" method="post" action="tavsiye@.php" onsubmit="return validate(self.document.tavsiye.name.value,self.document.tavsiye.email.value,self.document.tavsiye.friendmail1.value,self.document.tavsiye.friendmail2.value,self.document.tavsiye.friendmail3.value);">
<input type="hidden" name="url" value="http://www.evbulur.com/emlak.php?emlak_no=<? echo "$_GET[emlak_no]"; ?>">
<b><font color="#0066CC">Arkadaþýnýza göndermekte olduðunuz emlaðýn kayýt numarasý:</font></b> <a href="http://www.evbulur.com/emlak.php?emlak_no=<? echo "$_GET[emlak_no]"; ?>"><b><? echo "$_GET[emlak_no]"; ?></b></a><br><br>
<b><font color="#FF0000">Ýsminiz:</font></b><br><input type="text" name="name"> <font color="#FF0000">*</font><br><br>
<b><font color="#FF0000">E-posta adresiniz:</font></b><br><input type="text" name="email"> <font color="#FF0000">*</font><br><br>
<b><font color="#0066CC">Sayfayý tavsiye edeceðiniz;</font></b><br><br>
<b><font color="#FF0000">1. arkadaþýn e-posta adresi:</font></b> <input type="text" name="friendmail1"> <font color="#FF0000">*</font><br>
<b><font color="#FF0000">2. arkadaþýn e-posta adresi:</font></b> <input type="text" name="friendmail2"><br>
<b><font color="#FF0000">3. arkadaþýn e-posta adresi:</font></b> <input type="text" name="friendmail3"><br><br>
<b><font color="#FF0000">Mesaj veya yorumunuz:</font></b><br><textarea name="message" rows="4" cols="30" wrap="virtual"></textarea><br><br>
<b>·</b> Kenarýnda (*) iþareti bulunan alanlarýn doldurulmasý zorunludur.<br><br>
<b>·</b> 3'ten daha az adrese mesaj göndermek istiyorsanýz diðer kutularý boþ býrakýnýz.<br><br>
<input type="submit" value="Tavsiye Et">
                       </td>
</form>
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
