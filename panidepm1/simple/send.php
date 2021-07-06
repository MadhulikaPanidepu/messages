<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$receivername = $sendername = $message = $messages= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Get receivername,sendername & message 
        $receivername = trim($_POST["Receiver"]);
        $sendername = trim($_POST["Sender"]); 
	    $message = trim($_POST["Message"]);  
        
    // Prepare an insert statement
    $sql = "INSERT INTO p_receivers (receiver,sender,message) VALUES (?, ?, ?)";
         
        // Use DB info in $link from config.php to construct MySQL message/command
        if($stmt = mysqli_prepare($link, $sql)){
	   // Set parameters
            $param_receivername = $receivername;
            $param_sendername = $sendername;
  	        $param_message = $message;


         // validation for checking non-empty fields or prompt user with appropriate   
         if($param_receivername != "" && $param_sendername != "" && $param_message != "" ){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,"sss", $param_receivername, $param_sendername,$param_message);
                     
            // Attempt to EXECUTE the prepared statement
            mysqli_stmt_execute($stmt);            

            // Close statement
            mysqli_stmt_close($stmt);
            $messages = "Congratulations! You have sent your message!";
            }
            else{
                $messages = "Please provide all the required fields"; 
            }

        } else {
            $messages = "oops try again!!!";            
        }

    // Close connection
    mysqli_close($link);
}
?>

<html>
<head>
    <title>Send Message</title>
</head>
<body>

<?php echo $messages; ?>
 
</body>
</html>

