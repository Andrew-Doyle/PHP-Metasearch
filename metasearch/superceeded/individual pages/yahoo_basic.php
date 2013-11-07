<head>
<title>Yahoo Metasearch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php error_reporting(0); ?> 
<body                >

<h1>Yahoo! Search</h1>
<a href="http://www.skysports.com/football" target="new"><img src="tamy.jpg" width="200" height="200" alt="dog"></a>
<form method="POST" action="yahoo.php">
<label for="query">Have a search</label><br/> <input name="query" type="text" size="60" maxlength="60" value="" /><br /><br /> 
<input name="bt_search" type="submit" value="Search" /> 
</form> 
<h2>Results</h1>


<?php
//echo phpinfo();
//$contents = file_get_contents('google_basic.html'); //changed from bing_basic
if ($_POST['query'])
{
$newline="<br />";
$query = urlencode("'{$_POST['query']}'");

// FROM http://developer.yahoo.com/boss/search/boss_api_guide/codeexamples.html#oauth_php
require("OAuth.php");
 
$cc_key  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
$cc_secret = "0da971bde30bc898c4706c223e3c343d65af0fc0";
$url = "http://yboss.yahooapis.com/ysearch/web";
$args = array();
$args["q"] = "$query";
$args["format"] = "json";
 
$consumer = new OAuthConsumer($cc_key, $cc_secret);
$request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
$url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
$ch = curl_init();
$headers = array($request->to_header());
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //as per google method
$rsp = curl_exec($ch);
$results = json_decode($rsp); 

foreach ($results->bossresponse->web->results as $result)
{
echo "<a href=\"{$result->url}\"><font color ='blue'>{$result->title}</font></a>".": "."$newline"."$newline".$result->abstract."\n\n";

echo $newline;
echo $newline;

}



}

?>
</body>
</html>
