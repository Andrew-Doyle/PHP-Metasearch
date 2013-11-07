
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Metasearch</title>

<link href="results1.css" rel="stylesheet" type="text/css" />


</head>

<?php error_reporting(0); ?> 
<body                >
<div id="container">
  <div id="wrapper">
    <div id="header">
        <h1 align="center">Bing Search Engine</h1>
    </div>
    <div id="navbar2"> 
      <div align="left">
        <div class="navbar">
  <ul>
  	<li>Use Search Engines Individually:</li>
    <li><a href="bing.php" title="Bing" id="homelink">Bing</a></li>
    <li><a href="google.php" title="Google id="costslink">Google</a></li>
    <li><a href="yahoo.php" title="Yahoo"id="directorylink">Yahoo</a></li>
    <li><a href="blekko_basic.php" title="Blekko" id="buyinglink"> Blekko </a></li>
        
  </ul>
        </div>
  <?php if($_SERVER['REQUEST_METHOD']!='POST')
	{   
     echo'<div id="navbar2">'; 
      echo'<div align="left">';
        echo'<div class="navbar">';
  
    echo '
		<form action="index.php" method="POST">
		<fieldset>
		<legend>Enter your search below</legend>
		<textarea rows="5" cols="40" name="query">
		</textarea>
		</fieldset>
		<p>
		<input type="submit" value="Non-Aggregated">
		<input type="submit" value="Aggregated" checked="checked">
		</p>
		</form>';
		
		 echo'</div>';
      echo'</div>';
	  echo'</div>';
	}
	else
	{
	echo'<div id="mainwrapper">';
   
echo'<div id="column_1_of_3">';
		echo'<ul>';
			echo'<li><strong><a href="yahoo.php">Yahoo</a></strong></li>';
		echo'</ul>';
			   //################################################## YAHOO ##########################################################################################-->
		   //$contents = file_get_contents('google_basic.html'); //changed from bing_basic
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
echo'</div>';  // END OF ADBAR 4

echo'<div id="column_2_of_3">';
		echo'<ul>';
		   echo'<li><strong><a href="google.php">Google</a></strong></li>';
		echo'</ul>';
				
		//################################################# GOOGLE ##########################################################################################-->
		
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
     
echo'</div>';
echo'<div id="column_3_of_3">';
		echo'<ul>';           
			echo'<li><strong><a href="bing.php">Bing</a></strong>';
			echo'</li>';
		echo'</ul>';
		//################################################## BING ##########################################################################################-->
		
			/****
		* Simple PHP application for using the Bing Search API
		*/
		//echo'{RESULTS}';
		
		$acctKey = 'hx2sFkICa/5Ajj8JHvjUgO/cwmG+s0D4NiyKot/tR5Q=';
		$rootUri = 'https://api.datamarket.azure.com/Bing/Search';
		// Read the contents of the .html file into a string.
		//$contents = file_get_contents('bing_basic2.html'); //changed from bing_basic
		if ($_POST['query'])
		{
			echo $newline;
		// Here is where you'll process the query.
		// The rest of the code samples in this tutorial are inside this conditional block.
		
		// Encode the query and the single quotes that must surround it.
		$query1 = urlencode("'{$_POST['query']}'");
		
		$serviceOp = 'Web';
		// Construct the full URI for the query.
		$requestUri = "$rootUri/$serviceOp?\$format=json&Query=$query1";
		
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
		"<a href=\"{$value->Url}\"><font color='blue'>{$value->Title}</font></a><p>{$value->Description}</p>";
		break;
		//case 'ImageResult':
		//$resultStr .=
		//"<h4>{$value->Title} ({$value->Width}x{$value->Height}) " .
		//"{$value->FileSize} bytes)</h4>" .
		//"<a href=\"{$value->MediaUrl}\">" .
		//"<img src=\"{$value->Thumbnail->MediaUrl}\"></a><br />";
		//break;
		}
		}
		// Substitute the results placeholder. Ready to go.
		//$contents = str_replace('{RESULTS}', $resultStr, $contents);
		
		echo $resultStr; 
		echo $contents;
		}
     
echo'</div>';
echo'</div>';
	
		
	}

     ?>  
     
    <div id="footerbox">
        <div align="left">
        <div class="navbar">
  <ul>
    <li>Site Map</li>
    <li><a href="contact.html" title="Contact" >Contact</a></li>
    <li>Please note that this website is for educational purposes only</li>
    <li>Metasearch 2013</li>
    </ul>
        </div>
        </div>
      </div>
  </div></div>

</body>
</html>