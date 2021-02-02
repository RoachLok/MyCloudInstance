<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.75" />
    <link rel="icon" href="./static/img/ico.png" />
    <title>Login</title>

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
    <!-- Stylesheet -->
    <link href="./static/css/signin.css" rel="stylesheet" />
  </head>

  <body class="text-center">
    <?php
        
        require('db.php');
        // When form submitted, check and create user session.
        if (isset($_POST['username'])) {
        $username = stripslashes($_POST['username']);    // removes backslashes  
        $password = stripslashes($_POST['password']);
            $db1 = getDB();
            $hash_password= hash('sha256', $password); //Password encryption 
            $stmt1 = $db1->prepare("SELECT id FROM users WHERE username=:username AND password=:hash_password AND verify=1"); 
            $stmt1->bindParam("username", $username,PDO::PARAM_STR) ;
            $stmt1->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
            $stmt1->execute();
            $count=$stmt1->rowCount();
            $data=$stmt1->fetch(PDO::FETCH_OBJ);
            if($count) {
                session_start();
                $_SESSION['username']=$username; // Storing user session value
                $_SESSION['uid']=$data->id; // Storing id session value
                usleep(3000);
                header('Location:'.$BASE_URL."index.php");
                exit; //Good practice after every header
            } else {
              echo "<div class='form'>
                      <h3>Incorrect Username/password or email not verified yet.</h3><br/>
                      <p class='link'>Click here to <a href='signin.php'>Login</a> again.</p>
                      </div>";
            }
            
        } else {
            ?>
            <form class="form-signin" method="POST" name="login">
              <img class="mb-4" src="./static/img/ico.png" alt="" width="72" height="72" />
              <h1 class="h3 mb-3 font-weight-normal">Users Login</h1>
              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus="true"/>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required/>
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me" /> Remember me
                </label>
              </div>
              <p> <a href="resetpassword.php">Forgot Password?</a></p>
              
              <input
                type="submit" value="Login" name="submit" class="btn btn-lg btn-primary btn-block">
              </input>
              <div class="btn-group btn-block">
                <a class="btn btn-lg btn-secondary btn-block" style="background-color: #07518f !important; min-width: 50%;" href="signup.php">Sign-up</a>
                <a class="btn btn-lg btn-warning btn-block" style="max-width: 50%;" href="index.html">Back</a>
              </div>
              <!-- <p class="mt-5 mb-3 text-muted">&copy; 2021</p> -->
            </form>
    <?php
        }
    ?>
  </body>
</html>
