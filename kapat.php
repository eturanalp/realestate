<?
session_start();
session_destroy();
echo "Oturumunuz başarıyla sonlanmıştır. Şimdi evbulur.com 'a yönlendirileceksiniz..";

//header("Location: index.php");
?>
<head>
<title>www.evbulur.com Oturumu başarıyla sonlandı</title>
<meta content=tr http-equiv=Content-Language>
<meta content="text/html; charset=ISO-8859-9" http-equiv=Content-Type>
<meta http-equiv="REFRESH" content="3;url=http://www.evbulur.com"></HEAD>