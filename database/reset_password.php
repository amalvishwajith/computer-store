<?php
// Initialize the session
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");

session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
$newform=$email_err=$OTP_err=$confirm_err=$pass_err="";

$newform='
<div class="form-group" >
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
    <span class="invalid-feedback">'.$email_err.'</span>
</div>
';
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["password"])){

        $password = $_POST["password"];
        $confirm = $_POST["confirm"];
        $email = $_POST["email"];
        $OTP = $_POST["OTP"];

        if($confirm!=$password){
            $pass_err="password doesnt match";
            $confirm_err ="password doesnt match";
        }
        if($confirm=="" || $password==""){
            $pass_err="password empty";
            $confirm_err =="password empty";
        }

        $DOTP=null;
        $sql = "SELECT otp FROM users WHERE email= '$email'";
        if($result = mysqli_query($link, $sql)) {
            $Row = mysqli_fetch_assoc($result);
            $DOTP = $Row['otp'];
        }else{
            echo mysqli_error($link);
        }

        if($OTP == $DOTP){
            $OTP_err="";
        }else{
            $OTP_err="OTP doesnt match";
        }
        if($OTP_err=="" && $confirm_err=="" && $pass_err==""){
            $param_password = password_hash($password, PASSWORD_DEFAULT);// Creates a password hash
            $sql = "UPDATE users SET Password='$param_password' WHERE email= '$email'";
    
            if(mysqli_query($link, $sql)) {
                header('Location: login.php?state=done');
                exit;
            }
        }else{
            $a1 = !empty($OTP_err) ? "is-invalid" : "";
            $a2 = !empty($pass_err) ? "is-invalid" : "";
            $a3 = !empty($confirm_err) ? "is-invalid" : "";
            $newform='
            <div class="form-group" >
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="'.$_POST["email"].'" required readonly>
                <span class="invalid-feedback">'.$email_err.'</span>
            </div>
            <div class="form-group">
                <label>OTP</label>
                <input type="text" name="OTP" class="form-control '.$a1.'" value="'.$OTP.'" required>
                <span class="invalid-feedback">'.$OTP_err.'</span>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control '.$a2.'" value="'.$password.'" required>
                <span class="invalid-feedback">'.$pass_err.'</span>
            </div>
            <div class="form-group">
                <label>Password confirm</label>
                <input type="password" name="confirm" class="form-control '.$a3.'" value="'.$confirm.'" required>
                <span class="invalid-feedback">'.$confirm_err.'</span>
            </div>
            ';
        }

    }else{
        $email = $_POST["email"];
        $OTP=rand(100000,999999);

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
        $mail->Subject = 'Account Password Reset';
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
            echo '<script>alert("OTP code sent successfully...")</script>';
            $sql = "UPDATE users SET otp=$OTP WHERE email= '$email'";

            if(mysqli_query($link, $sql)) {
                echo "ok data";
                $newform='
                <div class="form-group" >
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="'.$_POST["email"].'" required readonly>
                    <span class="invalid-feedback">'.$email_err.'</span>
                </div>
                <div class="form-group">
                    <label>OTP</label>
                    <input type="text" name="OTP" class="form-control" required>
                    <span class="invalid-feedback">'.$OTP_err.'</span>
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <span class="invalid-feedback">'.$pass_err.'</span>
                </div>
                <div class="form-group">
                    <label>Password confirm</label>
                    <input type="password" name="confirm" class="form-control" required>
                    <span class="invalid-feedback">'.$confirm_err.'</span>
                </div>
                ';
            }
        }
    }
    
    // Close connection
    mysqli_close($link);
}else{
    $btn = "Send OTP";
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

                    <h2 style="padding: 80px;">Password reset</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                    <p>Please fill with given OTP to reset the <b>password</b></p>
                            <?php 
                        if(!empty($login_err)){
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }        
                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                            <?php echo $newform; ?>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Verify">
                            </div>
                            <p>Don't have an account? <a href="register.php"></a>.</p>
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