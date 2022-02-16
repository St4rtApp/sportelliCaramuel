<?php

session_start();
require "connection.php";
$data = [];

if(isset($_POST["login"])){
    //ricevo mail e password

    $email= $connessione->real_escape_string($_POST['email']);
    $pswd= $connessione->real_escape_string($_POST['password']);

    //controllo se la mail esiste nel db

    $check_email = "SELECT * FROM users WHERE email = '$email' ";
    if($result = $connessione->query($check_email)){
        if($result->num_rows > 0 ){

            //controllo la password

            $fetch = $result->fetch_assoc();
            $fetch_pass = $fetch['password'];
            if(password_verify($pswd,$fetch_pass)){

                //controllo che l'utente sia verificato

                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == "verified"){
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $pswd;
                    header('location: ../index.php');
                }else{
                    $info = "Sembra che tu non abbia ancora verificato la mail - $email";
                    $_SESSION['info'] = $info;
                    header('location: ../otp.html');
                }
            }else{
            $data['errors']['email'] = "Email o password errate.\n";
        }
        }else{
            $data['errors']['email'] = "Sembra che tu non sia registrato, <a href=' register.html' class='text-blue-500'>registrati qui</a>.\n";
        }
    }else{
        $data['errors']['dberror']="errore del database";
    }
}
    
echo json_encode($data);
?>