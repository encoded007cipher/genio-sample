<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/khan.php';


$token = 'VjSj3fJJzxh5Npru';
$tokenSecret = 'LLEqEgPAzTABHvPm';

$apiContext = new PayPal\Rest\ApiContext(new PayPal\Auth\OAuthTokenCredential($token, $tokenSecret));
$apiContext->setConfig(
	array(
		'service.EndPoint' => 'http://www.khanacademy.org',
		'log.LogEnabled' => true,
		'log.LogLevel' => 'FINE',
		'log.FileName' => 'khan.log'
	)
);

# Call the get_exercises_videos function. Passing in an empty array for the $queryParameters argument
$res = 	MyApp\Khan::get_exercises_videos('logarithms_1', array(), $apiContext);

foreach(json_decode($res) as $video) {
	echo "<div>";
	echo "<h4>{$video->title}</h4>";
	echo "<i>{$video->translated_description}</i>";
	echo "<div><b>Keywords:</b> {$video->keywords}<div>";
	echo "<a href='{$video->url}<div>'><img src='{$video->image_url}'/></a>";
	echo "</div>";
}
