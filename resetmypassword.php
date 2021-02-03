<?php
include_once('db.php');

if (isset($_GET['userid'])) {
    echo'<html lang="en">';
    echo'<head>';
    echo'<meta charset="utf-8" />';
    echo'<meta name="viewport" content="width=device-width, initial-scale=0.75" />';
    echo'<link rel="icon" href="./sources/ico.png" />';
    echo'<title>Login</title>';
    echo '<!-- Bootstrap core CSS -->
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
    <link href="./sources/css/signin.css" rel="stylesheet" />';
    echo '</head>';
    echo '<body class="text-center">';
    if (isset($_GET['mdcode'])) {
        $id = $_GET['userid'];
        $code = $_GET['mdcode'];
        $id= base64_decode($id);
        // Database Query for users
        $db = getDB();
        $st = $db->prepare("SELECT * FROM users WHERE (id=:id AND recovery=:code)");
        $st->bindParam("code", $code, PDO::PARAM_STR);
        $st->bindParam("id", $id, PDO::PARAM_STR);
        $st->execute();
        $count=$st->rowCount();
        $select_data = $st->fetch(PDO::FETCH_NUM);
        if (!empty($select_data)) {
            if(isset($_POST['submit'])) {
                $password= $_POST['password'];
                $recovery_new = md5(rand(1,99999));
                $stmt = $db->prepare("UPDATE users SET password=:password, recovery=:recovery_new WHERE (id=:id AND recovery=:code)");
                $stmt->bindParam("id", $id, PDO::PARAM_STR) ; //email bind
                $stmt->bindParam("code", $code, PDO::PARAM_STR) ; //code bind
                $hash_password= hash('sha256', $password); //Password encryption
                $stmt->bindParam("password", $hash_password, PDO::PARAM_STR) ; //code bind
                $stmt->bindParam("recovery_new", $recovery_new, PDO::PARAM_STR) ;
                $stmt->execute();
                usleep(5000);
                header("Location: signin.php");
            }
            echo '
            <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.75" />
    <link rel="icon" href="./static/img/ico.png" />
    <title>Reset Password </title>
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
            
            <form class="form-signin" method="POST" name="resetpass">
              <img class="mb-4" src="./static/img/ico.png" alt="" width="72" height="72" />
              <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
              <label for="inputEmail" class="sr-only">Insert new password</label>
              <input type="password" id="inputNewpass" class="form-control" placeholder="New password" name="password" required autofocus="true"/>
              <input
                type="submit" value="Change Password" name="submit" class="btn btn-lg btn-primary btn-block">
              </input>
              <div class="btn-group btn-block">
                <a class="btn btn-lg btn-warning btn-block" href="signin.php">Back</a>
              </div>
              <!-- <p class="mt-5 mb-3 text-muted">&copy; 2021</p> -->
            </form>';
        
        } else {
		      header("Location: signin.php");
        }
    echo '</body>';
    echo '</html>';
    } else {
        header("Location: signin.php");
    }
}