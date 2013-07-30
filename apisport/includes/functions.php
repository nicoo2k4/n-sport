<?php 

function sendMail($subject,$content) {
	mail("delise.nicolas@gmail.com", "[ERROR API] " . $subject, $content );	
}
