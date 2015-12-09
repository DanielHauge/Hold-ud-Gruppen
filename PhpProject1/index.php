<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML>
<html lang = "en">    
  <head>
      <style>
          body  {
        text-align:center;    
                }              

</style>
    <title>SmartHome</title>
    <meta charset = "UTF-8" />
  </head>
  
  <body background="http://cdn1.bestpsdfreebies.com/wp-content/uploads/2014/05/Part-1-Background-5-without-Glare.jpg">  
        
            <h1>Oversigt</h1> 
        
        
       <fieldset>
        <?php
        require_once './Service1.php';
        $Temp = new Service1();
        $FangTemp = new FangData();
        $FangTemp->type = "Temperature";
        $TempResult = $Temp->FangData($FangTemp);
        echo $TempResult->FangDataResult;
        ?>
          <br>
          <br><?php
        $Fugt = new Service1();
        $FangFugt = new FangData();
        $FangFugt->type = "Fugt";
        $FugtResult = $Fugt->FangData($FangFugt);
        echo $FugtResult->FangDataResult;
        ?>   
          <br>
          <br><?php
        $Lys = new Service1();
        $FangLys = new FangData();
        $FangLys->type = "Lys";
        $LysResult = $Lys->FangData($FangLys);
        echo $LysResult->FangDataResult;
        ?>
          <br>
          <br><?php
        $Forbrug = new Service1();
        $FangForbrug = new FangData();
        $FangForbrug->type = "Forbrug";
        $ForbrugResult = $Forbrug->FangData($FangForbrug);
        echo $ForbrugResult->FangDataResult;
        ?>
          <br>
          <br><?php
        $Mov = new Service1();
        $FangMov = new FangData();
        $FangMov->type = "Movement";
        $MovResult = $Mov->FangData($FangMov);
        echo $MovResult->FangDataResult;
        ?>
          <br>
          <br><?php
        $Lyd = new Service1();
        $FangLyd = new FangData();
        $FangLyd->type = "Lyd";
        $LydResult = $Lyd->FangData($FangLyd);
        echo $LydResult->FangDataResult;
        ?>
          
          <br><?php
        $kwh = new Service1();
        $gennemsnit = new GennemsnitA();
        $gennemsnit->fra = "";
        $gennemsnit->til = "";
        $gennemsnit->type = "kwh";
        $kwhresult = $kwh->GennemsnitA($gennemsnit)->GennemsnitAResult;
        echo kwhresult;
        ?>
          
          
          <br><?php
	$Lys = new Service1();
	$FangLys = new FangData();
	$FangLys->type = "Lys";
	$LysResult = $Lyd->FangData($FangLys);
	echo $LydResult->FangDataResult;
	?>
       </fieldset>
        
        <h1>Styring</h1>
       <fieldset>
           <form action="demo_form.asp">
            Angiv Styrke : <input type="text" name="Styrke">
            <FORM action="Sammenlign.html"><INPUT type=submit value="Confirm"><a
        href="Sammenlign.html" ></a></FORM>
            <br>
            <form action="demo_form.asp">
            Angiv Temperatur : <input type="text" name="Temp">
            <FORM action="Sammenlign.html"><INPUT type=submit value="Confirm"><a
        href="Sammenlign.html" ></a></FORM>

           
                      
       </fieldset>
        
        <h1>Sammenligning</h1>
       <fieldset>
          
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <FORM action="DateTime.html"><INPUT type=submit value="Sammenlign"><a
        href="DateTime.html" ></a></FORM>
       </fieldset>
        
    
     
        
        
   
  </body>
</html>