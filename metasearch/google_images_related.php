
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Images, Google - Metasearch</title>

<link href="homepage2.css" rel="stylesheet" type="text/css" />


</head>

<?php error_reporting(0); ?> 
<body id="google_search">
<?php 
include_once("analyticstracking.php") 

?>

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
		<form action="googlesearch.php" method="POST" >
		<input type="text" name="query" placeholder="Search" style="width: 500px;"><br>
		<p>
		<input type="radio" name="SearchType?" value="Web"> Web
		<input type="radio" name="SearchType?" value="Images"  checked="checked" > Images
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
		
		//var_dump($js);
		
     	$googlearray1= $js['items'];
		
		//var_dump($googlearray1);
				
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
			
//		for ($i=0;$i<count($googlearray);$i++) //not required for nonagg
//		{
//			$googlearray[$i]['link'] = str_replace("www.","",$googlearray[$i]['link']);
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
//		}



}


	$z=0;
	foreach ($googlearray as $finallist) //change to googlearray for 100 results
	{
	
	$z++;
	 
	//echo $z.": <a href=\"{$finallist['link']}\"><font color ='blue'>{$finallist['title']}</font></a>".": ".$newline.$newline.$finallist['snippet'].$newline.$newline.
	echo "<img src= \"{$finallist['image']['thumbnailLink']}\" height=\"175\" width =\"225\" />";

	 
	}			
//
//$finalurls = array();
//
//foreach ($googlearray as $urls)
//{
//	$finalurls[] = $urls['link'];
//}
//
//
//
//$myfile = fopen('1_google.csv', 'w');
//fputcsv($myfile, $finalurls);
//fclose($myfile);

     
echo'</div>';

echo'<div id="related_terms_agg_or_individual">
 <img src="Resources/Images/background/googlesmall.jpg" width="135" height="78" />
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
		printf('<a href="google_images_related.php?query=%1$s">%1$s</a><br/>', $test3);
		
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
