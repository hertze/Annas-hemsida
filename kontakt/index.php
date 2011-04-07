<?php
function spamcheck($field) {
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
}

function render_form() {
	print "<form method='post' action='./'>
		<div class='form_section'>
  			<div class='label'><p>E-post:</p></div>
			<div class='form'><p><input name='email' type='text' /></p></div>
		</div>
		<div class='form_section'>
  			<div class='label'><p>Rubrik:</p></div>
			<div class='form'><p><input name='subject' type='text' /></p></div>
		</div>
		<div class='form_section'>
  			<div class='label'><p>Meddelande:</p></div>
			<div class='form'><p><textarea name='message' rows='15' cols='40'></textarea></p></div>
		</div>
  		<div class='form_section'>
  			<div class='submit'><p><input type='submit' /></p></div>
  		</div>
  	</form>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv" lang="sv">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Kontakta Anna Hertze</title>
	<meta name="author" content="Anna Hertze" />
	<meta name="copyright" content="Copyright Anna Hertze" />
	<meta name="keywords" content="makeup, smink, sminkning" />
	<meta name="description" content="" />
	
	<link rel="stylesheet" href="../screen.css" type="text/css" media="screen, projection" />
</head>
<body>
	<div id="canvas" class="clearfix">
		<div id="main">
			<div id="logo">
				<img src="../bilder/logo.gif" />
			</div>
			<div id="nav">
				<ul>
					<li><a href="../">Hem</a></li>
					<li><a href="../om">Om mig</a></li>
					<li><a href="../portfolio">Portfolio</a></li>
					<li><a href="http://annahertze.tumblr.com">Inspiration</a></li>
					<li><span class="fokus">Kontakta mig</span></li>
				</ul>
			</div>
			<div id="contents">
				
				<div id="postbox">
					
						<p>Fyll i och skicka formuläret nedan, så återkommer jag så snart jag kan.</p>
					<div id="mail_form">
						
						<?php
						if (isset($_REQUEST['email'])) {
					
						$mailcheck = spamcheck($_REQUEST['email']);
					  
						if ($mailcheck==FALSE)
						{
							print "<p class='alert'>Du har inte angett en giltig epostadress! Klicka på bakåt-knappen i din webbläsare för ett nytt försök.</p>";
						
						}
						else
							{
							$email = $_REQUEST['email'] ;
							$subject = $_REQUEST['subject'] ;
							$message = $_REQUEST['message'] ;
							mail("makeup@hertze.com", "Från hemsidan: $subject",
							$message, "From: $email" );
							print "<p class='tack'>Tack för ditt meddelande. Jag återkommer så snart jag kan.</p>";
							}
						}
						else {
						render_form();
						}
						?>
 	
 					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
