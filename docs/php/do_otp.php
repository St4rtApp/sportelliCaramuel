<?php

session_start();
require "connection.php";
$data = [];

//se l'utente clicca il bottone per la verifica della mail

if(isset($_POST['otp_send'])){

    $_SESSION['info']="";
    $isint=$_POST['otp'];

    //verifico che l'input sia un int

    if(is_numeric($isint)){
        $otp_code= $connessione->real_escape_string($_POST['otp']);
    }else{
        $data['errors']['otp-error']="codice errato";
    }

    //verifico il codice

    if(!array_key_exists('errors', $data)){

        $check_code= "SELECT * FROM users WHERE code= '$otp_code'";

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
                    header('location: index.php');
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

echo json_encode($data);

?>