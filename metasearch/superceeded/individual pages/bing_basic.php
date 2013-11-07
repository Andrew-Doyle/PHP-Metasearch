<head>
<title>Bing Metasearch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php error_reporting(0); ?> 
<body                >

<h1>BING IT</h1> 
<a href="http://www.skysports.com/football" target="new"><img src="tamy.jpg" width="200" height="200" alt="dog"></a>
<form method="POST" action="bing.php">  
<label for="query">Have a search</label><br/> <input name="query" type="text" size="60" maxlength="60" value="" /><br /><br /> 
<input name="bt_search" type="submit" value="Search" /> 
</form> 

<h2>Results</h1>
{RESULTS}

<?php

/****
* Simple PHP application for using the Bing Search API
*/

$acctKey = 'hx2sFkICa/5Ajj8JHvjUgO/cwmG+s0D4NiyKot/tR5Q=';
$rootUri = 'https://api.datamarket.azure.com/Bing/Search';
// Read the contents of the .html file into a string.
//$contents = file_get_contents('bing_basic2.html'); //changed from bing_basic
if ($_POST['query'])
{
// Here is where you'll process the query.
// The rest of the code samples in this tutorial are inside this conditional block.

// Encode the query and the single quotes that must surround it.
$query = urlencode("'{$_POST['query']}'");

$serviceOp = 'Web';
// Construct the full URI for the query.
$requestUri = "$rootUri/$serviceOp?\$format=json&Query=$query";

// Encode the credentials and create the stream context.
$auth = base64_encode("$acctKey:$acctKey");
$data = array(
'http' => array(
'request_fulluri' => true,
// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
'ignore_errors' => true,
'header' => "Authorization: Basic $auth")
);
$context = stream_context_create($data);
// Get the response from Bing.
$response = file_get_contents($requestUri, 0, $context);

// Decode the response.
$jsonObj = json_decode($response);
$resultStr = " ";
foreach($jsonObj->d->results as $value)
{

switch ($value->__metadata->type)
	{
		case 'WebResult':
		$resultStr .=
		"<a href=\"{$value->Url}\">{$value->Title}</a><p>{$value->Description}</p>";
		break;
		case 'ImageResult':
		$resultStr .=
		"<h4>{$value->Title} ({$value->Width}x{$value->Height}) " .
		"{$value->FileSize} bytes)</h4>" .
		"<a href=\"{$value->MediaUrl}\">" .
		"<img src=\"{$value->Thumbnail->MediaUrl}\"></a><br />";
		break;
	}
}
	// Substitute the results placeholder. Ready to go.
	$contents = str_replace('{RESULTS}', $resultStr, $contents);


}
echo$contents;


?>
</body>

</html>

