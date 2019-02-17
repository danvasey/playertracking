<?php
session_start(); 
include '../run.php'; 
include 'header.php';
$gameName = utils::getURLParam($_GET,'gameName');

$user = new users();        
$user->open($_SESSION['userID']);
$game = new game();

$game->joinGame($user->userID, $gameName);
        



$PL = new playerList; 
$PL->getPlayers($gameName);



echo '<table class="table table-dark"><tr><td>Player ID</td></tr>'; 

foreach($PL->playerList as $key=>$value){
echo '<tr><td onclick="$.get(\'../handlers/playerInfo.php?playerID='.$value['gamePlayerID'].'\',function(data,status){$(\'#body\').html(data);});">'.$value['userName'].'</td></tr>';
}
echo '</table><div id="body"></div>';



?>