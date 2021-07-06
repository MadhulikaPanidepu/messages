<?php

function get_message($rname)
{
	$a_message = [
		"Kanthu"=> "How are you?",
		"dad"=>"All the best",
		"Madhu"=>"Combine together to get my name"
	];
	foreach($a_message as $receiver=>$message)
	{
		if($receiver==$rname)
		{
			return $message;
			break;
		}
	}
}
?>