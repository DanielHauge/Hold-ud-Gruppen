<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Smart Home</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2:default;league-gothic:n4:default;bitter:n4:default.js" type="text/javascript"></script>
</head>

<body>
<header><img src="images/Smart-Home-Entertainment-Logo.png" width="350" alt=""/>
<nav><a href="index.html" class="navForside">Forside</a> <a href="omsmarthome.html" class="navOmSH">Om SmartHome</a> <a href="kontakt.php" class="navKontakt">Kontakt</a> <a href="login.php" class="navLogin">Login</a></nav>
</header>
<aside class="asideleft">
  <h1>Større udbytte med mindre energi</h1>
</aside>
<section>
  <h2>Følg med på din energiforbrug </h2>
<p>Smart Home elektronik varmeanlæg optimerer energieffektiviteten i et fjernvarmesystem. Dette skaber energibesparelser på omkring 10-15% og længere levetid på systemet. SmartHome portal er en online adgang til alle dine radiatorer. Herfra kan du helt gratis og døgnet rundt overvåge energiforbruget i dit hjem.</p>
</section>
<br>
<form class="formvejr"> <a href="http://www.accuweather.com/en/dk/roskilde/125902/weather-forecast/125902" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1449414539745" class="aw-widget-current"  data-locationkey="125902" data-unit="c" data-language="da" data-useip="false" data-uid="awcc1449414539745"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
</form>
<br>
<br>
<h1>Styring</h1>
<section>
       <fieldset>
           <form action="demo_form.asp">
            <strong>Angiv Styrke</strong> :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
             <input type="text" name="Styrke">
            <input type=submit value="Confirm">
            <FORM action="Sammenlign.html"><a
        href="Sammenlign.html" ></a></FORM>
            <br>
            <form action="demo_form.asp">
            <strong>Angiv Temperatur</strong> :
<input type="text" name="Temp">
<input type=submit value="Confirm">
            <FORM action="Sammenlign.html"><a
        href="Sammenlign.html" ></a></FORM>
  </section>
<br>
<h1>Overblik over dit hjem</h1>
<br>
<h3>Temperaturen i dit hjem</h3>
<section>
<form>
<fieldset>
<?php
        require_once './Service1.php';
        $Temp = new Service1();
        $FangTemp = new FangData();
        $FangTemp->type = "Temperature";
        $TempResult = $Temp->FangData($FangTemp);
        echo $TempResult->FangDataResult;
        ?>
  </fieldset>
</form>
</section>
<br>
<br>
<h3>Fugt niveauet i dit hjem</h3>
<section>
<form>
<fieldset>
<?php
$Fugt = new Service1();
        $FangFugt = new FangData();
        $FangFugt->type = "Fugt";
        $FugtResult = $Fugt->FangData($FangFugt);
        echo $FugtResult->FangDataResult;
        ?>   
</fieldset>
</form>
</section>
<h3>Lys niveauet i dit hjem</h3>
<section>
<form>
<fieldset>
<?php
        $Lys = new Service1();
        $FangLys = new FangData();
        $FangLys->type = "Lys";
        $LysResult = $Lys->FangData($FangLys);
        echo $LysResult->FangDataResult;
        ?>
</fieldset>
</form>
</section>
<h3>Se dit forbrug</h3>
<section>
<form>
<fieldset>
<?php
        $Forbrug = new Service1();
        $FangForbrug = new FangData();
        $FangForbrug->type = "Forbrug";
        $ForbrugResult = $Forbrug->FangData($FangForbrug);
        echo $ForbrugResult->FangDataResult;
        ?>
</fieldset>
</form>
</section>
<br>
<h3>Seneste lyd i dit hjem</h3>
<section>
<form>
<fieldset>
<?php
        $Lyd = new Service1();
        $FangLyd = new FangData();
        $FangLyd->type = "Lyd";
        $LydResult = $Lyd->FangData($FangLyd);
        echo $LydResult->FangDataResult;
        ?>
</fieldset>
</form>   
<br>
<br>
<form class="formvejr"> <a href=<a href="http://www.accuweather.com/en/dk/roskilde/125902/weather-forecast/125902" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awtd1449414539745" class="aw-widget-36hour"  data-locationkey="125902" data-unit="c" data-language="da" data-useip="false" data-uid="awtd1449414539745" data-editlocation="false"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>

</form>  
<br>
 <br>
<footer>Copyright 2015 by Hold Ud Gruppen. Made with agile mindset.</footer>

</body>
</html>
