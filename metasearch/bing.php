
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bing - Metasearch</title>

<link href="homepage.css" rel="stylesheet" type="text/css" />

</head>

<?php error_reporting(0); ?> 
<body id="home_bing">

<div id="container">
  <div id="wrapper">


<div id="headercentre">

<p>&nbsp;</p>
<div align="center">
<img src="Resources/Images/background/metasearch2.gif" width="200" height="85" />
</div>
</div>
<div id="pagelinks">
<div align="centre">
<div class="navbar">
	     <ul>
         <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
		<li><a href="index.php" title="Web Search" id="web">Web</a></li>
    	<li><a href="images.php" title="Image Search" id="images">Images</a></li> 
		<li><a href="news.php" title="News Search" id="news">News</a></li> 
		<li><img src="Resources/Images/background/metasearch.gif" width="95" height="40" /></li>
	<li><a href="google.php" title="Google" id="google">Google</a></li>
	<li><a href="bing.php" title="Bing" id="bing">Bing</a></li>
    <li><a href="yahoo.php" title="Yahoo"id="yahoo">Yahoo</a></li>
		</ul>
	
</div>
</div>
</div>

    <div id="header" class="form">
	
		<div align="center">
		<form action="bingsearch.php" method="POST" >
		<input type="text" name="query" placeholder="Search" style="width: 500px;"><br>
		<p>
		<input type="radio" name="SearchType?" value="Web" checked="checked"> Web
        <input type="radio" name="SearchType?" value="Images" > Images
		<input type="radio" name="SearchType?" value="News" > News
		&nbsp;
		&nbsp;
		<input type="submit" value="Bing It">
		</p>
		</form>
  	</div>
     </div>
  
    
 <div id="footerboxspace">
  <div align="center">
	<img src="Resources/Images/background/bing2.png" width="300" height="125" />
    </div>
      
    <p>&nbsp;</p>
    
  </div>       
       
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
