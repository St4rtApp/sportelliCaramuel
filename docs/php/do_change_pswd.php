<?php

session_start();
require "connection.php";
$data = [];

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
            header('location:login.php');
            exit();
        }else{
            $data['errors']['db-error']="errore del database";
        }
    }
}

?>