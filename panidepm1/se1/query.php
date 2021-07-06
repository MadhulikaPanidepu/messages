<?php
header ("Content-Type:application");
require "message.php";

if(!empty($_GET['receivername']))
{
      $rname = $_GET['receivername'];
      $message = get_message($rname);
	if(empty($message))
	{
	response(NULL);
	}
	else
	{
	response($message);
	}
}
else
{
response(NULL);
}
function response($data)
{
	header("HTTP/1.1 ");
	echo $data;
}
?>