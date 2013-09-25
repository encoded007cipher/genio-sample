<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/khan.php';

// Create an ApiContext with null argument
// since we are running an API call that does not
// require authentication
$apiContext = new PayPal\Rest\ApiContext(null);

// Set other configuration parameters
$apiContext->setConfig(
	array(
		'service.EndPoint' => 'http://www.khanacademy.org',
		'log.LogEnabled' => true,
		'log.LogLevel' => 'FINE',
		'log.FileName' => 'khan.log'
	)
);

// Call the get_exercises_videos function. Passing in an empty array for the $queryParameters argument
$res = 	MyApp\Khan::get_exercises_videos('logarithms_1', array(), $apiContext);
?>
<html>
<head><title>Khan Academy Videos</title></head>
<body>
<?php
// Display results
foreach(json_decode($res) as $video) {
	echo "<div>";
	echo "<h4>{$video->title}</h4>";
	echo "<i>{$video->translated_description}</i>";
	echo "<div><b>Keywords:</b> {$video->keywords}<div>";
	echo "<a href='{$video->url}<div>'><img src='{$video->image_url}'/></a>";
	echo "</div>";
}
?>
</body>
</html>
