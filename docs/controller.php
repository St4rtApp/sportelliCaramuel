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

    //verifico la password

    if($pswd !== $cpswd){
        $errors['password']= "Le password non corrispondono";
    }

    //controllo se la email esiste già

    $email_check="SELECT * FROM users WHERE email='$email' ";
    if($connessione->query($email_check)==true){
        if($connessione->num_rows()>0){
            $errors['email']= "La mail inserita esiste già";
        }
    }else{
        $errors["query"] ="query error";
    }

    if(count($errors) === 0){
        
    }

}


?>