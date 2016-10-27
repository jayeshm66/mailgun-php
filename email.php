<?php

use Mailgun\Mailgun;

class Helper
{
     
	function send_mailgun_mail($to,$subject,$emailText,$from,$cc,$attachment_arr) {
      
    return true;
	// initialise mailgun api key
		$mgClient = new Mailgun(MAILGUN_API_KEY);

	// Verified Domail
		$domain = "YOUR DOMAIN";

	// configure mail content detail
		$message_content_array = array(
			"from" => $from,
			"to" => $to,
			"subject" => $subject,
			'html' => $emailText
			);
		if($cc){
			$message_content_array['cc'] = $cc;
		}

		if ($attachment_arr != false) {
	// Make the call to the client send mail.
			$result = $mgClient->sendMessage($domain, $message_content_array,
				array( 'attachment' => $attachment_arr)
				);
		}
		else {
	// Make the call to the client send mail.
			$result = $mgClient->sendMessage($domain, $message_content_array);
		}
		return true;
	}
}

