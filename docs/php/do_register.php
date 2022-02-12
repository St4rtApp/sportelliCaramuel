<?php

session_start();
require "connection.php";
$data = [];

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
        $data['errors']['password']= "Le password non corrispondono.\n";
    }
    if(strlen($pswd) < 9){
        $data['errors']['password']= "La password deve essere di almeno 9 caratteri.\n";
    }

    $is_caramuel=explode('@',$email);
    if($is_caramuel[1] != 'caramuelroncalli.it'){
        $data['errors']['email']= "Inserire la mail scolastica";
    }

    //controllo se la email esiste già

    if(!array_key_exists('errors', $data)){
        $email_check="SELECT * FROM users WHERE email='$email'";
        if($result = $connessione->query($email_check)){
            if($result->num_rows > 0){
                $fetch_check = $result->fetch_assoc();
                $otpcheck=$fetch_check['status'];
                if($otpcheck == 'notverified'){
                    $data['errors']['email']= "La mail inserita esiste già, <a href='otp.php' class='text-blue-500'>verificala qui</a>.\n";
                }else{
                    $data['errors']['email']= "La mail inserita esiste già.\n";
                }
            }
        }else{
            $data['errors']['db-error']="errore del database.\n";
        }   
    }

    //formatto anno e corso

    if($anno == 'biennio'){
        $corso == 'itis'? $type=1:$type=2;
    }else{
        $corso == 'itis'? $type=3:$type=4;
    }

    //genero verification code per la mail
    
    if(!array_key_exists('errors', $data)){
        $encpass= password_hash($pswd, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status='notverified';
        $query="INSERT INTO users (name, surname, email, type, password, code, status)
                values('$name', '$surname', '$email', '$type', '$encpass', '$code', '$status')";

        //invio della mail

        if($data_check = $connessione->query($query)){
           $subject = "Email Verification Code";
           $message = "codice di verifica: $code";
           $sender = "From: verifica@caramuelroncalli.it";
           if(mail($email,$subject,$message,$sender)){
               $data['info']="Ti abbiamo mandato via email il codice di verifica";
               $_SESSION['info'] = $info;
               $_SESSION['email'] = $email;
               $_SESSION['password'] = $pswd;
               header('location: otp.php');
               exit();
           }else{
               $data['errors']['otp-error'] = "errore nell'invio del codice di verifica";
           }
        }else{
            $data['errors']['db-error']="errore del database: " . $connessione->error;
        }
    }
}

echo json_encode($data);

?>