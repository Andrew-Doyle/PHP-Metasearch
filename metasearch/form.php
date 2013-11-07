<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback - Metasearch</title>

<link href="homepage3.css" rel="stylesheet" type="text/css" />

</head>

<?php error_reporting(0); ?> 
<body id="survey">


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
	
		<form action="websearch.php" method="POST" >
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
  

  

		
	
	   <div id="mainwrapper">
   
<div id="user_Feedback">
   

    <br />
    <form action="send_mail.php" method="post">
    <fieldset>
    <legend><strong>METASEARCH USER FEEDBACK</strong></legend>
    <br />
    All questions must be answered. <br /><br />Occupation is the only required comment. All other comments are optional.<br /><br />
    Survey responses are anonymous.  
    <br /><br /><label><strong>For the purposes of data analyses, please state your occupation (web developer, student, retired, other, etc):</strong> </label><br /><br />
    <input name="Occupation" type="text" maxlength="100" />
     <br /> <br />
     <hr>
   <br />  <label><strong>Which search engine do you normally use?</strong> </label>
   
    <p>
  <label>
    <input type="radio" name="WhichSearchEngine?" value="Google" id="WhichSearchEngine_0" />
    Google</label>
   <label>
    <input type="radio" name="WhichSearchEngine?" value="Bing" id="WhichSearchEngine_1" />
    Bing</label>
    <label>
    <input type="radio" name="WhichSearchEngine?" value="Yahoo" id="WhichSearchEngine_2" />
    Yahoo</label>
    <label>
    <input type="radio" name="WhichSearchEngine?" value="Other" id="WhichSearchEngine_3" />
    Other</label>
 
  
</p>
    <label>If Other, please state: </label>
    <input name="EngineUsed" type="text" maxlength="100" />
    <hr>
    <br /> <label><p><strong>When a question asks for an answer on a scale of 1 to 10:</strong>
    <ul>
    <li> 1 signifies that you 'Strongly Disagree'</li>
    <li> 10 signifies that you 'Strongly Agree'</li>
    <li> Not Sure = Undecided </li>
    </ul></p> </label>
    <hr>
      <br />    <label><strong> A metasearch engine aggregates the results from multiple search engines, with the aim of returning a more relevant result particular to a user`s query. A large scale metasearch engine may have the ability to reach parts of the web that traditional search engines cannot. Do you believe that your current search engine of choice could be improved on?</strong></label>
        <p>
  <label>
    <input type="radio" name="Improvement" value="Yes" id="Improvement_0" />
    Yes</label>
   <label>
    <input type="radio" name="Improvement" value="No" id="Improvement_1" />
    No</label>
    <label>
    <input type="radio" name="Improvement" value="Not Sure" id="Improvement_2" />
   Not Sure</label>
</p>
   <br /> <label>Further Comments</label><br /><br />
    <textarea name="Improvementcomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
     <hr>
    <br />  <label> <strong>Generally the quality of the results returned were superior to my normal search engine of choice</strong> </label>
<p>
  <label>
    <input type="radio" name="QualityofResults" value="Yes" id="QualityofResults_0" />
    Yes
 </label>
 <label>
    <input type="radio" name="QualityofResults" value="No" id="QualityofResults_1" />
    No
</label>
<label>
    <input type="radio" name="QualityofResults" value="Not Sure" id="QualityofResults_2" />
   Not Sure
 </label>
</p>

 <br /> <label>Further Comments</label><br /><br />
    <textarea name="QualityofResultscomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
	<hr>
     <br />     <label> <strong>The option of displaying results from multiple search engines Side by Side is a feature that appeals to me</strong> </label>
        <p>
  <label>
    <input type="radio" name="SidebySide" value="Yes" id="SidebySide_0" />
    Yes</label>
   <label>
    <input type="radio" name="SidebySide" value="No" id="SidebySide_1" />
    No</label>
    <label>
    <input type="radio" name="SidebySide" value="Not Sure" id="SidebySide_2" />
   Not Sure</label>
</p>

   <br /> <label>Further Comments</label><br /><br />
    <textarea name="SidebySidecomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
    <hr>
    <br />      <label> <strong>More often than not the quality of the aggregated results returned were better when compared to the non-aggregated results</strong> </label>
        <p>
  <label>
    <input type="radio" name="QualityofResultsagg" value="Yes" id="QualityofResultsagg_0" />
    Yes</label>
   <label>
    <input type="radio" name="QualityofResultsagg" value="No" id="QualityofResultsagg_1" />
    No</label>
    <label>
    <input type="radio" name="QualityofResultsagg" value="Not Sure" id="QualityofResultsagg_2" />
   Not Sure</label>
</p>

 <br /> <label>Further Comments</label><br /><br />
    <textarea name="QualityofResultsaggcomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
	<hr>
 <br /><label> <strong>The related searches feature provided relevant alternative query terms</strong> </label>
        <p>
  <label>
    <input type="radio" name="Related" value="Yes" id="Related_0" />
    Yes</label>
   <label>
    <input type="radio" name="Related" value="No" id="Related_1" />
    No</label>
    <label>
    <input type="radio" name="Related" value="Not Sure" id="Related_2" />
   Not Sure</label>
</p>
 
 
  <br /> <label>Further Comments</label><br /><br />
    <textarea name="Relatedcomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
     <hr>
   <br />  <label> <strong>The interface was easy to use</strong> (10 = Strongly agree, 1 = Strongly disagree) </label>
        <p>
  <label>
    <input type="radio" name="Interface" value="1" id="Interface_0" />
    1</label>
   <label>
    <input type="radio" name="Interface" value="2" id="Interface_1" />
    2</label>
    <label>
    <input type="radio" name="Interface" value="3" id="Interface_2" />
   3</label>
    <label>
    <input type="radio" name="Interface" value="4" id="Interface_3" />
    4</label>
      <label>
    <input type="radio" name="Interface" value="5" id="Interface_4" />
    5</label>
   <label>
    <input type="radio" name="Interface" value="6" id="Interface_5" />
    6</label>
    <label>
    <input type="radio" name="Interface" value="7" id="Interface_6" />
   7</label>
    <label>
    <input type="radio" name="Interface" value="8" id="Interface_7" />
    8</label>
        <label>
    <input type="radio" name="Interface" value="9" id="Interface_8" />
   9</label>
    <label>
    <input type="radio" name="Interface" value="10" id="Interface_9" />
    10</label>
     <label>
    <input type="radio" name="Interface" value="Not Sure" id="Interface_10" />
    Not Sure</label>
    
 </p>
 
  <br /> <label>Further Comments</label><br /><br />
    <textarea name="Interfacecomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
 	<hr>
     <br /><label> <strong>The results were well presented</strong> </label>
        <p>
  <label>
    <input type="radio" name="Presentation" value="1" id="Presentation_0" />
    1</label>
   <label>
    <input type="radio" name="Presentation" value="2" id="Presentation_1" />
    2</label>
    <label>
    <input type="radio" name="Presentation" value="3" id="Presentation_2" />
   3</label>
    <label>
    <input type="radio" name="Presentation" value="4" id="Presentation_3" />
    4</label>
      <label>
    <input type="radio" name="Presentation" value="5" id="Presentation_4" />
    5</label>
   <label>
    <input type="radio" name="Presentation" value="6" id="Presentation_5" />
    6</label>
    <label>
    <input type="radio" name="Presentation" value="7" id="Presentation_6" />
   7</label>
    <label>
    <input type="radio" name="Presentation" value="8" id="Presentation_7" />
    8</label>
        <label>
    <input type="radio" name="Presentation" value="9" id="Presentation_8" />
   9</label>
    <label>
    <input type="radio" name="Presentation" value="10" id="Presentation_9" />
    10</label>
     <label>
    <input type="radio" name="Presentation" value="Not Sure" id="Presentation_10" />
    Not Sure</label>
    
 </p>
 
  <br /> <label>Further Comments</label><br /><br />
    <textarea name="Presentationcomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
 	<hr>
     <br /><label> <strong>The speed of the metasearch engine is similar to my typical search engine of choice</strong> </label>
        <p>
  <label>
    <input type="radio" name="Speed" value="Yes" id="Speed_0" />
    Yes</label>
   <label>
    <input type="radio" name="Speed" value="No" id="Speed_1" />
    No</label>
    <label>
    <input type="radio" name="Speed" value="Not Sure" id="Speed_2" />
   Not Sure</label>
</p>

 <br /> <label>Further Comments</label><br /><br />
    <textarea name="Speedcomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
     <hr>
 <br /><label> <strong>Would you consider making this engine your default search engine?</strong></label>
        <p>
  <label>
    <input type="radio" name="defaultsearch" value="Yes" id="Speed_0" />
    Yes</label>
   <label>
    <input type="radio" name="defaultsearch" value="No" id="Speed_1" />
    No</label>
        <label>
    <input type="radio" name="defaultsearch" value="Not Sure" id="Speed_2" />
   Perhaps - if certain improvements were made</label>
    <label>
    <input type="radio" name="defaultsearch" value="Not Sure" id="Speed_2" />
   Not Sure</label>
</p>

 <br /> <label>Further Comments</label><br /><br />
    <textarea name="defaultsearchcomment" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
     <hr>
     
      <br /> <label><strong>Have you any suggestions for improvements to this metasearch engine?</strong></label><br /><br />
    <textarea name="Suggestions" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
     <hr>
     
           <br /> <label><strong>Enter any general comments below</strong></label><br /><br />
    <textarea name="general" cols="90" rows="5">
    </textarea>
    
     <br /> <br />
     
         <div class="form-field">
    <input id="submit" type="submit" name="submit"
    value="Enter your Feedback!">
    </div>
   
    </fieldset>
    </form>
		
  </div>

 
  
      
    
<div id="footerbox">
  <div align="center">
   <div class="footer">
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


