<?php
        require_once './Service1.php';
        $Temp = new Service1();
        $FangTemp = new FangData();
        $FangTemp->type = "Temperature";
        $TempResult = $Temp->FangData($FangTemp);
        echo $TempResult->FangDataResult;
        ?>
		
        