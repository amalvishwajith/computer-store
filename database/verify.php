<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$otp = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if otp is empty
    if(empty(trim($_POST["otp"]))){
        $otp_err = "Please enter otp.";
    } else{
        $otp = trim($_POST["otp"]);
    }

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Validate credentials
    if(empty($otp_err)&& empty($email_err)){
        // Prepare a select statement
        $sql = "SELECT otp,email FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if otp exists, if yes then verify email
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables


                    mysqli_stmt_bind_result($stmt,$otpp,$emaill);
                    if(mysqli_stmt_fetch($stmt)){
                        

                    //AV====================================================================

                            if($otpp==$otp && $emaill==$email){

                                $sql = "UPDATE users SET verification=1 WHERE email= (?)";
         
                                if($stmt = mysqli_prepare($link, $sql)){
                                    // Bind variables to the prepared statement as parameters

                                    mysqli_stmt_bind_param($stmt, "s", $emailll);
                                        $emailll = $email;
                                         
                                        // Attempt to execute the prepared statement
                                        if(mysqli_stmt_execute($stmt)){
                                            // Redirect to login page
                                            header("location: login.php");
                                        } else{
                                            echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        // Close statement
                                        mysqli_stmt_close($stmt);
                                }



                                header("location: login.php");
                            } else{
                                // email is not valid, display a generic error message
                                $login_err = "Invalid otp or email.";
                            }

                    //AV====================================================================


                    }
                } else{
                    // otp doesn't exist, display a generic error message
                    $login_err = "Invalid otp or email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horizon Computers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-12 d-flex justify-content-center">

                    <h2 style="padding: 80px;">Horizon Computers Verification</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                    <p>Please fill with given OTP to Active the Account.</p>
                            <?php 
                        if(!empty($login_err)){
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }        
                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label>otp</label>
                                <input type="otp" name="otp" class="form-control <?php echo (!empty($otp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $otp; ?>">
                                <span class="invalid-feedback"><?php echo $otp_err; ?></span>
                            </div>    
                            <div class="form-group">
                                <label>email</label>
                                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Verify">
                            </div>
                            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                        </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row"></div>
        <div class="row">
            <div class="col-12">
                <br><br><br><br><br><br><br><br><br><br>
                    <a href="../index.php" class="btn btn-success"><i class="bi bi-arrow-left"></i>         Back to Site</a>
                <br><br><br><br><br><br><br><br><br>
            </div>
        </div>

        <?php include '../preset/footer.php';?>

    </div>
</body>
</html>