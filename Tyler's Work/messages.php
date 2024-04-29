<?php
// Start session
session_start();

// Check if user is logged in, if not redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include database connection file
include_once 'connect.php';

// Define variables and initialize with empty values
$message_text = "";
$message_text_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate message text
    if(empty(trim($_POST["message_text"]))){
        $message_text_err = "Please enter a message.";
    } else{
        $message_text = trim($_POST["message_text"]);
    }

    // Check input errors before inserting into database
    if(empty($message_text_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO MessageTabel (UserID, UserName, MessageDate, MessageEmail, MessageText, UserTable_UserID) VALUES (?, ?, CURDATE(), ?, ?, ?)";
         
        if($stmt = mysqli_prepare($database, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issii", $param_user_id, $param_username, $param_email, $param_message_text, $param_user_id);
            
            // Set parameters
            $param_user_id = $_SESSION["userID"];
            $param_username = $_SESSION["username"];
            $param_email = $_POST["email"];
            $param_message_text = $message_text;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Refresh the page to show the new message
                header("location: messages.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($database);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Submit a new Message</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $_SESSION["username"]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group <?php echo (!empty($message_text_err)) ? 'has-error' : ''; ?>">
                    <label>Message</label>
                    <textarea name="message_text" class="form-control"><?php echo $message_text; ?></textarea>
                    <span class="help-block"><?php echo $message_text_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
        </div>
    </div>
    
    <h2 class="mt-5 text-center">Your Messages</h2>
    <!-- Display list of messages for the current user -->
    <?php
    // Prepare a select statement
    $sql = "SELECT MessageID, MessageDate, MessageEmail, MessageText FROM MessageTabel WHERE UserID = ?";
    
    if($stmt = mysqli_prepare($database, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_user_id);
        
        // Set parameters
        $param_user_id = $_SESSION["userID"];
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Store result
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) > 0){
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $message_id, $message_date, $message_email, $message_text);
                
                // Fetch records
                while(mysqli_stmt_fetch($stmt)){
                    echo "<div class='border p-3 mt-3'>";
                    echo "<p>Date: " . $message_date . "</p>";
                    echo "<p>Email: " . $message_email . "</p>";
                    echo "<p>Message: " . $message_text . "</p>";
                    echo "</div>";
                }
            } else{
                echo "<p class='text-center'>No messages found.</p>";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
    ?>
</div>

<?php include 'footer.php'; ?>
</body>
</html>