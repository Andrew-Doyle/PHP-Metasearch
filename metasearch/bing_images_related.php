
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bing Metasearch PHP</title>

<link href="homepage2.css" rel="stylesheet" type="text/css" />


</head>

<?php error_reporting(0); ?> 
<body  id="bing_search">

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
		<form action="bingsearch.php" method="POST" >
		<input type="text" name="query" placeholder="Search" style="width: 500px;"><br>
		<p>
		<input type="radio" name="SearchType?" value="Web" > Web
        <input type="radio" name="SearchType?" value="Images" checked="checked" > Images
		<input type="radio" name="SearchType?" value="News" > News
		&nbsp;
		&nbsp;
		<input type="submit" value="Search">
		</p>
		</form>
  
     </div>
     
     
  
    
<?php if($_SERVER['REQUEST_METHOD']!='POST') 
	{
		
	
    echo'<div id="mainwrapper">';
   

echo'<div id="individual_or_aggregated_results">';
		
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
		//var_dump($jsonObj);
				
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
	
//		for ($i=0;$i<count($bingarray);$i++)
//		{
//		$bingarray[$i]['link'] = $bingarray[$i]['Url'];
//		unset($bingarray[$i]['Url']);
//		$bingarray[$i]['link'] = str_replace("www.","",$bingarray[$i]['link']);
//		$bingarray[$i]['link'] = str_replace("www.","",$bingarray[$i]['link']);
//		$bingarray[$i]['link'] = str_replace("https://","http://",$bingarray[$i]['link']);	
//		$bingarray[$i]['link'] = str_replace("http://","http://www.",$bingarray[$i]['link']);
//		$bingarray[$i]['link'] = str_replace("www.www3.","www3.",$bingarray[$i]['link']);
//		$bingarray[$i]['link'] = str_replace("www.www2.","www2.",$bingarray[$i]['link']);
//		$bingarray[$i]['link'] = str_replace("www.www22.","www22.",$bingarray[$i]['link']);
//		$bingarray[$i]['link'] = str_replace("www.www1.","www1.",$bingarray[$i]['link']);
//		$backslash = $bingarray[$i]['link'];
//		$backslash_removed = rtrim($backslash,"/");
//		$bingarray[$i]['link'] = $backslash_removed;
//		$bingarray[$i]['title'] = $bingarray[$i]['Title'];
//		unset($bingarray[$i]['Url']);
//		$bingarray[$i]['snippet'] = $bingarray[$i]['Description'];
//		unset($bingarray[$i]['Description']);
//		}
		
		$z=0;
		foreach ($bingarray as $bing)
		{
		
 
echo "<a href=\"{$bing['MediaUrl']}\" target=\"_blank\"><img src= \"{$bing['Thumbnail']['MediaUrl']}\" height=\"175\" width =\"225\"/></a>"; 
		}

  	}
//		
//$finalurls = array();
//
//foreach ($bingarray as $urls)
//{
//	$finalurls[] = $urls['link'];
//}
//
//
//
//$myfile = fopen('1_bing.csv', 'w');
//fputcsv($myfile, $finalurls);
//fclose($myfile);
     
echo'</div>';

echo'<div id="related_terms_agg_or_individual">
 <img src="Resources/Images/background/bingsmall.jpg" width="135" height="78" />
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
		printf('<a href="bing_images_related.php?query=%1$s">%1$s</a><br/>', $test3);
		
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
