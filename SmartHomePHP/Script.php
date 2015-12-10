<?php 
          require_once './Service1.php';
          $webserv = new Service1();
          $FangTempA = new GennemsnitA();
          $FangTempA->fra = "";
          $FangTempA->til = "";
          $FangTempA->type = "";
          $TempA = $webserv->GennemsnitA($FangTempA)->FangDataTilSheetResult;
          echo $TempA; 
          
  ?>

