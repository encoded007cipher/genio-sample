<?php
namespace Sample\Genio\Paypal\Com;
use PayPal\Core\PPXmlMessage;
/**
 * 
 */
class SayHelloResponse extends PPXmlMessage {
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


}
