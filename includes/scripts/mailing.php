<?php

	function sendEmailWithTemplate($recipient, $subject, $content, $sender){
		
		$message = "
			<html><head><title>".$subject."</title><style>
			body { text-align: center; }
			table { width: 65%; border: 5px #333 solid; border-collapse: collapse; margin: 0 auto; }
			td.header { background: #333; padding-top: 20px; padding-bottom: 20px; text-align: center; }
			td.message { color: #333; font-family: Verdana; font-size: 11pt; text-align: left; padding: 20px; }
			td.footer { background: #333; font-family: Verdana; color: #EEE; font-size: 9pt; text-align: center; padding-top: 10px; padding-bottom: 10px; }
			img.logo { width: 200px; height: auto; }
			a:link, a:visited { text-decoration: none; color: #4F9DB8; }
			a:hover { text-decoration: underline; }
			</style></head><body>
			<table><tr><td class='header'>
			<img src='https://www.citytakeoff.com/wp-content/uploads/2017/08/logo.png' class='logo' /></td></tr>
			<tr><td class='message'>
		";
		
		// Add the content
		$message .= $content;
		
		$message .= "
			</td></tr>
			<tr><td class='footer'>Copyright &copy; ".date('Y')." - CityTakeOff</td></tr>
			</body></html>
		";
		
		// Create the header information
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		
		if (!empty($sender)){
			$headers[] = 'From: '.$sender;
		} else {
			$headers[] = 'From: CityTakeOff <noreply@citytakeoff.com>';
		}
		
		// Send the email
		if (mail($recipient, $subject, $message, implode("\r\n", $headers))){
			return true;
		} else {
			return false;
		}
		
	}

?>