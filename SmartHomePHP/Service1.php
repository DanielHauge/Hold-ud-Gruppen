<?php
class GennemsnitA {
  public $til; // string
  public $fra; // string
  public $type; // string
}

class GennemsnitAResponse {
  public $GennemsnitAResult; // int
}

class Forskellen {
  public $AvgA; // string
  public $AvgB; // string
}

class ForskellenResponse {
  public $ForskellenResult; // int
}

class FangData {
  public $type; // string
}

class FangDataResponse {
  public $FangDataResult; // int
}

class FangDataTilSheet {
  public $type; // string
}

class FangDataTilSheetResponse {
  public $FangDataTilSheetResult; // string
}

class send {
  public $type; // string
  public $værdi; // int
}

class sendResponse {
}

class char {
}

class duration {
}

class guid {
}


/**
 * Service1 class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class Service1 extends SoapClient {

  private static $classmap = array(
                                    'GennemsnitA' => 'GennemsnitA',
                                    'GennemsnitAResponse' => 'GennemsnitAResponse',
                                    'Forskellen' => 'Forskellen',
                                    'ForskellenResponse' => 'ForskellenResponse',
                                    'FangData' => 'FangData',
                                    'FangDataResponse' => 'FangDataResponse',
                                    'FangDataTilSheet' => 'FangDataTilSheet',
                                    'FangDataTilSheetResponse' => 'FangDataTilSheetResponse',
                                    'send' => 'send',
                                    'sendResponse' => 'sendResponse',
                                    'char' => 'char',
                                    'duration' => 'duration',
                                    'guid' => 'guid',
                                   );

  public function Service1($wsdl = "http://smarthomewebservice.cloudapp.net/Service1.svc?wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param GennemsnitA $parameters
   * @return GennemsnitAResponse
   */
  public function GennemsnitA(GennemsnitA $parameters) {
    return $this->__soapCall('GennemsnitA', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param Forskellen $parameters
   * @return ForskellenResponse
   */
  public function Forskellen(Forskellen $parameters) {
    return $this->__soapCall('Forskellen', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param FangData $parameters
   * @return FangDataResponse
   */
  public function FangData(FangData $parameters) {
    return $this->__soapCall('FangData', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param FangDataTilSheet $parameters
   * @return FangDataTilSheetResponse
   */
  public function FangDataTilSheet(FangDataTilSheet $parameters) {
    return $this->__soapCall('FangDataTilSheet', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param send $parameters
   * @return sendResponse
   */
  public function send(send $parameters) {
    return $this->__soapCall('send', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

}

?>
