<?php
class userClass{
/* User Login */
    public function userLogin($usernameEmail,$password){
        try{
            $db = getDB();
            $hash_password= hash('sha256', $password); //Password encryption 
            $stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND password=:hash_password"); 
            $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
            $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if($count){
                $_SESSION['id']=$data->id; // Storing user session value
                return true;
            }
            else{
                return false;
            } 
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

/* User Registration */
    public function userRegistration($username,$password,$email,$name,$hash){
        try{
            $db = getDB();
            $st = $db->prepare("SELECT uid FROM users WHERE username=:username OR email=:email"); 
            $st->bindParam("username", $username,PDO::PARAM_STR);
            $st->bindParam("email", $email,PDO::PARAM_STR);
            $st->execute();
            $count=$st->rowCount();
            if($count<1){
                $stmt = $db->prepare("INSERT INTO users(username,email,password,birthday,gender) VALUES (:username,:email,:password,:birthday,:gender)");
                $stmt->bindParam("username", $username,PDO::PARAM_STR) ; //username bind
                $stmt->bindParam("email", $email,PDO::PARAM_STR) ; //email bind
                $hash_password= hash('sha256', $password); //Password encryption
                $stmt->bindParam("password", $hash_password,PDO::PARAM_STR) ; //password bind
                $stmt->bindParam("birthday", $birthday,PDO::PARAM_STR) ; //birthday bind
                $stmt->bindParam("gender", $gender,PDO::PARAM_STR) ; //gender bind
                $stmt->execute();
                $uid=$db->lastInsertId(); // Last inserted row id
                $db = null;
                if($count) {
                    $_SESSION['username']=$username; // Storing user session value
                    //$_SESSION['id']=$data->uid; // Storing id session value
                    header("Location: dashboard.php");
                    exit; //Good practice after every header
                } else {
                    echo "<div class='form'>
                    <h3>Incorrect Username/password.</h3><br/>
                    <p class='link'>Click here to <a href='signin.php'>Login</a> again.</p>
                    </div>";
                }
                return true;
            }else{
                $db = null;
                return false;
            }
    
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }
    }

/* User Details */
    public function userDetails($uid){
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT username FROM users WHERE id=:uid"); 
            $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}
?>