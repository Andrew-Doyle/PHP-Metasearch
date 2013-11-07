<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Metasearch Andrew Doyle</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	
	<!--[if IE]><link rel="stylesheet" href="css/ie.css" type="text/css" media="all" /><![endif]-->
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.scrollTo-min.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	
	<script src="js/jquery-func.js" type="text/javascript"></script>
<?php

date_default_timezone_set('UTC') ;
$time = date( ' j F , H:i ' ) ;
//$user = 'Mike' ;
?>
</head>
<?php error_reporting(0); ?> 
<body                >
	
<!-- BG -->
<div id="bg">
	<span id="top">&nbsp;</span>
	<div id="shell">
		
		<!-- Header -->
		<div id="header">
			<div class="rel-content">
				<h1 id="logo">&nbsp;</h1>
				<p class="site-info">&nbsp;</p>
			</div>
			
			<span class="abs-span island">&nbsp;</span>
			<span class="abs-span ships">&nbsp;</span>
			<span class="abs-span dir">&nbsp;</span>
		</div>
		<!-- Header -->
		
		
		<!-- Navigation -->
		<div class="buttons">
			<a href="#portfolio" class="portfolio-link"><em>&nbsp;</em><span>Search Engines</span></a>
			<a href="#contact" class="contact-link"><em>&nbsp;</em><span>Contact Me</span></a>
		</div>
		
		<div class="buttons top-holder">
			<a href="#top" class="top-link"><em>&nbsp;</em><span>Top</span></a>
		</div>
		<!-- End Navigation -->
		
		
		<!-- Container -->
		<div id="container">
			<div class="rel-content">
				
				<!-- Howdy -->
				<div id="howdy">
					<h2>WELCOME TO METASEARCH</h2>
                    <?php
                    echo '
<form action="old2.php" method="POST">
<fieldset>
<legend>Search away below: (sorry about the invisible text area, will have to try and rectify that alright)</legend>
<textarea rows="5" cols="20" name="query"></textarea>
<input type="hidden" name="time" value=" '. $time.' ">
</fieldset>
<p><input type="submit" ></p>
</form> ' ;
?>
                    
					<!--<form method="POST" action="old2.php">
<label for="query">Google Search</label><br/> <input name="query" type="text" size="60" maxlength="60" value="" class="field" /><br /><br /> 
<input name="bt_search" type="submit" value="Search" class="submit" /> 
<br />
<label for="query2">Bing Search</label><br/> <input name="query3" type="text" size="60" maxlength="60" value="" class="field" /><br /><br /> 
<input name="bt_search2" type="submit" value="Search" class="submit" /> 
<br />
<label for="query3">Yahoo Search</label><br/> <input name="query3" type="text" size="60" maxlength="60" value="" class="field"/><br /><br /> 
<input name="bt_search3" type="submit" value="Search" class="submit" /> 
</form> -->
				</div>
				<!-- End Howdy -->
			
			
				<!-- Portfolio -->
				<div id="portfolio">
					<h2>SEARCH ENGINES</h2>
					<div class="projects">
						<ul>
						    <li>
						    	<div class="project">
							    	<div class="project-bg">
										<a target="_blank" href="google.php" title="Google Search" class="plus">Open</a>
							    		<a target="_blank" href="google.php" title="Google Search"><img src="css/images/google.jpg" alt="" /></a>
							    	</div>
						    	</div>
						    	<div class="project">
							    	<div class="project-bg">
										<a target="_blank" href="bing.php" title="Bing Search" class="plus">Open</a>
							    		<a target="_blank" href="bing.php" title="Bing Search"><img src="css/images/bing.jpg" alt="" /></a>
							    	</div>
						    	</div>
						    	<div class="project">
							    	<div class="project-bg">
										<a target="_blank" href="yahoo.php" title="Yahoo! Search" class="plus">Open</a>
							    		<a target="_blank" href="yahoo.php" title="Yahoo! Search"><img src="css/images/yahoo.jpg" alt="" /></a>
							    	</div>
						    	</div>
						    	<div class="project">
							    	<div class="project-bg">
										<a target="_blank" href="blekko_basic.php" title="Blekko Search" class="plus">Open</a>
							    		<a target="_blank" href="blekko_basic.php" title="Blekko Search"><img src="css/images/blekko.png" alt="" /></a>
							    	</div>
						    	</div>
						    	
						    </li>
						    </ul>
				  </div>
			  </div>
				<!-- End Portfolio -->
			
				
				<!-- Contact -->
				<div id="contact">
					<h2>Contact Me</h2>
					<div class="cl">&nbsp;</div>
					<div class="left">
						<p>This metasearch engine is being completed for educational purposes only</p>
	
						</div>
					<div class="right">
						<form action="" method="post">
							<label><strong>Your Name</strong> (Required):</label>
							<input type="text" class="field" />
							<label><strong>Your E-mail Address</strong> (Required):</label>
							<input type="text" class="field" />
							<label><strong>Message</strong> (Required):</label>
							<textarea name="" class="field" rows="5" cols="10"></textarea>
							
							<a href="#" class="submit">Submit</a>
	
						</form>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Contact -->
			
				
			</div>
			
			<span class="abs-span animals">&nbsp;</span>
			<span class="abs-span animal2">&nbsp;</span>
			<span class="abs-span bottle">&nbsp;</span>
		</div>
		<!-- Container -->
		
		<p class="copy">&copy; AndrewDoyle.pw. Design by <a href="http://chocotemplates.com">ChocoTemplates.com</a></p>
	</div>	
</div>	
<!-- End BG -->
</body>
</html>