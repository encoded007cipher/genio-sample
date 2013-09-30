<?php
namespace Paypal\Genio\Sample;
use PayPal\Core\PPXmlMessage;
/**
 * 
 */
class SayHelloRequest extends PPXmlMessage {
	/**
	 * 
	 * @access public
	 * @namespace
	 * @var string
	 */
	public $message;


	/**
	 * Constructor with mandatory properties
	 *
     * @param string $message
	 */
	public function __construct($message = NULL) {
        $this->message = $message;
    }

	public function toXMLString()
	{
		$str = '<tns:SayHelloRequest>';
		if($this->message != NULL)
		{
			$str .= '<message>';
			$str .= $this->message;
			$str .= '</message>';
		}
		$str .= '</tns:SayHelloRequest>';
		return $str;
	}

}
