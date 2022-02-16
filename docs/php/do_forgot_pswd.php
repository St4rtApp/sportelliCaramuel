<?php

session_start();
require "connection.php";
$data = [];

//se l'utente clicca dimentica la password

if(isset($_POST['forgot_pswd'])){

    //controllo la mail se esiste

    $_SESSION['info'] = "";
    $email = $connessione->real_escape_string($_POST['email']);
    $check_email = "SELECT * FROM users WHERE email='$email' ";
    $result = $connessione->query($check_email);

    if($result->num_rows > 0){

        //genero codice otp

        $code=rand(999999, 111111);
        $insert_code= "UPDATE users SET code= '$code' WHERE email='$email' ";
        $result = $connessione->query($insert_code);

        //invio la mail

        if($result){
           $subject = "Password reset Code";
           $message = "codice di verifica: $code";
           $sender = "From: verifica@caramuelroncalli.it";

           if(mail($email,$subject,$message,$sender)){
               $info="Ti abbiamo mandato via email il codice di verifica per il reset della password";
               $_SESSION['info'] = $info;
               $_SESSION['email'] = $email;
               header('location: ../reset-otp.html');
               exit();

           }else{
               $data['errors']['otp-error'] = "errore nell'invio del codice di verifica.\n";
           }    
        }else{
            $data['errors']['db-error']="errore del database";
        }
    }else{
        $data['errors']['email'] = "Questo indirizzo email non esiste!.\n";
    }

}

//se l'utente inserisce la nuova password

if(isset($_POST['change-password'])){
    $_SESSION['info']="";
    $pswd = $connessione->real_escape_string($_POST["password"]);
    $cpswd = $connessione->real_escape_string($_POST["cpassword"]);

    //verifico la password

    if($pswd !== $cpswd){
        $data['errors']['password']= "Le password non corrispondono.\n";
    }elseif(strlen($pswd) < 9){
        $data['errors']['password']= "La password deve essere di almeno 9 caratteri.\n";
    }else{

        //cambio la password nel db

        $code=0;
        $email=$_SESSION['email'];
        $encpass = password_hash($pswd, PASSWORD_BCRYPT);
        $update_pswd= "UPDATE users SET code='$code', password='$encpass' WHERE email='$email' ";
        $run_update= $connessione->query($update_pswd);
        if($run_update){
            $info="Password cambiata con successo";
            $_SESSION['info']=$info;
            header('location: ../login.html');
            exit();
        }else{
            $data['errors']['db-error']="errore del database";
        }
    }
}

echo json_encode($data);

?>