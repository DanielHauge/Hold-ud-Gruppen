<!doctype html>
<html>
<head>
    
            
    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        
        
       
        
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      
      
      
      
            
      function drawChart() {
         //Temp

         

         var TemperaturA = <?php 
        if (isset($_POST['t1'])){
            require_once './Service1.php';
          $webserv = new Service1();
          $GTempA = new GennemsnitA();
          $GTempA->fra = $_POST['t1'];
          $GTempA->til = $_POST['t2'];
          $GTempA->type = 'Temperature';
          $TempA = $webserv->GennemsnitA($GTempA)->GennemsnitAResult;
          echo $TempA;
          }else {
              echo 100;
          }
          ?> ;
         var TemperaturB = <?php 
          if (isset($_POST['t1'])){
              require_once './Service1.php';
          $webserv = new Service1();
          $GTempB = new GennemsnitA();
          $GTempB->fra = $_POST['t1'];
          $GTempB->til = $_POST['t2'];
          $GTempB->type = 'Temperature';
          $TempB = $webserv->GennemsnitA($GTempB)->GennemsnitAResult;
          echo $TempB;
          }else {
              echo 10;
          }
          ?> ;         
           //Fugt       
           var FugtA = <?php 
          if (isset($_POST['t1'])){
              require_once './Service1.php';
          $webserv = new Service1();
          $GFugtA = new GennemsnitA();
          $GFugtA->fra = $_POST['t1'];
          $GFugtA->til = $_POST['t2'];
          $GFugtA->type = 'Fugt';
          $FugtA = $webserv->GennemsnitA($GFugtA)->GennemsnitAResult;
          echo $FugtA;
          }else {
              echo 10;
          }
          ?> ; 
                  
          var FugtB = <?php 
          if (isset($_POST['t1'])){
          require_once './Service1.php';
          $webserv = new Service1();
          $GFugtB = new GennemsnitA();
          $GFugtB->fra = $_POST['t1'];
          $GFugtB->til = $_POST['t2'];
          $GFugtB->type = 'Fugt';
          $FugtB = $webserv->GennemsnitA($GFugtB)->GennemsnitAResult;
          echo $FugtB;
          }else {
              echo 10;
          }
          ?> ;
            //LYS
            //
            //
            //
            
           var LysA = <?php 
           if (isset($_POST['t1'])){
          require_once './Service1.php';
          $webserv = new Service1();
          $GLysA = new GennemsnitA();
          $GLysA->fra = $_POST['t1'];
          $GLysA->til = $_POST['t2'];
          $GLysA->type = 'Lys';
          $LysA = $webserv->GennemsnitA($GLysA)->GennemsnitAResult;
          echo $LysA;
          }else {
              echo 10;
          }
          ?> ; 
          var LysB = <?php 
          if (isset($_POST['t1'])){
              require_once './Service1.php';
          $webserv = new Service1();
          $GLysB = new GennemsnitA();
          $GLysB->fra = $_POST['t1'];
          $GLysB->til = $_POST['t2'];
          $GLysB->type = 'Lys';
          $LysB = $webserv->GennemsnitA($GLysB)->GennemsnitAResult;
          echo $LysB;
          }else {
              echo 10;
          }
          ?> ;
              
          
          //LYD
              
                  var LydA = <?php 
          if (isset($_POST['t1'])){
              require_once './Service1.php';
          $webserv = new Service1();
          $GLydA = new GennemsnitA();
          $GLydA->fra = $_POST['t1'];
          $GLydA->til = $_POST['t2'];
          $GLydA->type = 'Lyd';
          $LydA = $webserv->GennemsnitA($GLydA)->GennemsnitAResult;
          echo $LydA;
          }else {
              echo 10;
          }
          ?> ; 
          var LydB = <?php 
          if (isset($_POST['t1'])){
              require_once './Service1.php';
          $webserv = new Service1();
          $GLydB = new GennemsnitA();
          $GLydB->fra = $_POST['t1'];
          $GLydB->til = $_POST['t2'];
          $GLydB->type = 'Lyd';
          $LydB = $webserv->GennemsnitA($GLydB)->GennemsnitAResult;
          echo $LydB;
          }else {
              echo 10;
          }
          ?> ;
          
          
          // Forbrug
          
          var ForbrugA = <?php 
          if (isset($_POST['t1'])){
              require_once './Service1.php';
          $webserv = new Service1();
          $GForA = new GennemsnitA();
          $GForA->fra = $_POST['t1'];
          $GForA->til = $_POST['t2'];
          $GForA->type = 'Forbrug';
          $ForA = $webserv->GennemsnitA($GForA)->GennemsnitAResult;
          echo $ForA;
          }else {
              echo 10;
          }
          ?> ; 
          var ForbrugB = <?php 
          
          if (isset($_POST['t1'])){
          require_once './Service1.php';
          $webserv = new Service1();
          $GForB = new GennemsnitA();
          $GForB->fra = $_POST['t1'];
          $GForB->til = $_POST['t2'];
          $GForB->type = 'Forbrug';
          $ForB = $webserv->GennemsnitA($GForB)->GennemsnitAResult;
          echo $ForB;
          }else {
              echo 10;
          }
          ?> ;


        var data = google.visualization.arrayToDataTable([
          ['Sammenlign', 'Tidsperiode A', 'Tidsperiode B'],
          ['Temperatur', TemperaturA, TemperaturB],
          ['Fugt', FugtA, FugtB],
          ['Lys', LysA, LysB],
          ['Lyd', LydA, LydB],
          ['Forbrug', ForbrugA, ForbrugA]
        ]);
console.log(data);
        var options = {
          chart: {
            title: 'Gennemsnits Sammenligninger fra tidsperioder',
            subtitle: 'Temperatur, Fugt, Lys, Lyd, Forbrug',
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
<nav><a href="Log.php" class="navForside">Forside</a> <a href="Sammenlign.php" class="navOmSH">SammenLign</a> <a href="index.html" class="navLogin">Logud</a></nav>
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



    
    <form method="post" action="Sammenlign.php">
        <input type="text" name="t1">
        <input type="text" name="t2">
        <input type="submit" value="Go" name="knap">
        </form>
     
 
                        
           
    <h2>Bar Chart</h2>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>    

</section>
<footer>Copyright 2015 by Hold Ud Gruppen. Made with agile mindset.</footer>

</body>
</html>
