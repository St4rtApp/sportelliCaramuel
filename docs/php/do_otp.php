<?php

session_start();
require "connection.php";
$data = [];

//se l'utente clicca il bottone per la verifica della mail

if(isset($_POST['otp_send'])){

    $_SESSION['info']="";
    $isint=$_POST['otp'];

    //verifico che l'input sia un int

    if(is_numeric($isint) and $isint !== 0){
        $otp_code= $connessione->real_escape_string($_POST['otp']);
    }else{
        $data['errors']['otp-error']="codice errato";
    }

    //verifico il codice

    if(!array_key_exists('errors', $data)){
        $mail=$_SESSION['email'];
        $check_code= "SELECT * FROM users WHERE code= '$otp_code' AND email='$mail'";

        if($result = $connessione->query($check_code)){
    
            if($result->num_rows > 0){

                //verifico l'utente

                $fetch_data = $result->fetch_assoc();
                $fetch_code = $fetch_data['code'];
                $email= $fetch_data['email'];
                $pswd = $fetch_data['password'];
                $code = 0;
                $status = "verified";
                $update_otp = "UPDATE users SET code = '$code', status = '$status' WHERE code = '$fetch_code'";
                
                if($update_res = $connessione->query($update_otp)){
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $pswd;
                    $data['verified'] = true;
                    exit(); 
                }else{
                    $data['errors']['otp-error'] = "errore di autenticazione";
                }       
            }else{
                $data['errors']['otp-error']="codice errato";
            }
        }else{
            $data['errors']['db-error']="errore del database";
        }
    }
}

//se l'utente resetta otp

if(isset($_POST['reset_otp'])){

    //verifico otp

    $_SESSION['info']="";
    $otp_code= $connessione->real_escape_string($_POST['r_otp']);
    $check_code="SELECT * FROM users WHERE code='$otp_code'";
    $code_res=$connessione->query($check_code);
    if($code_res->num_rows > 0){

        //invio al modulo di cambio password

        $fetch_data= $code_res->fetch_assoc();
        $email=$fetch_data['email'];
        $_SESSION['email']=$email;
        $info= "Inserire una nuova password";
        $_SESSION['info']=$info;
        header('location:  ../new-pswd.php');
        exit();

    }else{
        $data['errors']['otp-error'] = "Codice errato";
    }
}

echo json_encode($data);

?>