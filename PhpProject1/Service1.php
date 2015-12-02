<?php
class GennemsnitA {
  public $fra; // string
  public $til; // string
  public $type; // string
}

class GennemsnitAResponse {
  public $GennemsnitAResult; // string
}

class GennemsnitB {
  public $fra; // string
  public $til; // string
  public $type; // string
}

class GennemsnitBResponse {
  public $GennemsnitBResult; // string
}

class Forskellen {
  public $AvgA; // string
  public $AvgB; // string
}

class ForskellenResponse {
  public $ForskellenResult; // string
}

class FangData {
  public $type; // string
}

class FangDataResponse {
  public $FangDataResult; // string
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
                                    'GennemsnitB' => 'GennemsnitB',
                                    'GennemsnitBResponse' => 'GennemsnitBResponse',
                                    'Forskellen' => 'Forskellen',
                                    'ForskellenResponse' => 'ForskellenResponse',
                                    'FangData' => 'FangData',
                                    'FangDataResponse' => 'FangDataResponse',
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
   * @param GennemsnitB $parameters
   * @return GennemsnitBResponse
   */
  public function GennemsnitB(GennemsnitB $parameters) {
    return $this->__soapCall('GennemsnitB', array($parameters),       array(
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

}

?>
