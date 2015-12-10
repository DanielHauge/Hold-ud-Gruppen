<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        
        
       
        
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      
            
      function drawChart() {
         //Temp
         
        var TemperaturA = <?php 
        if (isset($_POST['t1'])){
          require './Service1.php';
          $webserv = new Service1();
          $GTempA = new GennemsnitA();
          $GTempA->fra = $_POST['t1'];
          $GTempA->til = $_POST['t2'];
          $GTempA->type = 'Temperature';
          $TempA = $webserv->GennemsnitA($GTempA)->GennemsnitAResult;
          echo $TempA;
          }else {
              echo 10;
          }
          ?> ;
         var TemperaturB = <?php 
          if (isset($_POST['t1'])){
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

