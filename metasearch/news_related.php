
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News - Metasearch</title>

<link href="homepage2.css" rel="stylesheet" type="text/css" />



</head>

<?php error_reporting(0); ?> 
<body id="news_search">

<div id="container">
  <div id="wrapper">
<div id="pagelinks">
<div align="centre">
<div class="toppage">
	     <ul>
		<li><a href="index.php" title="Web Search" id="web_page">Web</a></li>
    	<li><a href="images.php" title="Image Search" id="image_page">Images</a></li> 
		<li><a href="news.php" title="News Search" id="news_page">News</a></li> 
			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	<li><a href="google.php" title="Google" id="google_page">Google</a></li>
	<li><a href="bing.php" title="Bing" id="bing_page">Bing</a></li>
    <li><a href="yahoo.php" title="Yahoo"id="yahoo_page">Yahoo</a></li>
    <li><a href="form.php" title="Feedback"id="Feedback_page">Feedback</a></li>
		</ul>
	
</div>
</div>
</div>

    <div id="header" class="form">
	
		<form action="newssearch.php" method="POST" >
		<input type="text" name="query" placeholder="Search" style="width: 500px;"><br>
		<p>
		<input type="radio" name="SearchType?" value="Non-Aggregated"> Non-Aggregated
		<input type="radio" name="SearchType?" value="Aggregated" checked="checked"> Aggregated 
		&nbsp;
		&nbsp;
		<input type="submit" value="Search">
		</p>
		</form>
  
     </div>
  

     
  
    
<?php if($_SERVER['REQUEST_METHOD']!='POST')
	{
		
		   
    echo'<div id="mainwrapper">';
	

  

echo'<div id="column_2_of_2">';
	
		//################################################## YAHOO ##########################################################################################-->
		echo '<img src="Resources/Images/background/yahoo.jpg" width="300" height="125" />';
		if ($_GET['query'])
		{
		$newline="<br />";
		$query = urlencode("'{$_GET['query']}'");
		
	
				
		// FROM http://developer.yahoo.com/boss/search/boss_api_guide/codeexamples.html#oauth_php
		require("OAuth.php");
		 
		$cc_key  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url = "http://yboss.yahooapis.com/ysearch/news";
		$args = array();
		$args["q"] = "$query";
		$args["format"] = "json";
		//$args2["key"]="value";
		 
		$consumer = new OAuthConsumer($cc_key, $cc_secret);
		$request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
		$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
		$url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
		$ch = curl_init();
		$headers = array($request->to_header());
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
		$rsp = curl_exec($ch);
		$results = json_decode($rsp,true); 
						
		$yahooarray1 = $results['bossresponse']['news']['results'];
		
			
		$query2 = urlencode("'{$_GET['query']}'");
		$cc_key2  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret2 = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url2 = "http://yboss.yahooapis.com/ysearch/news";
		$args2 = array();
		$args2["q"] = "$query2";
		$args2["format"] = "json";
		$args2["start"] = "51";
		//$args2["key"]="value";
		 
		$consumer2 = new OAuthConsumer($cc_key2, $cc_secret2);
		$request2 = OAuthRequest::from_consumer_and_token($consumer2, NULL,"GET", $url2, $args2);
		$request2->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer2, NULL);
		$url2 = sprintf("%s?%s", $url2, OAuthUtil::build_http_query($args2));
		$ch2 = curl_init();
		$headers2 = array($request2->to_header());
		curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
		curl_setopt($ch2, CURLOPT_URL, $url2);
		
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1); 
		$rsp2 = curl_exec($ch2);
		$results2 = json_decode($rsp2,true);
		 
		$yahooarray2 = $results2['bossresponse']['news']['results'];
				
		$yahooarray = array_merge_recursive($yahooarray1,$yahooarray2);
		
	for ($i=0;$i<count($yahooarray);$i++)
		{
		$yahooarray[$i]['Url'] = $yahooarray[$i]['url'];
		unset($yahooarray[$i]['url']);
		$yahooarray[$i]['Title'] = $yahooarray[$i]['title'];
		unset($yahooarray[$i]['title']);
		$yahooarray[$i]['Description'] = $yahooarray[$i]['abstract'];
		unset($yahooarray[$i]['abstract']);
		$yahooarray[$i]['Date'] = $yahooarray[$i]['date'];
		unset($yahooarray[$i]['date']);
		$yahooarray[$i]['Source'] = $yahooarray[$i]['source'];
		unset($yahooarray[$i]['source']);
		$yahooarray[$i]['Date'] = date('jS F, Y. g.ia',$yahooarray[$i]['Date']);

		}
	
		$y=0;
		foreach ($yahooarray as $yahoo)
		{
		 $y++;
 
 		echo "<li class=\"titlelink\"> <a href=\"{$yahoo['Url']}\"><font color ='blue'>{$yahoo['Title']}</font></a></li>"."<li class = \"displaylink\">{$yahoo['Source']}, {$yahoo['Date']}&nbsp;&nbsp;&nbsp&nbsp&nbsp&nbsp<span class =\"foundon\">Yahoo!</span></li>"."<li class =\"snippet\">{$yahoo['Description']}</li>".$newline;
		}
	

		}
		
		

  	
     
echo'</div>';

echo'<div id="column_1_of_2">';

			   //################################################## BING ##########################################################################################-->
		echo '<img src="Resources/Images/background/bing.jpg" width="300" height="125" />';
		$acctKey = 'hx2sFkICa/5Ajj8JHvjUgO/cwmG+s0D4NiyKot/tR5Q=';
		$rootUri = 'https://api.datamarket.azure.com/Bing/Search';
		// Read the contents of the .html file into a string.
		//$contents = file_get_contents('bing_basic2.html'); 
		if ($_GET['query'])
		{$newline="<br />";
		
		// Here is where you'll process the query.
		// The rest of the code samples in this tutorial are inside this conditional block.
		
		// Encode the query and the single quotes that must surround it.
		$query1 = urlencode("'{$_GET['query']}'");
				
		$serviceOp = 'News';
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
		$jsonObj = json_decode($response,true);
						
		$bingarray1= $jsonObj['d']['results'];
	
		// Encode the query and the single quotes that must surround it.
		$query2 = urlencode("'{$_GET['query']}'");
		
		$serviceOp2 = 'News';
		// Construct the full URI for the query.
		$requestUri2 = "$rootUri/$serviceOp2?\$format=json&Query=$query2&\$skip=16";
		
		// Encode the credentials and create the stream context.
		$auth2 = base64_encode("$acctKey:$acctKey");
		$data2 = array(
		'http' => array(
		'request_fulluri' => true,
		// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
		'ignore_errors' => true,
		'header' => "Authorization: Basic $auth")
		);
		$context2 = stream_context_create($data2);
		// Get the response from Bing.
		$response2 = file_get_contents($requestUri2, 0, $context2);
		
		// Decode the response.
		$jsonObj2 = json_decode($response2,true);
		
		$bingarray2= $jsonObj2['d']['results'];
		
		$query3 = urlencode("'{$_GET['query']}'");
		
		$serviceOp3 = 'News';
		// Construct the full URI for the query.
		$requestUri3 = "$rootUri/$serviceOp2?\$format=json&Query=$query3&\$skip=31";
		
		// Encode the credentials and create the stream context.
		$auth3 = base64_encode("$acctKey:$acctKey");
		$data3 = array(
		'http' => array(
		'request_fulluri' => true,
		// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
		'ignore_errors' => true,
		'header' => "Authorization: Basic $auth")
		);
		$context3 = stream_context_create($data3);
		// Get the response from Bing.
		$response3 = file_get_contents($requestUri3, 0, $context3);
		
		// Decode the response.
		$jsonObj3 = json_decode($response3,true);
		
		$bingarray3= $jsonObj3['d']['results'];
		
		$query4 = urlencode("'{$_GET['query']}'");
		
		$serviceOp4 = 'News';
		// Construct the full URI for the query.
		$requestUri4 = "$rootUri/$serviceOp4?\$format=json&Query=$query2&\$skip=46";
		
		// Encode the credentials and create the stream context.
		$auth4 = base64_encode("$acctKey:$acctKey");
		$data4 = array(
		'http' => array(
		'request_fulluri' => true,
		// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
		'ignore_errors' => true,
		'header' => "Authorization: Basic $auth")
		);
		$context4 = stream_context_create($data4);
		// Get the response from Bing.
		$response4 = file_get_contents($requestUri4, 0, $context4);
		
		// Decode the response.
		$jsonObj4 = json_decode($response2,true);
		
		$bingarray4= $jsonObj2['d']['results'];
		
		$query5 = urlencode("'{$_GET['query']}'");
		
		$serviceOp5 = 'News';
		// Construct the full URI for the query.
		$requestUri5 = "$rootUri/$serviceOp5?\$format=json&Query=$query5&\$skip=61";
		
		// Encode the credentials and create the stream context.
		$auth5 = base64_encode("$acctKey:$acctKey");
		$data5 = array(
		'http' => array(
		'request_fulluri' => true,
		// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
		'ignore_errors' => true,
		'header' => "Authorization: Basic $auth")
		);
		$context5 = stream_context_create($data5);
		// Get the response from Bing.
		$response5 = file_get_contents($requestUri5, 0, $context5);
		
		// Decode the response.
		$jsonObj5 = json_decode($response5,true);
		
		$bingarray5= $jsonObj5['d']['results'];
		
		$query6 = urlencode("'{$_GET['query']}'");
		
		$serviceOp6 = 'News';
		// Construct the full URI for the query.
		$requestUri6 = "$rootUri/$serviceOp6?\$format=json&Query=$query6&\$skip=76";
		
		// Encode the credentials and create the stream context.
		$auth6 = base64_encode("$acctKey:$acctKey");
		$data6 = array(
		'http' => array(
		'request_fulluri' => true,
		// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
		'ignore_errors' => true,
		'header' => "Authorization: Basic $auth")
		);
		$context6 = stream_context_create($data6);
		// Get the response from Bing.
		$response6 = file_get_contents($requestUri6, 0, $context6);
		
		// Decode the response.
		$jsonObj6 = json_decode($response6,true);
		
		$bingarray6= $jsonObj6['d']['results'];
		
		$query7 = urlencode("'{$_GET['query']}'");
		
		$serviceOp7 = 'News';
		// Construct the full URI for the query.
		$requestUri7 = "$rootUri/$serviceOp7?\$format=json&Query=$query7&\$skip=91&\$top=10";
		
		// Encode the credentials and create the stream context.
		$auth7 = base64_encode("$acctKey:$acctKey");
		$data7 = array(
		'http' => array(
		'request_fulluri' => true,
		// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
		'ignore_errors' => true,
		'header' => "Authorization: Basic $auth")
		);
		$context7 = stream_context_create($data7);
		// Get the response from Bing.
		$response7 = file_get_contents($requestUri7, 0, $context7);
		
		// Decode the response.
		$jsonObj7 = json_decode($response7,true);
		
		$bingarray7 = $jsonObj7['d']['results'];
		
		$bingarray = array_merge_recursive($bingarray1,$bingarray2,$bingarray3,$bingarray4,$bingarray5,$bingarray6,$bingarray7);
	
		for ($i=0;$i<count($bingarray);$i++)
		{
			$bingarray[$i]['Date'] = date('jS F, Y. g.ia',strtotime($bingarray[$i]['Date']));
		}
		
		$z=0;
		foreach ($bingarray as $bing)
		{
		 $z++;
 
 		echo "<li class=\"titlelink\"> <a href=\"{$bing['Url']}\"><font color ='blue'>{$bing['Title']}</font></a></li>"."<li class = \"displaylink\">{$bing['Source']}, {$bing['Date']}</li>"."<li class =\"snippet\">{$bing['Description']}</li>".$newline;
		
		}
		
echo'</div>';  // END OF ADBAR NEWS


	 echo'<div id="related_terms_news">
   <p>
   Related Searches:
   </p>';
   //if ($_GET['query'])
  // {
   
   	///////////////////////////////////////////////////////////////////////////////////////////########## QUERY REWRITE START
		$apikey = "nhzgVHtsnV6FXYx6jPQ3"; // NOTE: replace test_only with your own key 
		$word = ("{$_GET['query']}"); // any word 
		$language = "en_US"; // you can use: en_US, es_ES, de_DE, fr_FR, it_IT 
		$endpoint = "http://thesaurus.altervista.org/thesaurus/v1";
		
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, "$endpoint?word=".urlencode($word)."&language=$language&key=$apikey&output=json"); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$data = curl_exec($ch); 
		$info = curl_getinfo($ch); 
		curl_close($ch);
		
		$newqueryarray = array();
		$alternative = array();
		
		if ($info['http_code'] == 200) { 
	    $result = json_decode($data, true); 

		
		} // else echo "Http Error: ".$info['http_code'];
		else
		{ 
		echo "No Suggestions Found";
		//$newquery = $word;
		}
		$i=0;
		
foreach ($result["response"] as $value) 
{ 

  $alternative[$i] = explode ("|", $value["list"]["synonyms"]);
  $i++;


}

echo '<div id="related_search_vertical">';
foreach ($alternative as $test)
{
	foreach ($test as $test2)
	{
	$test3 = ucwords($test2);
	printf('<a href="news_related.php?query=%1$s">%1$s</a><br/>', $test3);
	}
	
}
echo'</div>';
echo'</div>';

   
echo '</div>';
} //END OF ELSE BLOCK
	}


	

   
?>
    
        
       
<div id="footerbox">
  <div align="center">
   <div class="navbar">
        <ul>
        <li><a href="form.php" title="Feedback" >Feedback</a></li>
        <li><a href="about.html" title="About" >About</a></li>
        <li>Please note that this website is for educational purposes only</li>
        <li>Metasearch 2013</li>
        </ul>
   </div> <!--end of div.navbar-->
  </div> <!--end of div align left-->
</div>	<!--end of footerbox-->
</div></div> <!-- container & wrapper -->

</body>
</html>
