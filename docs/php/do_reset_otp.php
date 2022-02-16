<?php

session_start();
require "connection.php";
$data = [];

//se l'utente resetta otp

if(isset($_POST['check_reset_otp'])){

    //verifico otp

    $_SESSION['info']="";
    $otp_code= $connessione->real_escape_string($_POST['otp']);
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