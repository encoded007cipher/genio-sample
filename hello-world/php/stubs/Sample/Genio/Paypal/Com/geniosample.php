<?php
namespace Sample\Genio\Paypal\Com;

use PayPal\Core\PPBaseService;
use PayPal\Core\PPUtils;
use PayPal\Exception\PPTransformerException;
use Sample\Genio\Paypal\Com\SayHelloRequest;
use Sample\Genio\Paypal\Com\SayHelloResponse;
/**
* AUTO GENERATED service wrapper class
*/
class geniosample extends PPBaseService {

	private static $SERVICE_NAME = "geniosample";
	private static $SERVICE_VERSION = "";
	private static $SDK_NAME    = "";
	private static $SDK_VERSION = "";

	public function __construct() {
		parent::__construct('geniosample', 'SOAP');
	}

	/**
	* 
	* @param Sample\Genio\Paypal\Com\SayHelloRequest $sayHelloRequest
	* @param PayPal\Core\PPApiContext $apiContext
	* @return Sample\Genio\Paypal\Com\SayHelloResponse
	*/
	public function sayHello( $sayHelloRequest, $apiContext) {
		
		$apiContext->addHttpHeader("SOAPAction", '"uri:com.paypal.genio.sample/sayHello"');
	
		$handlers = array(
			new \PayPal\Handler\GenericSoapHandler($this->xmlNamespacePrefixProvider()),
		);
		$resp = $this->call('geniosample', 'sayHello',  $sayHelloRequest, $apiContext, $handlers);
		
		$ret = new SayHelloResponse();
		$ret->init(PPUtils::xmlToArray($resp));
		return $ret;
	}



	/**
	 * fucntion with namespaces and corresponding prefixes used in SOAP request serialization
	 */
	public function xmlNamespacePrefixProvider(){

			$namespace = "";
			$namespace .= 'xmlns:xml="http://www.w3.org/XML/1998/namespace" ';
			$namespace .= 'xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" ';
			$namespace .= 'xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" ';
			$namespace .= 'xmlns:tns="http://com.paypal.genio.sample" ';
			$namespace .= 'xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" ';
			$namespace .= 'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
			$namespace .= 'xmlns:xsd="http://www.w3.org/2001/XMLSchema" ';
			$namespace .= 'xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" ';

			return $namespace;
	}
}
