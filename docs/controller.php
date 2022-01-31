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
        $errors['password']= "Le password non corrispondono.\n";
    }
    if(strlen($pswd) < 9){
        $errors['password']= "La password deve essere di almeno 9 caratteri.\n";
    }

    $is_caramuel=explode('@',$email);
    if($is_caramuel[1] != 'caramuelroncalli.it'){
        $errors['email']= "Inserire la mail scolastica";
    }

    //controllo se la email esiste già

    if(count($errors) === 0){
        $email_check="SELECT * FROM users WHERE email='$email' ";
        if($result = $connessione->query($email_check)){
            if($result->num_rows > 0){
                $fetch_check = $result->fetch_assoc();
                $otpcheck=$fetch_check['status'];
                if($otpcheck == 'notverified'){
                    $errors['email']= "La mail inserita esiste già, <a href='otp.php' class='text-blue-500'>verificala qui</a>.\n";
                }else{
                    $errors['email']= "La mail inserita esiste già.\n";
                }
            }
        }else{
            $errors['db-error']="errore del database.\n";
        }   
    }

    //formatto anno e corso

    if($anno == 'biennio'){
        $corso == 'itis'? $type=1:$type=2;
    }else{
        $corso == 'itis'? $type=3:$type=4;
    }

    //genero verification code per la mail
    
    if(count($errors) === 0){
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

if(isset($_POST['otp_send'])){

    $_SESSION['info']="";
    $isint=$_POST['otp'];

    //verifico che l'input sia un int

    if(is_numeric($isint)){
        $otp_code= $connessione->real_escape_string($_POST['otp']);
    }else{
        $errors['otp-error']="codice errato";
    }

    //verifico il codice

    if(count($errors) === 0){

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
                    $errors['otp-error'] = "errore di autenticazione";
                }       
            }else{
                $errors['otp-error']="codice errato";
            }
        }else{
            $errors['db-error']="errore del database";
        }
    }
}








//se l'utente clicca il bottone di login

if(isset($_POST['login'])){
    
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
                    header('location: index.php');
                }else{
                    $info = "Sembra che tu non abbia ancora verificato la mail - $email";
                    $_SESSION['info'] = $info;
                    header('location:otp.php');
                }
            }else{
            $errors['email'] = "Email o password errate.\n";
        }
        }else{
            $errors['email'] = "Sembra che tu non sia registrato, <a href='register.php' class='text-blue-500'>registrati qui</a>.\n";
        }
    }else{
        $errors['db-error']="errore del database";
    }

}







//se l'utente dimentica la password

if(isset($_POST['forgot-pswd'])){

    //controllo la mail se esiste

    $_SESSION['info'] = "";
    $email = $connessione->real_escape_string($_POST['email']);
    $check_email = "SELECT * FROM users WHERE email='$email' ";
    $result = $connessione->query($check_email);

    if($result->num_rows() > 0){

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
               header('location: reset-otp.php');
               exit();

           }else{
               $errors['otp-error'] = "errore nell'invio del codice di verifica.\n";
           }    
        }else{
            $errors['db-error']="errore del database";
        }
    }else{
        $errors['email'] = "Questo indirizzo email non esiste!.\n";
    }

}








//se l'utente resetta otp

if(isset($_POST['check-reset-otp'])){

    //verifico otp

    $_SESSION['info']="";
    $otp_code= $connessione->real_escape_string($_POST['otp']);
    $check_code="SELECT * FROM users WHERE code='$otp_code'";
    $code_res=$connessione->query($check_code);
    if($code_res->num_rows() > 0){

        //invio al modulo di cambio password

        $fetch_data= $connessione->fetch_assoc();
        $email=$fetch_data['email'];
        $_SESSION['email']=$email;
        $info= "Inserire una nuova password";
        $_SESSION['info']=$info;
        header('location:new-pswd.php');
        exit();

    }else{
        $errors['otp-error'] = "Codice errato";
    }
}







//se l'utente inserisce la nuova password

if(isset($_POST['change-password'])){
    $_SESSION['info']="";
    $pswd = $connessione->real_escape_string($_POST["password"]);
    $cpswd = $connessione->real_escape_string($_POST["cpassword"]);

    //verifico la password

    if($pswd !== $cpswd){
        $errors['password']= "Le password non corrispondono.\n";
    }elseif(strlen($pswd) < 9){
        $errors['password']= "La password deve essere di almeno 9 caratteri.\n";
    }else{

        //cambio la password nel db

        $code=0;
        $email=$_SESSION['email'];
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pswd= "UPDATE users SET code='$code', password='$encpass' WHERE email='$email' ";
        $run_update= $connessione->query($update_pswd);
        if($run_update){
            $info="Password cambiata con successo";
            $_SESSION['info']=$info;
            header('location:login.php');
            exit();
        }else{
            $errors['db-error']="errore del database";
        }
    }
}


?>