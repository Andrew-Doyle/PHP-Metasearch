<head>
<title>Metasearch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php error_reporting(0); ?> 
<body                >

<h1>BING IT</h1> 
<a href="http://www.skysports.com/football" target="new"><img src="tamy.jpg" width="200" height="200" alt="dog"></a>
<form method="POST" action="bing_basic2.php">  
<label for="query">Have a search</label><br/> <input name="query" type="text" size="60" maxlength="60" value="" /><br /><br /> 
<input name="bt_search" type="submit" value="Search" /> 
</form> 

<h2>Results</h1>
{RESULTS}

<?php
//$contents = file_get_contents('bing_basic2.html'); 
if (isset($_POST['query'])) 
{

    // Replace this value with your account key
    $accountKey = 'QN/uNMb3wJyLWiFmLnG9Wa7hyWTPiw2PBy2O7t87MS4=';            
    $ServiceRootURL =  'https://api.datamarket.azure.com/Bing/SearchWeb/';                    
    $WebSearchURL = $ServiceRootURL . 'Web?$format=json&Query=';

    $cred = sprintf('Authorization: Basic %s', 
      base64_encode($accountKey . ":" . $accountKey) );

    $context = stream_context_create(array(
        'http' => array(
            'header'  => $cred
        )
    ));

    $request = $WebSearchURL . urlencode( '\'' . $_POST["query"] . '\'');

    $response = file_get_contents($request, 0, $context);

    $jsonobj = json_decode($response);

    echo('<ul ID="resultList">');

    foreach($jsonobj->d->results as $value)
    {                        
        echo('<li class="resultlistitem"><a href="' 
                . $value->URL . '">'.$value->Title.'</a>');
    }

    echo("</ul>");
}
?>
</body>

</html>

