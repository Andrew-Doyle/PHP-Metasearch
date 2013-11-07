
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aggregation Test</title>

<link href="results1.css" rel="stylesheet" type="text/css" />
<script>


</head>

<?php error_reporting(0); ?> 
<body                >

<div id="container">
  <div id="wrapper">
      <div id="navbar2">   
      <div align="left">
        <div class="navbar">
  <ul>
    <li><a href="google.php" title="Google id="costslink">Google</a></li>
	<li><a href="bing.php" title="Bing" id="homelink">Bing</a></li>
    <li><a href="yahoo.php" title="Yahoo"id="directorylink">Yahoo</a></li>
	<li><a href="index.php" title="Metasearch"id="directorylink">Back to Metasearch</a></li>
    <li><a href="rewrite_agg.php" title="Aggregation RW Test"id="directorylink">RW Aggregated</a></li>
	<li><a href="rewrite_google.php" title="Rewrite Google Test"id="directorylink">RW Google</a></li>
	<li><a href="rewrite_bing.php" title="Rewrite Bing Test"id="directorylink">RW Bing</a></li>
	<li><a href="rewrite_yahoo.php" title="Rewrite Yahoo Test"id="directorylink">RW Yahoo</a></li>
           
  </ul>
        </div>
        </div>
        </div>
    <div id="header">
        <h1 align="center">Metasearch Aggregation Test Page</h1>
    </div>

     
  
    
<?php if($_SERVER['REQUEST_METHOD']!='POST')
	{
		echo'<div id="navbar2">'; 
      echo'<div align="left">';
        echo'<div class="navbar">';
		#form display statements to be inserted here
		
		
		
		echo '
		<form action="index_aggtest.php" method="POST">
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
	
	if($_POST['SearchType?']=='Non-Aggregated')
   {
	   
	   	echo'<div id="navbar2">'; 
      echo'<div align="left">';
        echo'<div class="navbar">';
		#form display statements to be inserted here
		
		
		
		echo '
		<form action="index_aggtest.php" method="POST">
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
	   
	   
    echo'<div id="mainwrapper">';
   
echo'<div id="column_1_of_3">';
		echo'<ul>';
			echo'<li><strong><a href="yahoo.php">Yahoo</a></strong></li>';
		echo'</ul>';
			   //################################################## YAHOO ##########################################################################################-->
	
		if ($_POST['query'])
		{
		$newline="<br />";
		echo $newline;
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
		
		$w=0;
		foreach ($yahooarray as $yahoo)
		{
		 $w++;
 
 echo $w.": <a href=\"{$yahoo['link']}\"><font color ='blue'>{$yahoo['title']}</font></a>".": "."$newline"."$newline".$yahoo['snippet'].$newline.$newline.$yahoo['link'].$newline.$newline;
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
						
    	$url="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=1";
		
		$ch = curl_init();
		
		curl_setopt($ch,CURLOPT_URL,$url);
		
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		
		$data = curl_exec($ch);
		
		$js = json_decode($data,true);
		
     	$googlearray1= $js['items'];
		//		
//		$url2="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=11";
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
		
		$y=0;
		foreach ($googlearray1 as $finallist)
		{
		
		$y++;
		 
		echo $y.": <a href=\"{$finallist['link']}\"><font color ='blue'>{$finallist['title']}</font></a>".": "."$newline"."$newline".$finallist['snippet'].$newline.$newline.$finallist['link'].$newline.$newline;
		 
		}	
	}
		
     
echo'</div>';
echo'<div id="column_3_of_3">';
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
		
		$z=0;
		foreach ($bingarray as $bing)
		{
		 $z++;
 
 		echo "<li class=\"titlelink\"> <a href=\"{$bing['link']}\">{$bing['title']}</a></li>"."<li class = \"displaylink\">{$bing['link']}&nbsp;&nbsp;&nbsp&nbsp&nbsp&nbsp<span class =\"foundon\">Found on Bing.</span></li>"."<li class =\"snippet\">{$bing['snippet']}</li>".$newline;
		}
	
		}
     
echo'</div>';
echo'</div>';
} //END OF ELSE BLOCK
}
/////////////////// ********************************************************************* AGGREGATED ****************************************** ////////////////////////
if($_POST['SearchType?']=='Aggregated')
   {
	   
	   	echo'<div id="navbar2">'; 
      echo'<div align="left">';
        echo'<div class="navbar">';
		#form display statements to be inserted here
		
		
		
		echo '
		<form action="index_aggtest.php" method="POST">
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
    echo'<div id="mainwrapper">';
   
echo'<div id="column_1_of_30">';
    echo'<p>Aggregation not ready yet. </p>
	
	<br/>
	';
	
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
				
//		$url2="https://www.googleapis.com/customsearch/v1?key=AIzaSyBDILlkAKYSVE3xqX-JEgx6ZhNMn8sb2i8&cx=001077013574771030445:an0yh4jgglw&q=$query&alt=json&start=11";
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
			
//		for ($i=0;$i<count($googlearray);$i++)
//		{
//			$googlearray[$i]['link'] = str_replace("www.","",$googlearray[$i]['link']);
//			$googlearray[$i]['link'] = str_replace("https://","http://",$googlearray[$i]['link']);
//			$googlearray[$i]['link'] = str_replace("http://","http://www.",$googlearray[$i]['link']);
//			$googlearray[$i]['link'] = str_replace("www.www3.","www3.",$googlearray[$i]['link']);
//			$googlearray[$i]['link'] = str_replace("www.www2.","www2.",$googlearray[$i]['link']);
//			$googlearray[$i]['link'] = str_replace("www.www22.","www22.",$googlearray[$i]['link']);
//			$googlearray[$i]['link'] = str_replace("www.www1.","www1.",$googlearray[$i]['link']);
//			$backslash = $googlearray[$i]['link'];
//			$backslash_removed = rtrim($backslash,"/");
//			$googlearray[$i]['link'] = $backslash_removed;
//			
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
		$bingarray[$i]['link'] = str_replace("https://","http://",$bingarray[$i]['link']);	
		$bingarray[$i]['link'] = str_replace("http://","http://www.",$bingarray[$i]['link']);
		$bingarray[$i]['link'] = str_replace("www.www3.","www3.",$bingarray[$i]['link']);
		$bingarray[$i]['link'] = str_replace("www.www2.","www2.",$bingarray[$i]['link']);
		$bingarray[$i]['link'] = str_replace("www.www22.","www22.",$bingarray[$i]['link']);
		$bingarray[$i]['link'] = str_replace("www.www1.","www1.",$bingarray[$i]['link']);
		$backslash = $bingarray[$i]['link'];
		$backslash_removed = rtrim($backslash,"/");
		$bingarray[$i]['link'] = $backslash_removed;
		$bingarray[$i]['title'] = $bingarray[$i]['Title'];
		unset($bingarray[$i]['Url']);
		$bingarray[$i]['snippet'] = $bingarray[$i]['Description'];
		unset($bingarray[$i]['Description']);
		}
		
		
		}
		
$lists = array($bingarray, $yahooarray, $googlearray); // change to $googlearray for 100 results
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
		
		
$finalurls = array();

foreach ($combinedRank as $urls)
{
	$finalurls[] = $urls['link'];
}



$myfile = fopen('000query.csv', 'w');
fputcsv($myfile, $finalurls);
fclose($myfile);
		
		
 //$File = "153.csv"; 
// $Handle = fopen($File, 'w');
// fwrite($Handle, $finalurls); 
// fclose($Handle); 
	
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
