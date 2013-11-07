<?php
// This function checks for email injection. Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Load form field data into variables.
$Occupation = $_REQUEST['Occupation'] ;
$whichengineheader = "Which search engine do you normally use?";
$whichengine = $_REQUEST['WhichSearchEngine?'] ;
$engineused = $_REQUEST['EngineUsed'] ;
$Improvement = $_REQUEST['Improvement'] ;
$Improvementcomment = $_REQUEST['Improvementcomment'] ;
$QualityofResults = $_REQUEST['QualityofResults'] ;
$QualityofResultscomment = $_REQUEST['QualityofResultscomment'] ;
$SidebySide = $_REQUEST['SidebySide'] ;
$SidebySidecomment = $_REQUEST['SidebySidecomment'] ;
$QualityofResultsagg = $_REQUEST['QualityofResultsagg'] ;
$QualityofResultsaggcomment = $_REQUEST['QualityofResultsaggcomment'] ;
$Related = $_REQUEST['Related'] ;
$Relatedcomment = $_REQUEST['Relatedcomment'] ;
$Interface = $_REQUEST['Interface'] ;
$Interfacecomment = $_REQUEST['Interfacecomment'] ;
$Presentation = $_REQUEST['Presentation'] ;
$Presentationcomment = $_REQUEST['Presentationcomment'] ;
$Speed = $_REQUEST['Speed'] ;
$Speedcomment = $_REQUEST['Speedcomment'] ;
$defaultsearch = $_REQUEST['defaultsearch'] ;
$defaultsearchcomment = $_REQUEST['defaultsearchcomment'] ;
$Suggestions = $_REQUEST['Suggestions'] ;
$general = $_REQUEST['general'] ;

$mailContent= "
<strong>OCCUPATION</strong>
<br/>$Occupation<br/><br/>

<strong>Engine Used</strong>
<br/>$whichengine<br/><br/>

<strong>Engine Used (If other):</strong>
<br/>$engineused<br/><br/>

<strong>Improvement?</strong>
<br/>$Improvement<br/><br/>

Further Comments:
<br/><br/>$Improvementcomment<br/><br/>

<strong>Generally the quality of the results returned were superior to my normal search engine of choice</strong>
<br/>$QualityofResults<br/><br/>

Further Comments
<br/><br/>$QualityofResultscomment<br/><br/>

<strong>The option of displaying results from multiple search engines Side by Side is a feature that appeals to me</strong>
<br/>$SidebySide<br/><br/>

Further Comments
<br/><br/>$SidebySidecomment<br/><br/>

<strong>More often than not the quality of the aggregated results returned were better when compared to the non-aggregated results</strong>
<br/>$QualityofResultsagg<br/><br/>

Further Comments
<br/><br/>$QualityofResultsaggcomment<br/><br/>

<strong>The related searches feature provided relevant alternative query terms</strong>
<br/>$Related<br/><br/>

Further Comments
<br/><br/>$Relatedcomment<br/><br/>

<strong>The interface was easy to use (10 = Strongly agree, 1 = Strongly disagree)</strong>
<br/>$Interface<br/><br/>

Further Comments
<br/><br/>$Interfacecomment<br/><br/>

<strong>The results were well presented</strong>
<br/>$Presentation<br/><br/>

Further Comments
<br/><br/>$Presentationcomment<br/><br/>

<strong>The speed of the metasearch engine is similar to my typical search engine of choice</strong>
<br/>$Speed<br/><br/>

Further Comments
<br/><br/>$Speedcomment<br/><br/>

<strong>Would you consider making this engine your default search engine?</strong>
<br/>$defaultsearch<br/><br/>

Further Comments
<br/><br/>$defaultsearchcomment<br/><br/>

<strong>Have you any suggestions for improvements to this metasearch engine?</strong>
<br/>$Suggestions<br/><br/>

<strong>Enter any general comments below</strong>
<br/>$general<br/><br/>

<strong>IP ADDRESS</strong>
";
$mailContent.= $_SERVER['REMOTE_ADDR'];

// If the user tries to access this script directly, redirect them to feedback form,
if (!isset($_REQUEST['Occupation'])) {
header( "Location: form.php" );
}

// If the form fields are empty, redirect to the error page.
elseif (empty($Occupation)||empty($whichengine) || empty($Improvement) || empty($QualityofResults) || empty($SidebySide)
|| empty($QualityofResultsagg) || empty($Related) || empty($Interface) || empty($Presentation) || empty($Speed) || empty($defaultsearch)) {
header( "Location: error_message.html" );
}


// If email injection is detected, redirect to the error page.
elseif ( isInjected($Occupation) ) {
header( "Location: error_message.html" );
}

// If we passed all previous tests, send the email!
else {
mail( "andrew.doyle@ucdconnect.ie", "Feedback Form Results",
  $mailContent,$headers);
header( "Location: thank_you.html" );
}
?>