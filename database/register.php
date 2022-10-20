<?php
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = $Propic = $confirm_password = $target_file = $fname= $lname = "";
$fname_err = $lname_err = $Propic_err = $email_err = $password_err = $confirm_password_err = "";
$sql2="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT verification FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $verification);
                mysqli_stmt_fetch($stmt);
                if((mysqli_stmt_num_rows($stmt) == 1)  && ($verification==1)){
                    $email_err = "This email is already taken.";
                }else if(mysqli_stmt_num_rows($stmt) == 1){
                    $sql2 = "UPDATE users SET FirstName=?,Propic=?,LastName=?,password=?,otp=? WHERE email= ?";
                    $email = trim($_POST["email"]);
                }else{
                    $sql2 = "INSERT INTO users (FirstName,Propic,LastName,password,otp,email) VALUES (?,?,?,?,?,?)";
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "11111111Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate First Name
    if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter the first name.";     
    } else{
        $fname = trim($_POST["fname"]);
    }

    // Validate Last Name
    if(empty(trim($_POST["lname"]))){
        $lname_err = "Please enter the last name.";     
    } else{
        $lname = trim($_POST["lname"]);
    }

    // Validate Propic============================================================
    try{

        $fileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
        if($fileType != "png") {
            //echo "Sorry, only PNG files are allowed.";
            $Propic_err = "1";
        }

        $Propic_err = "1";
        $target_file = "photo2/avatar.png";     

    }catch(Exception $e){
        echo "noimage";
    }

    // Validate Propic============================================================
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($fname_err) && empty($lname_err)){
        
        // Prepare an insert statement
        //$sql2 = "INSERT INTO users (email,password,otp) VALUES (?,?,?)";

        if($stmt = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_fname,$param_Propic,$param_lname,$param_password,$OTP,$param_email);
            
            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);// Creates a password hash
            $OTP=rand(100000,999999);
            $param_Propic = "photo2/avatar.jpg";
            //echo ($param_email);
            //echo ($param_password);
            //echo ($OTP);
            //AV===============================================================

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                        // Move file to folder
                        try {

                            $sql = "SELECT ID FROM users WHERE email = '$email'";
                            $result = mysqli_query($link, $sql);
                            echo "not".mysqli_error($link);
                            $row = mysqli_fetch_assoc($result);
                            $imageup = $row['ID'];

                            $target_file = '../photo2/'.$imageup.'.jpg';
                            $target_file2 = 'photo2/'.$imageup.'.jpg';
       

                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                            //=====================================================================================================================================
                                $sql = "UPDATE users SET Propic='$target_file2' WHERE email= '$email'";

                                if(mysqli_query($link, $sql)) {
                                    echo "ok";
                                }
                                else{
                                    echo "not".mysqli_error($link);
                                }
                            //=====================================================================================================================================

                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                        catch(Exception $e) {
                        }

                // Redirect to login page
   
                // $to = $email;
                // $subject = "Email configaration";
                // $message = "Your OTP is : ";
                // $message .= strval($OTP);
                // echo ("ok");
                // $retval = mail ($to,$subject,$message);

                require '../mail/Exception.php';
                require '../mail/PHPMailer.php';
                require '../mail/SMTP.php';

                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->isSMTP(); 
                $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
                $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
                $mail->Port = 587; // TLS only
                $mail->SMTPSecure = 'tls'; // ssl is deprecated
                $mail->SMTPAuth = true;
                $mail->Username = 'horizoncomputerslk@gmail.com'; // email
                $mail->Password = 'HORIzon1234'; // password
                $mail->setFrom('horizoncomputerslk@gmail.com', 'Horizon Computers'); // From email and name
                $mail->addAddress("$email", 'Verification'); // to email and name
                $mail->Subject = 'Account Verification';
                $mail->msgHTML("Your OTP is : $OTP"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
                // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
                $mail->SMTPOptions = array(
                                    'ssl' => array(
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true
                                    )
                                );
                if(!$mail->send()){
                    echo '<script>alert("invalid email address...")</script>';
                }else{
                    echo '<script>alert("verification code sent successfully...")</script>';
                    echo "Message sent!";
                    header("location: verify.php");
                }


                
            } else{
                //echo mysqli_error(mysqli_stmt_execute($stmt));
                echo "22222222Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);

            //AV===============================================================================

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

                    <h2 style="padding: 80px;">Horizon Computers Sign Up</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                    <p>Please fill this form to create an account.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                            <span class="invalid-feedback"><?php echo $fname_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">
                            <span class="invalid-feedback"><?php echo $lname_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Image</label>
                                    <input type="file" class="form-control-file" name="image" onchange="readURL(this);">
                                </div>
                                <div class="form-group col-md-3">
                                    <img id="preview" src="http://placehold.it/180" alt="your image" style="width: 200px;">
                                </div>
                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                document.getElementById("preview").src = e.target.result;
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                        </div>
                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row"></div>
        <div class="row">
            <div class="col-12">
                <br><br><br><br><br><br>
                    <a href="../index.php" class="btn btn-success"><i class="bi bi-arrow-left"></i>         Back to Site</a>
                <br><br><br><br><br><br><br><br>
            </div>
        </div>

        <?php include '../preset/footer.php';?>

    </div>   
</body>
</html>