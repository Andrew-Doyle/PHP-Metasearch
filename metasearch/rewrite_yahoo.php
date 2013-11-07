
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yahoo Metasearch PHP</title>

<link href="styletest2.css" rel="stylesheet" type="text/css" />


</head>

<?php error_reporting(0); ?> 
<body                >

<div id="container">
    <div id="navbar2"> 
      <div align="left">
        <div class="navbar">
  <ul>
    <li><a href="google.php" title="Google" id="costslink">Google</a></li>	
    <li><a href="bing.php" title="Bing" id="homelink">Bing</a></li>
    <li><a href="yahoo.php" title="Yahoo"id="directorylink">Yahoo</a></li>
    <li><a href="index.php" title="Metasearch"id="directorylink">Back to Metasearch</a></li>
    <li><a href="index_aggtest.php" title="Aggregation Test"id="directorylink">Aggregation Test Page</a></li>
    <li><a href="rewrite_agg.php" title="Aggregation RW Test"id="directorylink">RW Aggregated</a></li>
	<li><a href="rewrite_google.php" title="Rewrite Google Test"id="directorylink">RW Google</a></li>
	<li><a href="rewrite_bing.php" title="Rewrite Bing Test"id="directorylink">RW Bing</a></li>
	<li><a href="rewrite_yahoo.php" title="Rewrite Yahoo Test"id="directorylink">RW Yahoo</a></li>
           
  </ul>

        </div>
        </div>
        </div>
  <div id="wrapper">
    <div id="header">
        <h1 align="center">Yahoo Metasearch</h1>
    </div>

     
  
    
<?php if($_SERVER['REQUEST_METHOD']!='POST')
	{
		echo'<div id="navbar2">'; 
      echo'<div align="left">';
        echo'<div class="navbar">';
		#form display statements to be inserted here
		
		echo '
		<form action="rewrite_yahoo.php" method="POST">
		<fieldset style="width: 650px;">
		<legend>Enter your Yahoo! search below</legend>
		<textarea rows="1" cols="60" name="query">
		</textarea>
		</fieldset>
		<p>
		<input type="submit" value="Yahoo! Search">
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
		
		echo '
		<form action="rewrite_yahoo.php" method="POST">
		<fieldset style="width: 650px;">
		<legend>Enter your Yahoo! search below</legend>
		<textarea rows="1" cols="60" name="query">
		</textarea>
		</fieldset>
		<p>
		<input type="submit" value="Yahoo! Search">
		</p>
		</form>';
		
		 echo'</div>';
      echo'</div>';
    echo'</div>';
    echo'<div id="mainwrapper">';
   
echo'<div id="adbar10">';
		
		if ($_POST['query'])
		{
		
		$newline="<br />";
		
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
		
		if ($info['http_code'] == 200) { 
	    $result = json_decode($data, true); 
		echo "Number of lists: ".count($result["response"])."<br>"; 
		echo "Vardump:".$newline.$newline;
		var_dump($result);
		$newqueryarray[0]= $word." (";
		$r=1;
		foreach ($result["response"] as $value) 
		{ 
		$newqueryarray[$r] = "{$value['list']['synonyms']}"; 
		$newqueryarray[$r] = str_replace("|"," OR ",$newqueryarray[$r]);
		$r++;
		} 
		$newqueryarray[$r] = ")";
		$newquery = implode(" ",$newqueryarray);
		
		} // else echo "Http Error: ".$info['http_code'];
		else
		{ 
		echo "No words in the thesaurus";
		$newquery = $word;
		}
///////////////////////////////////////////////////////////////////////////////////////////########## QUERY REWRITE END

//$unserialized = http_get("http://words.bighugelabs.com/api/2/03d4265eecd2dbc0d5ff869f5ba5e06a/grilling/php");
//$unserialized2 = unserialize($unserialized);
//echo $unserialized2;

   		//$url="http://words.bighugelabs.com/api/2/03d4265eecd2dbc0d5ff869f5ba5e06a/$word/php";
//		
//		$data = file_get_contents($url);
//		
//		echo $data;
//		
//		echo file_get_contents("http://words.bighugelabs.com/api/2/03d4265eecd2dbc0d5ff869f5ba5e06a/$word/php");
		
//		$url="http://words.bighugelabs.com/api/2/03d4265eecd2dbc0d5ff869f5ba5e06a/$word/json";
//		
//		$ch = curl_init();
//		
//		curl_setopt($ch,CURLOPT_URL,$url);
//		
//		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//		
//		$data = curl_exec($ch);
//		
//		$js = json_decode($data,true);
//		
//		var_dump($js);
		
//		$acctKey = 'hx2sFkICa/5Ajj8JHvjUgO/cwmG+s0D4NiyKot/tR5Q=';
//		$rootUri = 'https://api.datamarket.azure.com/Bing/Synonyms/';
//		
//		$serviceOp = 'GetSynonyms';
//		// Construct the full URI for the query.
//		$requestUri = "$rootUri/$serviceOp?\$format=json&Query=$word";
//		
//		$auth = base64_encode("$acctKey:$acctKey");
//		$data = array(
//		'http' => array(
//		'request_fulluri' => true,
//		// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
//		'ignore_errors' => true,
//		'header' => "Authorization: Basic $auth")
//		);
//		$context = stream_context_create($data);
//		// Get the response from Bing.
//		$response = file_get_contents($requestUri, 0, $context);
//		
//		// Decode the response.
//		$jsonObj = json_decode($response,true);
//		
//		var_dump($jsonObj);
		
		//		$query1 = urlencode("'{$_POST['query']}'");
//		
//		$thesaurus = "http://words.bighugelabs.com/api/2/03d4265eecd2dbc0d5ff869f5ba5e06a/$query/php";
//		
//		$newquery = unserialize($thesaurus);
		$newquery1 = urlencode ($newquery);
//				
		// FROM http://developer.yahoo.com/boss/search/boss_api_guide/codeexamples.html#oauth_php
		require("OAuth.php");
		 
		$cc_key  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url = "http://yboss.yahooapis.com/ysearch/web";
		$args = array();
		$args["q"] = "$newquery1";
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
		$args2["q"] = "$newquery1";
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
		$yahooarray[$i]['link'] = str_replace("https://","http://",$yahooarray[$i]['link']);
		$yahooarray[$i]['link'] = str_replace("http://","http://www.",$yahooarray[$i]['link']);
		$yahooarray[$i]['link'] = str_replace("www.www3.","www3.",$yahooarray[$i]['link']);
		$yahooarray[$i]['link'] = str_replace("www.www2.","www2.",$yahooarray[$i]['link']);
		$yahooarray[$i]['link'] = str_replace("www.www22.","www22.",$yahooarray[$i]['link']);
		$yahooarray[$i]['link'] = str_replace("www.www1.","www1.",$yahooarray[$i]['link']);
		$backslash = $yahooarray[$i]['link'];
		$backslash_removed = rtrim($backslash,"/");
		$yahooarray[$i]['link'] = $backslash_removed;
		$yahooarray[$i]['snippet'] = $yahooarray[$i]['abstract'];
		unset($yahooarray[$i]['abstract']);
		}
		
		echo $newline."Query Was: ".$word.$newline.$newline."Rewritten Query is: ".$newquery.$newline.$newline;
		
		$y=0;
		foreach ($yahooarray as $yahoo)
		{
		 $y++;
 
 echo $y.": <a href=\"{$yahoo['link']}\"><font color ='blue'>{$yahoo['title']}</font></a>".": "."$newline"."$newline".$yahoo['snippet'].$newline.$newline.$yahoo['link'].$newline.$newline;
		}
//		
//
		}
////		
$finalurls = array();

foreach ($yahooarray as $urls)
{
	$finalurls[] = $urls['link'];
}

$myfile = fopen('1_yahoo.csv', 'w');
fputcsv($myfile, $finalurls);
fclose($myfile);


echo'</div>';  // END OF ADBAR 4


echo'</div>';
} //END OF ELSE BLOCK
       
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
