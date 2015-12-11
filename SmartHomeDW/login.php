<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Smart Home</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2,n4:default;league-gothic:n4:default;bitter:n4:default.js" type="text/javascript"></script>
</head>
<body>
<header><img src="images/Smart-Home-Entertainment-Logo.png" width="350" alt=""/>
<nav><a href="index.html" class="navForside">Forside</a> <a href="omsmarthome.html" class="navOmSH">Om SmartHome</a> <a href="kontakt.html" class="navKontakt">Kontakt</a> <a href="login.html" class="navLogin">Login</a></nav>
</header>
<aside class="asideleft">
  <h1>Log ind og udforsk dit hjem</h1>
</aside>
<section>
  <h2>Styr dit hjem, ligemeget hvor i verden du er!</h2>
<p><strong>Log ind her med dit brugernavn og kode som er blevet sendt til dig. Og start med udforske dit hjem. Vi har installeret det hele i dit hus, og du kan allerede nu se hvor meget dit forbrug er, samt styre dit hjem ligemeget hvor du er.</strong></p>
</section>
<br>
<form action= "index.php" method="post">
<table width="232" border="1" align="center">
  <tbody>
    <tr>
      <td width="76"><strong>Brugernavn</strong>:</td>
      <td width="144">
        <input type="text" name="u_name" id="u_name"></td>
    </tr>
    <tr>
      <td><strong>Koden:</strong></td>
      <td>
        <input type="password" name="u_pass" id="u_pass"></td>
    </tr>
    <tr>
      <td><strong>Email:</strong></td>
      <td>
        <input type="text" name="email" id="email"></td>
    </tr>
    <tr>
      <td colspan="2"><div align ="center"><input type="submit" name="submit" id="submit" value="Login"></div></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php
//$con= mysql_connect("eu-cdbr-azure-west-c.cloudapp.net", "bd599994df031d","79b11c89") or die (mysql_error());
//$db=  mysql_select_db('smarthomedb',$con)or die (mysql_error());
        
 
if(isset($_POST['submit']))
{

$host="eu-cdbr-azure-west-c.cloudapp.net";
$port=3306;
$socket="";
$user="bd599994df031d";
$password="79b11c89";
$dbnamef="";

$con = new mysqli($host, $user, $password, $dbnamef, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

@mysql_select_db("SmartHomeDB",$con) or die("Could not select database");

$name =$_POST['u_name'];
$pass= $_POST['u_pass'];
$email=$_POST['email'];


$sql="INSERT INTO opretbruger(username,password,email) 
VALUES($name ,$pass,$email)";

$result=mysql_query($sql,$con);

if($result) {
    echo "<p>Bruger er oprrettet!</p>";
}
else {
    echo "<p>prøv igen!!</p>";

mysql_close($con);

 }}?>

</form>
<footer>Copyright 2015 by Hold Ud Gruppen. Made with agile mindset.</footer>

</body>
</html>
