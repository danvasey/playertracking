<?php
session_start();
include '../run.php';
include 'header.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new users();
        
$user->open($_SESSION['userID']);

/*
 *  GET list of games
 */

/*
 *  Get list 
 */




echo '<div class="header">';

echo 'Hello ' . $user->name;



echo '</div><div class="header">
    <div style="float:left;">
<form class="form-inline">
  <div class="form-group mb-2">
    <label for="newGame" class="sr-only">New Game</label>
    <input type="text" readonly class="form-control-plaintext" id="newGame" value="New Game">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="text" class="form-control" id="newGame" placeholder="New Game">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Create Game</button>
</form></div>

<div style="float:left;padding-left:50px;">
<form class="form-inline" method="get" action="?">

  <div class="form-group mb-2">
    <label for="joinGame" class="sr-only">New Game</label>
    <input type="text" readonly class="form-control-plaintext" id="joinGame" value="Join Game">
  </div>
  <div class="form-group mx-sm-3 mb-2">
  <select name="joinGame"><option value="First Game">First Game</option></select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Join Game</button>
</form>
</div>


</div>';

if(isset($_GET['joinGame'])){
      
    echo $_GET['joinGame'];
}