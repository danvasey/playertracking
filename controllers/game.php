<?php
session_start(); 
include '../run.php'; 
include 'header.php';
$gameName = utils::getURLParam($_GET,'gameName');

$PL = new playerList; 
$PL->getPlayers($gameName);

echo '<table class="table table-dark"><tr><td>Player ID</td></tr>'; 

foreach($PL->playerList as $key=>$value){
echo '<tr><td>'.$value['gamePlayerID'].'</td></tr>';
}
echo '</table>';



?>