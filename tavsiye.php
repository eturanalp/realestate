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
		alert('�sminizi yazmad�n�z.');
		return false;
	}
	else if (emptyStringControl(email)) {
		alert('E-posta adresinizi yazmad�n�z.');
		return false;
	}
	else if (tavsiye.email.value != "" && tavsiye.email.value.indexOf('@',0) == -1) {
		alert('E-posta adresiniz ge�ersiz!');
		return false;
	}
	else if (emptyStringControl(friendmail1)) {
		alert('En az bir arkada��n�z�n e-posta adresini yazmal�s�n�z.');
		return false;
	}
	else if (tavsiye.friendmail1.value != "" && tavsiye.friendmail1.value.indexOf('@',0) == -1) {
		alert('1. s�radaki arkada��n�z�n e-posta adresi ge�ersiz!');
		return false;
	}
	else if (tavsiye.friendmail2.value != "" && tavsiye.friendmail2.value.indexOf('@',0) == -1) {
		alert('2. s�radaki arkada��n�z�n e-posta adresi ge�ersiz!');
		return false;
	}
	else if (tavsiye.friendmail3.value != "" && tavsiye.friendmail3.value.indexOf('@',0) == -1) {
		alert('3. s�radaki arkada��n�z�n e-posta adresi ge�ersiz!');
		return false;
	}
	else {
		return true;
		}
}
</script>
<form name="tavsiye" method="post" action="tavsiye@.php" onsubmit="return validate(self.document.tavsiye.name.value,self.document.tavsiye.email.value,self.document.tavsiye.friendmail1.value,self.document.tavsiye.friendmail2.value,self.document.tavsiye.friendmail3.value);">
<input type="hidden" name="url" value="http://www.evbulur.com/emlak.php?emlak_no=<? echo "$_GET[emlak_no]"; ?>">
<b><font color="#0066CC">Arkada��n�za g�ndermekte oldu�unuz emla��n kay�t numaras�:</font></b> <a href="http://www.evbulur.com/emlak.php?emlak_no=<? echo "$_GET[emlak_no]"; ?>"><b><? echo "$_GET[emlak_no]"; ?></b></a><br><br>
<b><font color="#FF0000">�sminiz:</font></b><br><input type="text" name="name"> <font color="#FF0000">*</font><br><br>
<b><font color="#FF0000">E-posta adresiniz:</font></b><br><input type="text" name="email"> <font color="#FF0000">*</font><br><br>
<b><font color="#0066CC">Sayfay� tavsiye edece�iniz;</font></b><br><br>
<b><font color="#FF0000">1. arkada��n e-posta adresi:</font></b> <input type="text" name="friendmail1"> <font color="#FF0000">*</font><br>
<b><font color="#FF0000">2. arkada��n e-posta adresi:</font></b> <input type="text" name="friendmail2"><br>
<b><font color="#FF0000">3. arkada��n e-posta adresi:</font></b> <input type="text" name="friendmail3"><br><br>
<b><font color="#FF0000">Mesaj veya yorumunuz:</font></b><br><textarea name="message" rows="4" cols="30" wrap="virtual"></textarea><br><br>
<b>�</b> Kenar�nda (*) i�areti bulunan alanlar�n doldurulmas� zorunludur.<br><br>
<b>�</b> 3'ten daha az adrese mesaj g�ndermek istiyorsan�z di�er kutular� bo� b�rak�n�z.<br><br>
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
