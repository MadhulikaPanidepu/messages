<?php
header("Content-Type:application/json");
require "message.php";

if(!empty($_GET['receivername']))
{
    $rname = $_GET['receivername'];
    $message = get_message($rname);
    if(empty($message)){
        response(200, "Message Not Found", NULL);
    }else{
        response(200,"Message Found", $message);
    }
}else{
    response(400, "Invalid Request", NULL);
}
function response($status, $status_message,$data)
{
    header("HTTP/1.1 ".$status);

    $response['status'] = $status;
    $response['status_message']=$status_message;
    $response['data']=$data;

    $json_response = json_encode($response);
    echo $json_response;
}

?>