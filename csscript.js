function loadExternal(url) {
  if ( window.frames['main'] ) {
    window.frames['main'].location = url;
    var lyr = document.getElementById? document.getElementById('display'): document.all? document.all['display']: null;
    if ( lyr && typeof lyr.innerHTML != "undefined" ) {
      lyr.innerHTML = '<img src="/images/common/loading.gif" alt="">';
    }
    return false;
  } 
  return true; // other browsers follow link
}

// fiyat alanina girisi kontrol et: 
function ucle(keyCode, element, mesaj, ondalik ){
  if (!((keyCode>36 && keyCode<41) || (keyCode>15 && keyCode<18))) {
	if (!sayimi(element.value))
	{	
		if (mesaj!="")
			alert(mesaj)
		else
			alert("Lütfen geçerli bir sayý girin")
		element.value=0
		element.focus()
		return
	}
    sss=element.value
    element.value=sss.replace(/\./g,'')
	sss=element.value
	yenisi=''
	arrayh=sss.split('y')
	while(arrayh[0].substr(0,1)=='0' && arrayh[0].length>1)
	    arrayh[0]=arrayh[0].substr(1,arrayh[0].length-1)
	for(i=arrayh[0].length-3;i>0;i-=3) 
		yenisi='.'+arrayh[0].substr(i,3)+yenisi
	yenisi=arrayh[0].substr(0,i+3)+yenisi
	element.value=yenisi
	//element.value=200;
  }
}

function sayimi(ss) {
if (isNaN(ss.replace(/\./g,''))) return false
else return true
}


