<?php 
$cont=fopen('emlak_kisayol.html','w');
//fwrite($cont,"Emlak Kýsayollarý: <br />");
fwrite($cont,"<a href=\"emlakara.php?geldigi=Ankara&il_no=6\">ANKARA emlak:</a> , <a href=\"emlakara.php?geldigi=Ankara'da Daire&il_no=6\">Ankara'da Apartman Dairesi </a>, <a href=\"emlakara.php?geldigi=Ankara(tüm emlak tipleri)&il_no=6\">Ankara'da Arsa </a> , <a href=\"emlakara.php?geldigi=Antalya&il_no=7\">ANTALYA:</a>, <a href=\"emlakara.php?geldigi=Antalya&il_no=7&tip_ozelligi=Apartman Dairesi\">Antalya'da Apartman Dairesi </a>, AYVALIK villa , <a href=\"emlakara.php?geldigi=Konya&il_no=42\">Konya Emlak:</a> Apartman Dairesi, Arsa, Villa, Kooperatif, Maðaza/Dükkan , <a href=\"emlakara.php?geldigi=Ýstanbul Bahçeþehir&il_no=34\">Ýstanbul Bahçeþehir </a>,<a href=\"emlakbulur/index.php\">Ýl bazlý ilanlar, Ankara Emlak Konya emlak</a>,");
$i = 0;
$query= 'SELECT il.il_adi, emlak.tip_ozelligi, count( emlak.emlak_no ) AS cc , il.il_no' 
        . ' FROM il, emlak'
        . ' WHERE emlak.il_no = il.il_no AND ( emlak.il_no = 6 OR emlak.il_no = 42 )'
        . ' GROUP BY emlak.il_no, emlak.tip_ozelligi'
        . ' ORDER BY cc DESC '
        . ' LIMIT 0 , 10'; 
$qx = mysql_query($query);

while($qq = mysql_fetch_array($qx)){
  $tipo = $qq['tip_ozelligi'];
  $il_adi = $qq['il_adi'];
  $cc = $qq['cc'];
	$il_no=$qq['il_no'];
  fwrite($cont,"<a href=\"emlakara.php?geldigi=$il_adi ilinde $tipo&il_no=$il_no&tip_ozelligi=$tipo\">$il_adi $tipo </a>, ");
  $i++;
}

fclose($cont);
 ?>