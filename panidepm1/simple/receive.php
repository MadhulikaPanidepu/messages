<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$messages = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $receivername = $_POST["Receiver"];
    $sendername = $_POST["Sender"];

    // Validate credentials
    // Prepare a select statement
    $sql = "SELECT id, receiver,message, sender FROM p_receivers WHERE receiver = ?";
    if ($receivername != "" && $sendername != "")
    {
        $receivername = trim($_POST["Receiver"]);
        $sendername = trim($_POST["Sender"]);

        if ($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_receivername);

            // Set parameters
            $param_receivername = $receivername;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt))
            {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if receiver name exists, if yes then verify sender name
                if (mysqli_stmt_num_rows($stmt) == 1)
                {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $receivername, $message, $h_sendername);

                    if (mysqli_stmt_fetch($stmt))
                    {
                        if ($sendername == $h_sendername)
                        {
                            // sender name & receiver name is correct Display a message that it's OK
                            $messages = "Hey you got the message from your dear $h_sendername : $message ";

                        }
                        else
                        {
                            // Display an error message if sender or receiver name is not valid
                            $messages = "Looks like you haven't received message from your sender";
                        }
                    }
                }
                else
                {
                    // Display an error message if sender or receiver name doesn't exist
                    $messages = "Looks like you didn't get any message, give the valid names";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);

        }

        // Close connection
        mysqli_close($link);
    }
    else
    {
        $messages = "Please provide the required fields";
    }
}
?>
 
<html>
<head>
    <title>Receive Message</title>
</head>
<body>

<?php echo $messages; ?>

</body>
</html>
