<?php

session_start();
include '../run.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new users();
$user->open($_SESSION['userID']);
$gameName = utils::getURLParam($_POST, 'gameName');

$game = new game(); 

if($game->creatGame($gameName, $user->userID)){

header('location:../home.php');
}else
{
    die; 'something went wrong';
}
?>