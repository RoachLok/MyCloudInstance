<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.75">
        <link rel="icon" href="./static/img/ico.png">
        <title>Singup</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <!-- Stylesheet -->
        <link href="./static/css/signup.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" rel="stylesheet">
         <!-- Font Awesome -->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script type='text/javascript'>
            $(function(){
                $('.input-group.date').datepicker({
                    calendarWeeks: true,
                    todayHighlight: true,
                    autoclose: true
                });  
            });

        </script>    
    </head>

    <body class="text-center">
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    require('db.php');
    $error = "";
    $error_msg_1 = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Form error!</strong>';
    $error_msg_2 = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    // When form submitted, insert values into the database.
    if (isset($_POST['username'])) {
        // removes backslashes
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);
        $email    = stripslashes($_POST['email']);
        $passwordconf = stripslashes($_POST['passwordconf']);
        if($password == $passwordconf) {
            if(strlen(trim($username))>1 && strlen(trim($password))>1 && strlen(trim($email))>1 && strlen(trim($passwordconf))>1)  {
                //escapes special characters in a string
                if (isset($_POST['gender'])) {
                    $gender = $_POST['gender'];
                } else{
                    $gender ="not_set";
                }
                if (isset($_POST['birthday'])) {
                    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
                } else{
                    $birthday ="not_set";
                }
                $db = getDB();
                $st = $db->prepare("SELECT id FROM users WHERE username=:username OR email=:email"); 
                $st->bindParam("username", $username,PDO::PARAM_STR);
                $st->bindParam("email", $email,PDO::PARAM_STR);
                $st->execute();
                $count=$st->rowCount();
                if($count<1){
                    $verify_hash= md5(rand(0,9999));
                    $stmt = $db->prepare("INSERT INTO users(username,email,password,birthday,gender,verify,verify_hash) VALUES (:username,:email,:password,:birthday,:gender,1,:verify_hash)");
                    $stmt->bindParam("username", $username,PDO::PARAM_STR) ; //username bind
                    $stmt->bindParam("email", $email,PDO::PARAM_STR) ; //email bind
                    $hash_password= hash('sha256', $password); //Password encryption
                    $stmt->bindParam("password", $hash_password,PDO::PARAM_STR) ; //password bind
                    $stmt->bindParam("birthday", $birthday,PDO::PARAM_STR) ; //birthday bind
                    $stmt->bindParam("gender", $gender,PDO::PARAM_STR) ; //gender bind
                    $stmt->bindParam("verify_hash", $verify_hash,PDO::PARAM_STR) ; //gender bind
                    $stmt->execute();
                    $uid=$db->lastInsertId(); // Last inserted row id
                    $db = null;
                    $error = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>SUCCESS!</strong> You are succesfully registered! Please, check your email and verify your account. 
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
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
                        $mail->Body    = 'http://rocho.duckdns.org/MyCloudInstance/verify.php?registeremail='.$email.'&hashverify='.$verify_hash;

                        $mail->send();
                        
                    } catch(Exception $e){
                        $error = $error_msg_1.' Error, email not sent!'.$error_msg_2;
                    }
                } else{
                    $error = $error_msg_1.' Username or email already registered!'.$error_msg_2;
                }
            } else {
	                $error = $error_msg_1.' Some form fields are empty.'.$error_msg_2;
            }
        } else {
            $error = $error_msg_1.' Passwords don´t match.'.$error_msg_2;
        }
    } else {}
    ?>
            <form class="form-signin" method="POST">
                <img class="mb-4" src="./static/img/ico.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
                <?php echo $error; ?>
                <div class="form-inline">
                    <label class="sr-only" for="username">Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="username" id="username" required placeholder="Create your username">
                    <div class="input-group date">
                        <input type="text" class="form-control" name="birthday" id="birthday" readonly>
                        <span class="input-group-addon">
                            <i class="fas fa-birthday-cake" style="font-size: 28px; margin-left: 0.4em; margin-top: 0.5em;"></i>
                        </span>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text" style="margin-right: 1.5em;">Select your gender</div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="malegender">Male</label>
                        <i class="fas fa-mars" style="font-size: 28px; margin-left: 0.4em; margin-right: 0.5em"></i>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label label class="form-check-label" for="femalegender">Female</label>
                        <i class="fas fa-venus" style="font-size: 28px; margin-left: 0.4em;"></i>
                    </div>
                </div>
                <label for="inputEmail" class="sr-only">Enter email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Enter email address" required autofocus>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword" class="sr-only">Enter Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword2" class="sr-only">Confirm Password</label>
                        <input type="password" id="inputPassword2" name="passwordconf" class="form-control" placeholder="Confirm password" required>
                    </div>  
                </div>
				<input type="checkbox" class="checkbox" required="" style="margin-bottom: 1.5em;">
				<span>I Agree To The Terms & Conditions</span>
				
                <div class="btn-group btn-block">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" style=" min-width: 50%; max-width: 50%;">Sign up</button>
                    <a class="btn btn-lg btn-warning btn-block" href="index.html" style="max-width: 50%;">Back</a>
                </div>
                
                <p>Do you have an Account? <a href="signin.php"> Login Now!</a></p>
                <!-- <p class="mt-5 mb-3 text-muted">&copy; 2021</p> -->
            </form>
    </body>
</html>