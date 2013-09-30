<?php
require __DIR__ . '/vendor/autoload.php';

use PayPal\Common\PPApiContext;
use Sample\Genio\Paypal\Com\SayHelloRequest;
use Sample\Genio\Paypal\Com\geniosample;

// Create the API context. 
// See  https://github.com/paypal/sdk-core-php/wiki/Configuring-the-SDK#connection-information for all supported parameters.
$apiContext = new PPApiContext(array(
  'service.EndPoint' => 'http://genio-helloworld.herokuapp.com/index.php',
  'log.LogEnabled' => true,
  'log.FileName' => 'app.log',
  'log.LogLevel' => 'INFO'
));

// Create request data
$req = new SayHelloRequest();
$req->message = 'Universe';


// Create a service object and shoot a request
$s = new geniosample();
try {
  $resp = $s->sayHello($req, $apiContext);
  var_dump($resp);
} catch (Exception $ex) {
  var_dump($ex);
}
