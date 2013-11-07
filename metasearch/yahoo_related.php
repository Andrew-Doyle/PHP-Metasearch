
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yahoo Search - Metasearch</title>

<link href="homepage2.css" rel="stylesheet" type="text/css" />


</head>

<?php error_reporting(0); ?> 
<body id="yahoo_search">

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
		<form action="yahoosearch.php" method="POST" >
		<input type="text" name="query" placeholder="Search" style="width: 500px;" /><br />
		<p>
		<input type="radio" name="SearchType?" value="Web" checked="checked" /> Web
        <input type="radio" name="SearchType?" value="Images" /> Images
		<input type="radio" name="SearchType?" value="News" /> News
		&nbsp;
		&nbsp;
		<input type="submit" value="Search" />
		</p>
		</form>
  
     </div>
    
     
  
    
<?php if($_SERVER['REQUEST_METHOD']!='POST')
	{
				
    echo'<div id="mainwrapper">';
   
echo'<div id="individual_or_aggregated_results">';
		
		if ($_GET['query'])
		{
		$newline="<br />";
		$query = urlencode("'{$_GET['query']}'");
				
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
		
			
		$query2 = urlencode("'{$_GET['query']}'");
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
		
		$y=0;
		foreach ($yahooarray as $yahoo)
		{
		  
echo "<li class=\"titlelink\"> <a href=\"{$yahoo['link']}\"><font color ='blue'>{$yahoo['title']}</font></a></li>"."<li class = \"displaylink\">{$yahoo['link']}</li>"."<li class =\"snippet\">{$yahoo['snippet']}</li>".$newline;
		}
		

		}
		

echo'</div>';  // END OF ADBAR 4
echo'<div id="related_terms_agg_or_individual">
 <img src="Resources/Images/background/yahoosmall.png" width="135" height="78" />
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
	//var_dump($alternative[0]);
	
	
	
	echo '<div id="related_search_vertical">';
	foreach ($alternative as $test)
	{
		foreach ($test as $test2)
		{
		$test3 = ucwords($test2);
		printf('<a href="yahoo_related.php?query=%1$s">%1$s</a><br/>', $test3);
		
		}
		
	}

	echo'</div>';


echo'</div>'; // end of adbarnews related

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
