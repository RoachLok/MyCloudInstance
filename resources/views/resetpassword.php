<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include_once('db.php');
$sent = false;

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
      // Database Query for users
    $error_msg_1 = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Form error!</strong>';
    $error_msg_2 = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    $db = getDB();
    $st = $db->prepare("SELECT id FROM users WHERE email=:email LIMIT 1"); 
    $st->bindParam("email", $email,PDO::PARAM_STR);
    $st->execute();
    $count=$st->rowCount();
    $select_data = $st->fetch(PDO::FETCH_NUM);
    if(!empty($select_data)) {
        $id = base64_encode($select_data[0]);
        $code = md5(rand(1,99999));
        $stmt = $db->prepare("UPDATE users SET recovery=:code WHERE email=:email");
        $stmt->bindParam("email", $email,PDO::PARAM_STR) ; //email bind
        $stmt->bindParam("code", $code,PDO::PARAM_STR) ; //code bind
        $stmt->execute();
        $mail = new PHPMailer();
        try {
            $mail->SMTPDebug = 0;                   // Enable verbose debug output
            $mail->isSMTP();                        // Set mailer to use SMTP
            $mail->Host       = 'ssl://smtp.gmail.com;';    // Specify main SMTP server
            $mail->SMTPAuth   = true;               // Enable SMTP authentication
            $mail->Username   = 'mycloudinstance.contact@gmail.com';     // SMTP username
            $mail->Password   = '<NoD.js>';         // SMTP password
            $mail->SMTPSecure = 'ssl';              // Enable TLS encryption, 'ssl' also accepted
            $mail->Port       = 465;                // TCP port to connect to
            $mail->setFrom('mycloudinstance.contact@gmail.com');           // Set sender of the mail
            $mail->addAddress($email);           // Add a recipient
            $mail->isHTML(true);
            $mail->Subject = '[Password Recovery] - My Cloud Instance';
            $mail->Body    =  "<p> This email was sent to you because someone requested a password change in your account. <br>
            If you did not request this password change please ignore this message. <br><br>If it was you, click on the link below to continue with the process.<br><br>

            http://rocho.duckdns.org/MyCloudInstance/resetmypassword.php?userid=".$id.'&mdcode='.$code.'</p>';
            $mail->IsHTML(true); 

            $mail->send();

            $error = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>SUCCESS!</strong> Check your inbox for further details. 
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                               $sent = true;
        } catch(Exception $e){
            $error = $error_msg_1.' Email not sent!'.$error_msg_2;
            $sent = true;
        }
    } else {
        if(isset($_POST['submit'])) {
            $error = $error_msg_1.' Email not found.'.$error_msg_2;
            $sent = true;
            }
    } 
} else {
        if(isset($_POST['submit'])) {
            $error = $error_msg_1.' Email not found.'.$error_msg_2;
            $sent = true;
            }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.75" />
    <link rel="icon" href="./static/img/ico.png" />
    <title>Password Reset</title>

    <!-- Bootstrap core CSS -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    />
    <!-- Material Design Bootstrap -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"
      rel="stylesheet"
    />
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Stylesheet -->
    <link href="./static/css/signin.css" rel="stylesheet" />
  </head>
  <body class="text-center">
            <form class="form-signin" method="POST" name="resetpass">
              <img class="mb-4" src="./static/img/ico.png" alt="" width="72" height="72" />
              <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
              <label for="inputEmail" class="sr-only">Insert your email address</label>
              <?php if ($sent) echo $error; ?>
              <input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus="true"/>
              <input
                type="submit" value="Reset Password" name="submit" class="btn btn-lg btn-primary btn-block">
              </input>
              <div class="btn-group btn-block">
                <a class="btn btn-lg btn-warning btn-block" href="signin.php">Back</a>
              </div>
              <!-- <p class="mt-5 mb-3 text-muted">&copy; 2021</p> -->
            </form>
  </body>
</html>
