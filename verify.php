<?php
if ($_GET){
	$email = htmlspecialchars($_GET["registeremail"]);
	$hash = htmlspecialchars($_GET["hashverify"]);
	include("db.php");
	include("userclass.php");
    $error_msg_1 = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Form error!</strong>';
    $error_msg_2 = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	$db = getDB();
		$st = $db->prepare("SELECT verify_hash FROM users WHERE `email`=:email;"); 
		$st->bindParam(':email',$email);
		$st->execute();
		$selec_datos = $st->fetch(PDO::FETCH_NUM);
		$hash_server= $selec_datos[0];
	sleep(1);
	$db = getDB();
		$st = $db->prepare("SELECT verify FROM users WHERE `email`=:email;"); 
		$st->bindParam(':email',$email);
		$st->execute();
		$select_datos = $st->fetch(PDO::FETCH_NUM);
		$verificacion= $select_datos[0];
	if($verificacion == 0){
		if($hash == $hash_server){
			$db = getDB();
			$st = $db->prepare("UPDATE users SET `verify`=1 WHERE `email`=:email;"); 
			$st->bindParam(':email',$email);
			$st->execute();
			usleep(1000);
			header("Location: signin.php");
		}
		else{
            $error = $error_msg_1.' No se ha podido verificar el hash autom&aacuteticamente, por favor, p&oacutengase en contacto con nosotros en <b>mycloudinstance.contact@gmail.com</b>'.$error_msg_2;
			sleep(1);
		}
		}
	else{
        $error = $error_msg_1.' Esta cuenta ya ha sido activada, inicie sesi&oacuten en <a href="rocho.duckdns.org/MyCloudInstance/signup.php">este enlace</a>.'.$error_msg_2;
		
	}
}
else{	
	sleep(5);
	header("Location: signup.php");
	}
?>