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
 *  GET list of games; 
 * 
 */

$gameList = new gameList(true);

echo '<div class="header">';
echo 'Hello ' . $user->name;



echo '</div><div class="header">
    <div style="float:left;">
<form class="form-inline" action="../handlers/createGame.php" method="post">
  <div class="form-group mb-2">
    <label for="newGame" class="sr-only">New Game</label>
    <input type="text" readonly class="form-control-plaintext" id="newGame" value="New Game">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">newGame</label>
    <input type="text" class="form-control" id="gameName" name="gameName" placeholder="New Game">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Create Game</button>
</form></div>

<div style="float:left;padding-left:50px;">
<form class="form-inline" method="get" action="../controllers/game.php">

  <div class="form-group mb-2">
    <label for="joinGame" class="sr-only">New Game</label>
    <input type="text" readonly class="form-control-plaintext" id="joinGame" value="Join Game">
  </div>
  <div class="form-group mx-sm-3 mb-2">
  <select name="joinGame">';

    foreach($gameList->gameList as $key=>$value){
        echo '<option value="'.$value['gameName'].'">'.$value['gameName'].'</option>';            
    }


echo '</select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Join Game</button>
</form>
</div>


</div>';
