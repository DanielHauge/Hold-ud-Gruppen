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
<nav><a href="index.html" class="navForside">Forside</a> <a href="omsmarthome.html" class="navOmSH">Om SmartHome</a> <a href="kontakt.php" class="navKontakt">Kontakt</a> <a href="login.php" class="navLogin">Login</a></nav>
</header>
<aside class="asideleft">
  <h1>Log ind og udforsk dit hjem</h1>
</aside>
<section>
  <h2>Styr dit hjem, ligemeget hvor i verden du er!</h2>
<p><strong>Log ind her med dit brugernavn og kode som er blevet sendt til dig. Og start med udforske dit hjem. Vi har installeret det hele i dit hus, og du kan allerede nu se hvor meget dit forbrug er, samt styre dit hjem ligemeget hvor du er.</strong></p>
</section>
<br>
<form action= "login.php" method="post">


<table width="232" border="1" align="center">
  <tbody>
    <tr>
      <td width="76"><strong>Brugernavn:</strong></td>
      <td width="144">
        <input type="text" name="u_name" id="u_name"></td>
    </tr>
    <tr>
      <td width="76"><strong>Koden:</strong></td>
      <td>
        <input type="password" name="u_pass" id="u_pass"></td>
    </tr>
    <tr>
      <td colspan="2"><div align ="center"><input type="submit" name="Login" id="submit" value="Login"></div></td>
    </tr>
  </tbody>
</table>
</form>
<?php

$con= mysql_connect("eu-cdbr-azure-west-c.cloudapp.net", "bd599994df031d","79b11c89") or die (mysql_error());
$db=  mysql_select_db('SmartHomeDB',$con)or die (mysql_error());
        
 if (isset($_POST['Login']))  
 {
      $name=$_POST['u_name'];
      $pass=$_POST['u_pass'];
  if ($name=='')
  {
   echo'Udfyld de tomme felter';
   
 }
 
 if ($pass=='')
  {
   echo'Udfyld de tomme felter';
   
 }
 
 else {
          
          
$quert ="Select * from login where username ='$name' AND password = '$pass'";
$run =  mysql_query($quert) or die (mysql_error());
 }
 if (mysql_num_rows($run)>0){
     header("Location: loggedin.php");
 }
 else {
     echo '<strong>Brugernavn eller Adganskode er forkert, prøv venligtst igen</strong>';
 }
 }
?>
<footer>Copyright 2015 by Hold Ud Gruppen. Made with agile mindset.</footer>

</body>
</html>
