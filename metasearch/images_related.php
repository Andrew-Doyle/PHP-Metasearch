
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Images - Metasearch</title>

<link href="homepage2.css" rel="stylesheet" type="text/css" />

</head>

<?php error_reporting(0); ?> 
<body id="images_search">

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
	

		<form action="imagesearch.php" method="POST" >
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
		
		
	echo'<div id="related_search_horizontal">'; 
      echo'<div align="left">';
        echo'<div class="related_search_horizontal">';
   
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
	
	echo '<div align="left">';
	echo '<ul>
	<li class="related_search_horizontal"> Related Searches: </li>';
	$counter = 0;
	
	foreach ($alternative as $test)
	{
		foreach ($test as $test2)
		{
		$test3 = ucwords($test2);
		printf('<li class="related_search_vertical"><a href="images_related.php?query=%1$s" title="%1$s" id="costslink">%1$s</a></li>', $test3);
		
		if (++$counter > 7) {
            break 2;
        }
			
		}
		
	}
	echo '</ul>';
			 echo'</div>';
			  echo'</div>';;
      echo'</div>';
    echo'</div>';
	   
    echo'<div id="mainwrapper">';
   
echo'<div id="column_1_of_3">';
echo '<img src="Resources/Images/background/yahoo.jpg" width="300" height="125" />';
			   //################################################## YAHOO ##########################################################################################-->
	
		
		if ($_GET['query'])
		{
		$newline="<br />";
		echo $newline;
		$query = urlencode("'{$_GET['query']}'");
		
		// FROM http://developer.yahoo.com/boss/search/boss_api_guide/codeexamples.html#oauth_php
		require("OAuth.php");
		 
	$cc_key  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url = "http://yboss.yahooapis.com/ysearch/images";
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
						
		$yahooarray1 = $results['bossresponse']['images']['results'];
		
			
		$query2 = urlencode("'{$_GET['query']}'");
		$cc_key2  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret2 = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url2 = "http://yboss.yahooapis.com/ysearch/images";
		$args2 = array();
		$args2["q"] = "$query2";
		$args2["format"] = "json";
		$args2["start"] = "36";
		 
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
		 
		$yahooarray2 = $results2['bossresponse']['images']['results'];
				
		$query3 = urlencode("'{$_GET['query']}'");
		$cc_key3  = "dj0yJmk9VGc4RVplbUFrNkw1JmQ9WVdrOVZYaDRXR0Y1TTJNbWNHbzlNVFl6TmpJMk5qTTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zMA--";
		$cc_secret3 = "0da971bde30bc898c4706c223e3c343d65af0fc0";
		$url3 = "http://yboss.yahooapis.com/ysearch/images";
		$args3 = array();
		$args3["q"] = "$query3";
		$args3["format"] = "json";
		$args3["start"] = "71";
		$args3["count"] = "30";
		 
		$consumer3 = new OAuthConsumer($cc_key3, $cc_secret3);
		$request3 = OAuthRequest::from_consumer_and_token($consumer3, NULL,"GET", $url3, $args3);
		$request3->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer3, NULL);
		$url3 = sprintf("%s?%s", $url3, OAuthUtil::build_http_query($args3));
		$ch3 = curl_init();
		$headers3 = array($request3->to_header());
		curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers3);
		curl_setopt($ch3, CURLOPT_URL, $url3);
		
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER,1); 
		$rsp3 = curl_exec($ch3);
		$results3 = json_decode($rsp3,true);
		 
		$yahooarray3 = $results3['bossresponse']['images']['results'];
		
		$yahooarray = array_merge_recursive($yahooarray1,$yahooarray2,$yahooarray3);
		
	
		$w=0;
		foreach ($yahooarray as $yahoo)
		{
		echo "<a href=\"{$yahoo['clickurl']}\" target=\"_blank\"><img src= \"{$yahoo['thumbnailurl']}\" height=\"175\" width =\"225\" /></a>"; 
	
		}

		
		}
echo'</div>';  // END OF ADBAR 4

echo'<div id="column_2_of_3">';
echo '<img src="Resources/Images/background/google.jpg" width="300" height="125" />';
				
		//################################################# GOOGLE ##########################################################################################-->
		
	if ($_GET['query'])
	{
		$newline="<br />";
		echo $newline;
		$query = urlencode("'{$_GET['query']}'");
		
						
    	$url="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=1&searchType=image";
		
		$ch = curl_init();
		
		curl_setopt($ch,CURLOPT_URL,$url);
		
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		
		$data = curl_exec($ch);
		
		$js = json_decode($data,true);
		
     	$googlearray1= $js['items'];
				
		$url2="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=11&searchType=image";
		
		$ch2 = curl_init();
		
		curl_setopt($ch2,CURLOPT_URL,$url2);
		
		curl_setopt($ch2,CURLOPT_RETURNTRANSFER,1);
		
		$data2 = curl_exec($ch2);
		
		$js2 = json_decode($data2,true);
		$googlearray2= $js2['items'];
			
		$url3="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=21&searchType=image";
		
		$ch3 = curl_init();
		
		curl_setopt($ch3,CURLOPT_URL,$url3);
		
		curl_setopt($ch3,CURLOPT_RETURNTRANSFER,1);
		
		$data3 = curl_exec($ch3);
		
		$js3 = json_decode($data3,true);
		$googlearray3= $js3['items'];
		

		$url4="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=31&searchType=image";
		
		$ch4 = curl_init();
		
		curl_setopt($ch4,CURLOPT_URL,$url4);
		
		curl_setopt($ch4,CURLOPT_RETURNTRANSFER,1);
		
		$data4 = curl_exec($ch4);
		
		$js4 = json_decode($data4,true);
		$googlearray4= $js4['items'];

		$url5="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=41&searchType=image";
		
		$ch5 = curl_init();
		
		curl_setopt($ch5,CURLOPT_URL,$url5);
		
		curl_setopt($ch5,CURLOPT_RETURNTRANSFER,1);
		
		$data5 = curl_exec($ch5);
		
		$js5 = json_decode($data5,true);
		$googlearray5= $js5['items'];
						
    	$url6="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=51&searchType=image";
		
		$ch6 = curl_init();
		
		curl_setopt($ch6,CURLOPT_URL,$url6);
		
		curl_setopt($ch6,CURLOPT_RETURNTRANSFER,1);
		
		$data6 = curl_exec($ch6);
		
		$js6 = json_decode($data6,true);
		
     	$googlearray6= $js6['items'];
						
		$url7="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=61&searchType=image";
		
		$ch7 = curl_init();
		
		curl_setopt($ch7,CURLOPT_URL,$url7);
		
		curl_setopt($ch7,CURLOPT_RETURNTRANSFER,1);
		
		$data7 = curl_exec($ch7);
		
		$js7 = json_decode($data7,true);
		$googlearray7= $js7['items'];
				
		$url8="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=71&searchType=image";
		
		$ch8 = curl_init();
		
		curl_setopt($ch8,CURLOPT_URL,$url8);
		
		curl_setopt($ch8,CURLOPT_RETURNTRANSFER,1);
		
		$data8 = curl_exec($ch8);
		
		$js8 = json_decode($data8,true);
		$googlearray8= $js8['items'];
		
		$url9="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=81&searchType=image";
		
		$ch9 = curl_init();
		
		curl_setopt($ch9,CURLOPT_URL,$url9);
		
		curl_setopt($ch9,CURLOPT_RETURNTRANSFER,1);
		
		$data9 = curl_exec($ch9);
		
		$js9 = json_decode($data9,true);
		$googlearray9= $js9['items'];

		$url10="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=91&searchType=image";
		
		$ch10 = curl_init();
		
		curl_setopt($ch10,CURLOPT_URL,$url10);
		
		curl_setopt($ch10,CURLOPT_RETURNTRANSFER,1);
		
		$data10 = curl_exec($ch10);
		
		$js10 = json_decode($data10,true);
		$googlearray10= $js10['items'];


		$googlearray = array_merge_recursive($googlearray1,$googlearray2,$googlearray3,$googlearray4,$googlearray5,$googlearray6,$googlearray7,$googlearray8,$googlearray9,$googlearray10);
			
		for ($i=0;$i<count($googlearray);$i++)
		{
			$googlearray[$i]['link'] = str_replace("www.","",$googlearray[$i]['link']);
		}
//		
		$y=0;
		//foreach ($googlearray as $finallist) //googlearray = merged
		foreach ($googlearray as $finallist)
		{
		
		echo "<a href=\"{$finallist['link']}\" target=\"_blank\"><img src= \"{$finallist['image']['thumbnailLink']}\" height=\"175\" width =\"225\"/></a>";
		 
		}	
	}
		
     
echo'</div>';
echo'<div id="column_3_of_3">';
echo '<img src="Resources/Images/background/bing.jpg" width="300" height="125" />';
	
		//################################################## BING ##########################################################################################-->
		
		$acctKey = 'hx2sFkICa/5Ajj8JHvjUgO/cwmG+s0D4NiyKot/tR5Q=';
		$rootUri = 'https://api.datamarket.azure.com/Bing/Search';
		// Read the contents of the .html file into a string.
		//$contents = file_get_contents('bing_basic2.html'); 
		if ($_GET['query'])
		{$newline="<br />";
			echo $newline;
		// Here is where you'll process the query.
		// The rest of the code samples in this tutorial are inside this conditional block.
		
		// Encode the query and the single quotes that must surround it.
		$query1 = urlencode("'{$_GET['query']}'");
		
		$serviceOp = 'Image';
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
		
		$serviceOp2 = 'Image';
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
	
	//	for ($i=0;$i<count($bingarray);$i++)
//		{
//		$bingarray[$i]['link'] = $bingarray[$i]['Url'];
//		unset($bingarray[$i]['Url']);
//		$bingarray[$i]['link'] = str_replace("www.","",$bingarray[$i]['link']);
//		$bingarray[$i]['title'] = $bingarray[$i]['Title'];
//		unset($bingarray[$i]['Url']);
//		$bingarray[$i]['snippet'] = $bingarray[$i]['Description'];
//		unset($bingarray[$i]['Description']);
//		}
		
	
		foreach ($bingarray as $bing)
		{
	
echo "<a href=\"{$bing['MediaUrl']}\" target=\"_blank\"><img src= \"{$bing['Thumbnail']['MediaUrl']}\" height=\"175\" width =\"225\"/></a>"; 
		}
	
		}
     
echo'</div>';
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
