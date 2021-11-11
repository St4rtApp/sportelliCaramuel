<?php

session_start();
require "connection.php";
$errors= array();

//Se l'utente clicca registrati

if(isset($_POST["register"])){
    $name = $connessione->mysqli_real_escape_string($_POST["nome"]);
    $surname = $connessione->mysqli_real_escape_string($_POST["cognome"]);
    $mail = $connessione->mysqli_real_escape_string($_POST["email"]);
    $pswd = $connessione->mysqli_real_escape_string($_POST["password"]);
    $cpswd = $connessione->mysqli_real_escape_string($_POST["cpassword"]);
    $anno = $connessione->mysqli_real_escape_string($_POST["anno"]);
    $corso = $connessione->mysqli_real_escape_string($_POST["corso"]);

    //verifico la password

    if($pswd !== $cpswd){
        $errors['password']= "Le password non corrispondono";
    }

    //controllo se la email esiste già

    $email_check="SELECT * FROM users WHERE email='$email' ";
    if($connessione->query($email_check)){
        if($connessione->num_rows()>0){
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
        $query="INSERT INTO users (name, email, anno, corso, password, code, status)
                values('$name','$email','$anno', '$corso', '$encpass', '$code', '$status')";

        //invio della mail

        if($data_check = $connessione->query($query)){
           $subject = "Email Verification Code";
           $message = "codice di verifica: $code";
           $sender = "From: mail@caramuelroncalli.it";
           if(mail($mail,$subject,$message,$sender)){
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
    $otp_code= $connessione->mysqli_real_escape_string($_POST['otp']);
    $check_code= "SELECT * FROM users WHERE code= '$otp_code'";
    if($connessione->query($check_code)){
        if($connessione->num_rows()>0){
            
        }
    }else{
        $errors['db-error']="errore del database";
    }
}


?>