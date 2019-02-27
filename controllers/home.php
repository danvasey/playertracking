<?php
session_start();
include '../run.php';
include 'header.php';


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
  <select name="gameName">';


/*
// foreach loops take an array and cycle through it until the end; 
    
//  example $array  = array('Dan'=>'Vasey','Kevin'=>'Vasey'); 
            $array_1 = array('red','blue','pink'); 
//
        foreach($array as $key=>$value){
        echo $key . ' - ' $value . '<br>';  
        }
         ***OUTPUT***
            dan - Vasey
            Kevin - Vasey
          ***END OUTPUT ***  
       AND 
        foreach($array_1 as $a=>$b){
            echo $a . '-'.$b.'<br>';
        }
            ****OUTPUT****
                0 - red
                1 - blue
                2 - pink 
            ****END OUTPUT****
//
*/

    foreach($gameList->gameList as $key=>$value){
        echo '<option value="'.$value['gameName'].'">'.$value['gameName'].'</option>';            
    }


echo '</select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Join Game</button>
</form>
</div>


</div>';
