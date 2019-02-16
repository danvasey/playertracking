<?php
session_start();

if(isset($_POST['username'])){
    $username = utils::getURLParam($_POST, 'username');
    $password = utils::getURLParam($_POST, 'password'); 
    
    $user = new users();
    $login = $user->login($username, $password);
    
    
    
    if(!$login){
        die('Login Failed');}
    
        $_SESSION['userName'] = $user->name;
        $_SESSION['userID'] = $user->id;
        
    header('location:controllers/home.php');

}
