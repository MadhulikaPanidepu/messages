<?php

function get_message($rname)
{
    $servername="mysqlservermadhu.mysql.database.azure.com";
    $username="panidepm1@mysqlservermadhu";
    $password="ABCDabcd@9";
    $dbname="panidepm1_db";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    $sql= "SELECT message FROM p_receivers WHERE receiver= '$rname'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        //output data of each row 
        while($row=$result->fetch_assoc()){
            $message = $row["message"];
        }}else{
            $message = null;
        }

        $conn->close();

        return $message;
    
}
?>
