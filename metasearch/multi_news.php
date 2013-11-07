
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Metasearch</title>

<link href="results1.css" rel="stylesheet" type="text/css" />
<script src="jquery.js" type="text/javascript"></script>
<script>
function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
	
	
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "query");
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
</script>


</head>

<?php error_reporting(0); ?> 
<body                >

<div id="container">
  <div id="wrapper">
<div id="headercentre">
<div align="centre">
<div class="navbar">
	<ul>
	<li><a href="index.php" title="Metasearch" id="costslink">Web</a></li>
	<li><a href="multi_images.php" title="Web Search" id="homelink">Images</a></li>
    <li><a href="multi_news.php" title="News Search"id="directorylink">News</a></li>
  	<li><a href="index_aggtest.php" title="Test Page" id="costslink">Testing</a></li>
	<li><a href="google.php" title="Google" id="costslink">Google</a></li>
	<li><a href="bing.php" title="Bing" id="homelink">Bing</a></li>
    <li><a href="yahoo.php" title="Yahoo"id="directorylink">Yahoo</a></li>
	</ul>

</div>
</div>
</div>
    <div id="header">
        <h1 align="center">Metasearch</h1>
    </div> <!--end of header-->

     
  
    
<?php if($_SERVER['REQUEST_METHOD']!='POST')
	{
		echo'<div id="navbar2">'; 
      echo'<div align="left">';
        echo'<div class="navbar">';
		#form display statements to be inserted here
		
		echo '<ul>
		<li><a href="index.php" title="Web Search" id="costslink">Web</a></li>
    	<li><a href="multi_images.php" title="Image Search" id="homelink">Images</a></li> 
		<li><a href="multi_news.php" title="News Search" id="homelink">News</a></li> 
		</ul>
		<form action="multi_news.php" method="POST">
		<input type="text" name="query" placeholder="Search" style="width: 500px;"><br>
		<p>
		<input type="radio" name="SearchType?" value="Non-Aggregated"> Non-Aggregated
		<input type="radio" name="SearchType?" value="Aggregated" checked="checked"> Aggregated 
		&nbsp;
		&nbsp;
		<input type="submit" value="Search">
		</p>
		</form>';		
		
		 echo'</div>';
      echo'</div>';
    echo'</div>';
		}
		
else{
	echo'<div id="navbar2">'; 
      echo'<div align="left">';
        echo'<div class="navbar">';
		#form display statements to be inserted here
		
		echo '<ul>
		<li><a href="index.php" title="Web Search" id="costslink">Web</a></li>
    	<li><a href="multi_images.php" title="Image Search" id="homelink">Images</a></li> 
		<li><a href="multi_news.php" title="News Search" id="homelink">News</a></li>
		</ul> 
		<form action="multi_news.php" method="POST">
		<input type="text" name="query" placeholder="Search" style="width: 500px;"><br>
		<p>
		<input type="radio" name="SearchType?" value="Non-Aggregated"> Non-Aggregated
		<input type="radio" name="SearchType?" value="Aggregated" checked="checked"> Aggregated 
		&nbsp;
		&nbsp;
		<input type="submit" value="Search">
		</p>
		</form>';		
		
		 echo'</div>';
      echo'</div>';
    echo'</div>';
	
	if($_POST['SearchType?']=='Non-Aggregated')
   {
		   
    echo'<div id="mainwrapper">';
  
echo'<div id="column_2_of_2">';
		echo'<ul>';
			echo'<li><strong><a href="yahoo.php">Yahoo</a></strong></li>';
		echo'</ul>';
			   //################################################## YAHOO ##########################################################################################-->
		
		if ($_POST['query'])
		{
		$newline="<br />";
		$query = urlencode("'{$_POST['query']}'");
		
	
				
		// FROM http://developer.yahoo.com/boss/search/boss_api_guide/codeexamples.html#oauth_php
		require("OAuth.php");
		 
		$cc_key  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url = "http://yboss.yahooapis.com/ysearch/news";
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
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
		$rsp = curl_exec($ch);
		$results = json_decode($rsp,true); 
						
		$yahooarray1 = $results['bossresponse']['news']['results'];
		
			
		$query2 = urlencode("'{$_POST['query']}'");
		$cc_key2  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret2 = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url2 = "http://yboss.yahooapis.com/ysearch/news";
		$args2 = array();
		$args2["q"] = "$query2";
		$args2["format"] = "json";
		$args2["start"] = "51";
		 
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

		}
	
		$y=0;
		foreach ($yahooarray as $yahoo)
		{
		 $y++;
 
 		echo $y.": <a href=\"{$yahoo['Url']}\"><font color ='blue'>{$yahoo['Title']}</font></a>".": ".$newline.$newline.$yahoo['Date'].$newline.$newline.$yahoo['Description'].$newline.$newline;
		}
	

		}
echo'</div>';  // END OF ADBAR NEWS

echo'<div id="column_1_of_2">';
		echo'<ul>';           
			echo'<li><strong><a href="bing.php">Bing</a></strong>';
			echo'</li>';
		echo'</ul>';
		//################################################## BING ##########################################################################################-->
	
		$acctKey = 'hx2sFkICa/5Ajj8JHvjUgO/cwmG+s0D4NiyKot/tR5Q=';
		$rootUri = 'https://api.datamarket.azure.com/Bing/Search';
		// Read the contents of the .html file into a string.
		//$contents = file_get_contents('bing_basic2.html'); 
		if ($_POST['query'])
		{$newline="<br />";
			echo $newline;
		// Here is where you'll process the query.
		// The rest of the code samples in this tutorial are inside this conditional block.
		
		// Encode the query and the single quotes that must surround it.
		$query1 = urlencode("'{$_POST['query']}'");
				
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
		$query2 = urlencode("'{$_POST['query']}'");
		
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
		
		$query3 = urlencode("'{$_POST['query']}'");
		
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
		
		$query4 = urlencode("'{$_POST['query']}'");
		
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
		
		$query5 = urlencode("'{$_POST['query']}'");
		
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
		
		$query6 = urlencode("'{$_POST['query']}'");
		
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
		
		$query7 = urlencode("'{$_POST['query']}'");
		
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
	

		
		$z=0;
		foreach ($bingarray as $bing)
		{
		 $z++;
 
 		echo $z.": <a href=\"{$bing['Url']}\"><font color ='blue'>{$bing['Title']}</font></a>".": ".$newline.$newline.$bing['Date'].$newline.$newline.$bing['Description'].$newline.$newline;
		
		}

  	}
     
echo'</div>';

 echo'<div id="related_terms_agg_or_individual">
 <img src="Resources/Images/background/bingnewssmall.png" width="135" height="78" />
   <p>
   Related Searches:
   </p>';
   //if ($_POST['query'])
  // {
   
   	///////////////////////////////////////////////////////////////////////////////////////////########## QUERY REWRITE START
		$apikey = "nhzgVHtsnV6FXYx6jPQ3"; // NOTE: replace test_only with your own key 
		$word = ("{$_POST['query']}"); // any word 
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
//var_dump($alternative[0]);



foreach ($alternative as $test)
{
	foreach ($test as $test2)
	{
	printf('<a href="multi_news_related.php?query=%1$s">%1$s</a><br/>', $test2);
	
	
    

	}
	
}


//var_dump ($alternative);
////OUTPUT THE RESULTS
//
//$j=0;
//
//foreach ($alternative as $echoalternative)
//{
//echo $j.": ".$echoalternative;
//$j++;
//}
		//$e=0;
//		foreach ($alternative as $echoalternative)
//		{
//		echo $e.": ".$echoalternative;
//		$e++;
//		}
  // }
///////////////////////////////////////////////////////////////////////////////////////////########## QUERY REWRITE END
echo'   </div>
   
</div>';
} //END OF ELSE BLOCK
}

if($_POST['SearchType?']=='Aggregated')
   {
	   
       echo'<div id="mainwrapper">';
   
echo'<div id="column_1_of_30">';
   
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
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
		$rsp = curl_exec($ch);
		$results = json_decode($rsp,true); 
				
		$yahooarray1 = $results['bossresponse']['web']['results'];
		
			
		$query2 = urlencode("'{$_POST['query']}'");
		$cc_key2  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret2 = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url2 = "http://yboss.yahooapis.com/ysearch/web";
		$args2 = array();
		$args2["q"] = "$query2";
		$args2["format"] = "json";
		$args2["start"] = "51";
		 
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
		 
		$yahooarray2 = $results2['bossresponse']['web']['results'];
		
		$yahooarray = array_merge_recursive($yahooarray1,$yahooarray2);
		
		for ($i=0;$i<count($yahooarray);$i++)
		{
		$yahooarray[$i]['link'] = $yahooarray[$i]['url'];
		unset($yahooarray[$i]['url']);
		$yahooarray[$i]['link'] = str_replace("www.","",$yahooarray[$i]['link']);
		$yahooarray[$i]['snippet'] = $yahooarray[$i]['abstract'];
		unset($yahooarray[$i]['abstract']);
		}
		
}

if ($_POST['query'])
		{
		$newline="<br />";
		echo $newline;
		$query = urlencode("'{$_POST['query']}'");
						
    	$url="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=1";
		
		$ch = curl_init();
		
		curl_setopt($ch,CURLOPT_URL,$url);
		
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		
		$data = curl_exec($ch);
		
		$js = json_decode($data,true);
		
     	$googlearray1= $js['items'];
				
		//$url2="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=11";
//		
//		$ch2 = curl_init();
//		
//		curl_setopt($ch2,CURLOPT_URL,$url2);
//		
//		curl_setopt($ch2,CURLOPT_RETURNTRANSFER,1);
//		
//		$data2 = curl_exec($ch2);
//		
//		$js2 = json_decode($data2,true);
//		$googlearray2= $js2['items'];
//			
//		$url3="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=21";
//		
//		$ch3 = curl_init();
//		
//		curl_setopt($ch3,CURLOPT_URL,$url3);
//		
//		curl_setopt($ch3,CURLOPT_RETURNTRANSFER,1);
//		
//		$data3 = curl_exec($ch3);
//		
//		$js3 = json_decode($data3,true);
//		$googlearray3= $js3['items'];
//		
//
//		$url4="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=31";
//		
//		$ch4 = curl_init();
//		
//		curl_setopt($ch4,CURLOPT_URL,$url4);
//		
//		curl_setopt($ch4,CURLOPT_RETURNTRANSFER,1);
//		
//		$data4 = curl_exec($ch4);
//		
//		$js4 = json_decode($data4,true);
//		$googlearray4= $js4['items'];
//
//		$url5="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=41";
//		
//		$ch5 = curl_init();
//		
//		curl_setopt($ch5,CURLOPT_URL,$url5);
//		
//		curl_setopt($ch5,CURLOPT_RETURNTRANSFER,1);
//		
//		$data5 = curl_exec($ch5);
//		
//		$js5 = json_decode($data5,true);
//		$googlearray5= $js5['items'];
//						
//    	$url6="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=51";
//		
//		$ch6 = curl_init();
//		
//		curl_setopt($ch6,CURLOPT_URL,$url6);
//		
//		curl_setopt($ch6,CURLOPT_RETURNTRANSFER,1);
//		
//		$data6 = curl_exec($ch6);
//		
//		$js6 = json_decode($data6,true);
//		
//     	$googlearray6= $js6['items'];
//						
//		$url7="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=61";
//		
//		$ch7 = curl_init();
//		
//		curl_setopt($ch7,CURLOPT_URL,$url7);
//		
//		curl_setopt($ch7,CURLOPT_RETURNTRANSFER,1);
//		
//		$data7 = curl_exec($ch7);
//		
//		$js7 = json_decode($data7,true);
//		$googlearray7= $js7['items'];
//				
//		$url8="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=71";
//		
//		$ch8 = curl_init();
//		
//		curl_setopt($ch8,CURLOPT_URL,$url8);
//		
//		curl_setopt($ch8,CURLOPT_RETURNTRANSFER,1);
//		
//		$data8 = curl_exec($ch8);
//		
//		$js8 = json_decode($data8,true);
//		$googlearray8= $js8['items'];
//		
//		$url9="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=81";
//		
//		$ch9 = curl_init();
//		
//		curl_setopt($ch9,CURLOPT_URL,$url9);
//		
//		curl_setopt($ch9,CURLOPT_RETURNTRANSFER,1);
//		
//		$data9 = curl_exec($ch9);
//		
//		$js9 = json_decode($data9,true);
//		$googlearray9= $js9['items'];
//
//		$url10="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=91";
//		
//		$ch10 = curl_init();
//		
//		curl_setopt($ch10,CURLOPT_URL,$url10);
//		
//		curl_setopt($ch10,CURLOPT_RETURNTRANSFER,1);
//		
//		$data10 = curl_exec($ch10);
//		
//		$js10 = json_decode($data10,true);
//		$googlearray10= $js10['items'];
//
//
//		$googlearray = array_merge_recursive($googlearray1,$googlearray2,$googlearray3,$googlearray4,$googlearray5,$googlearray6,$googlearray7,$googlearray8,$googlearray9,$googlearray10);
//			
//		for ($i=0;$i<count($googlearray);$i++)
//		{
//			$googlearray[$i]['link'] = str_replace("www.","",$googlearray[$i]['link']);
//		}
				

	}
	
		$acctKey = 'hx2sFkICa/5Ajj8JHvjUgO/cwmG+s0D4NiyKot/tR5Q=';
		$rootUri = 'https://api.datamarket.azure.com/Bing/Search';
		
	
		// Read the contents of the .html file into a string.
		//$contents = file_get_contents('bing_basic2.html'); //changed from bing_basic
		if ($_POST['query'])
		{
		$newline="<br />";
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
		$jsonObj = json_decode($response,true);
		
		$bingarray1= $jsonObj['d']['results'];
	
		// Encode the query and the single quotes that must surround it.
		$query2 = urlencode("'{$_POST['query']}'");
		
		$serviceOp2 = 'Web';
		// Construct the full URI for the query.
		$requestUri2 = "$rootUri/$serviceOp2?\$format=json&Query=$query2&\$skip=51";
		
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
	
	
		$bingarray = array_merge_recursive($bingarray1,$bingarray2);
	
		for ($i=0;$i<count($bingarray);$i++)
		{
		$bingarray[$i]['link'] = $bingarray[$i]['Url'];
		unset($bingarray[$i]['Url']);
		$bingarray[$i]['link'] = str_replace("www.","",$bingarray[$i]['link']);
		$bingarray[$i]['title'] = $bingarray[$i]['Title'];
		unset($bingarray[$i]['Url']);
		$bingarray[$i]['snippet'] = $bingarray[$i]['Description'];
		unset($bingarray[$i]['Description']);
		}
		
		
		}
		
$lists = array($bingarray, $yahooarray, $googlearray); //change for 100 results
$combinedRank = array();

// We need to process all the input lists.
foreach ($lists as $currentList)
{
    $currentRank = 1; // The first entry is ranked "1".

    // This should perform an in-order traversal of the given list, thus highest
    // ranks will happen first, and the lowest, last:
    foreach ($currentList as $entry)
    {
		
        if(array_key_exists($entry["link"], $combinedRank))
        {
            // If we've already seen an entry for this name, append the value to the existing combined rank.
            $combinedRank[$entry["link"]]['score'] += 1 / (60 + $currentRank);
			
			
        }
        else
        {
            // If this the first time we've seen this name, add with initial rank of 1/(60+currentRank).
            $combinedRank[$entry["link"]]['score'] = 1 / (60 + $currentRank);
			$combinedRank[$entry["link"]]['title'] = $entry["title"];
			$combinedRank[$entry["link"]]['snippet'] = $entry["snippet"];
			$combinedRank[$entry["link"]]['link'] = $entry["link"];
		}

        // Increment the currentRank so that later entries have lower ranks.
		
        $currentRank++;
    }
	

}

$scores = array();

foreach ($combinedRank as $score)
{
	$scores[] = $score['score'];
}

array_multisort($scores, SORT_DESC, $combinedRank);
$z=0;

foreach ($combinedRank as $finallist)
{
$z++;
 echo "<li class=\"titlelink\"> <a href=\"{$finallist['link']}\">{$finallist['title']}</a></li>"."<li class = \"displaylink\">{$finallist['link']}</li>"."<li class =\"snippet\">{$finallist['snippet']}</li>".$newline;
 
}
	
   echo'</div>';
echo'</div>';
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
