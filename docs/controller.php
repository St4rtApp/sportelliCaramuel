<?php

session_start();
require "connection.php";
$errors= array();

//Se l'utente clicca registrati

if(isset($_POST["register"])){
    $name = $connessione->real_escape_string($_POST["nome"]);
    $surname = $connessione->real_escape_string($_POST["cognome"]);
    $email = $connessione->real_escape_string($_POST["email"]);
    $pswd = $connessione->real_escape_string($_POST["password"]);
    $cpswd = $connessione->real_escape_string($_POST["cpassword"]);
    $anno = $connessione->real_escape_string($_POST["anno"]);
    $corso = $connessione->real_escape_string($_POST["corso"]);

    //verifico la password

    if($pswd !== $cpswd){
        $errors['password']= "Le password non corrispondono";
    }

    //controllo se la email esiste già

    $email_check="SELECT * FROM users WHERE email='$email' ";
    if($result = $connessione->query($email_check)){
        if($result->num_rows > 0){
            $errors['email']= "La mail inserita esiste già";
        }
    }else{
        $errors['db-error']="errore del database";
    }

    //genero verification code per la mail

    if(count($errors) === 0){
        $encpass= password_hash($pswd, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status='notverified';
        $query="INSERT INTO users (name, surname, email, anno, corso, password, code, status)
                values('$name', '$surname', '$email','$anno', '$corso', '$encpass', '$code', '$status')";

        //invio della mail

        if($data_check = $connessione->query($query)){
           $subject = "Email Verification Code";
           $message = "codice di verifica: $code";
           $sender = "From: mail@caramuelroncalli.it";
           if(mail($email,$subject,$message,$sender)){
               $info="Ti abbiamo mandato via email il codice di verifica";
               $_SESSION['info'] = $info;
               $_SESSION['email'] = $email;
               $_SESSION['password'] = $pswd;
               header('location: otp.php');
               exit();
           }else{
               $errors['otp-error'] = "errore nell'invio del codice di verifica";
           } 
        }else{
            $errors['db-error']="errore del database";
        }
        

    }

}




//se l'utente clicca il bottone per la verifica della mail

if(isset($_POST['check'])){
    $_SESSION['info']="";
    $otp_code= $connessione->real_escape_string($_POST['otp']);
    $check_code= "SELECT * FROM users WHERE code= '$otp_code'";

    //verifico il codice

    if($result = $connessione->query($check_code)){
        if($result->num_rows()>0){

            //verifico l'utente

            $fetch_data = $result->fetch_assoc();
            $fetch_code = $fetch_data['code'];
            $email= $fetch_data['email'];
            $code = 0;
            $status = "verified";
            $update_otp = "UPDATE users SET code = '$code', status = '$status' WHERE code = '$fetch_code'";
            $update_res = $connessione->query($update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: index.php');
                exit(); 
            }else{
                $errors['otp-error'] = "errore di autenticazione";
            }
        }else{
            $errors['otp-error']="codice errato";
        }
    }else{
        $errors['db-error']="errore del database";
    }
}





?>