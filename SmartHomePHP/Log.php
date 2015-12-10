<!doctype html>
<html>
<head>
    
            
    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        
        
        
        
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      
            
      function drawChart() {
         
         
          
        var data = google.visualization.arrayToDataTable([
          ['Sammenlign', 'GennemsnitB', 'GennemSnitA'],
          ['Temperatur', <?php 
              
          
          require_once './Service1.php';
          $webserv = new Service1();
          $FangTempA = new FangData();
          $FangTempA->type = 'Temperature';
          $TempA = $webserv->FangData($FangTempA)->FangDataResult;
                   
          
          ?>, 5],
          ['2015', 2, 2],
          ['2016', 2, 2],
          ['2017', 2, 2]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, options);
      }
    </script>   
    
<meta charset="utf-8">
<title>Smart Home</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2:default;league-gothic:n4:default;bitter:n4:default.js" type="text/javascript"></script>
</head>

<body>
<header><img src="images/Smart-Home-Entertainment-Logo.png" width="350" alt=""/>
<nav><a href="index.html" class="navForside">Forside</a> <a href="Sammenlign.html" class="navOmSH">SammenLign</a> <a href="kontakt.html" class="navKontakt">Kontakt</a> <a href="index.html" class="navLogin">Logud</a></nav>
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
<section>

<form>

    
    
    
 
<h3>Bar Chart</h3>
 <div id="barchart_material" style="width: 900px; height: 500px;"></div>    

</form>
</section>
<footer>Copyright 2015 by Hold Ud Gruppen. Made with agile mindset.</footer>

</body>
</html>
