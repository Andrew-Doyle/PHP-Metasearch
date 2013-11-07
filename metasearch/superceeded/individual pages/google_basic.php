<head>
<title>Google Metasearch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php error_reporting(0); ?> 
<body                >

<h1>Google Search</h1>
<a href="http://www.skysports.com/football" target="new"><img src="tamy.jpg" width="200" height="200" alt="dog"></a>
<form method="POST" action="google.php">
<label for="query">Have a search</label><br/> <input name="query" type="text" size="60" maxlength="60" value="" /><br /><br /> 
<input name="bt_search" type="submit" value="Search" /> 
</form> 
<h2>Results</h1>


<?php
if ($_POST['query'])
{
	$newline="<br />";
echo $newline;
$query = urlencode("'{$_POST['query']}'");

$url="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json";

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);

curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

$data = curl_exec($ch);

$js = json_decode($data);
//var_dump( $js -> {'items' } ); //what is this for?

foreach ($js->{ 'items' } as $item ) 
{

echo "<a href=\"{$item->{ 'link' }}\"><font color ='blue'>{$item->{ 'title' }}</font></a>".": "."$newline"."$newline".$item->{ 'snippet' }."\n\n";

echo $newline;
echo $newline;
}



}
/*/****
* Simple PHP application for using the Bing Search API

//$acctKey = 'QN/uNMb3wJyLWiFmLnG9Wa7hyWTPiw2PBy2O7t87MS4= '; // NOT NEEDED, THIS IS THE BING KEY
$rootUri = 'https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw'; // NOT REQUIRED?
// Read the contents of the .html file into a string.
$contents = file_get_contents('google_basic.html'); //changed from bing_basic
if ($_POST['query'])
{
// Here is where you'll process the query.

// Encode the query and the single quotes that must surround it.
$query = urlencode("'{$_POST['query']}'");
// Get the selected service operation (Web or Image).
$serviceOp = $_POST['service_op'];
// Construct the full URI for the query.
$requestUri ="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&callback=json";

// Encode the credentials and create the stream context.
//$auth = base64_encode("$acctKey:$acctKey");
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
$resultStr = '';
// Parse each result according to its metadata type.
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
*/

?>
</body>
</html>
