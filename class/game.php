<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../run.php';
class game {
   public $link;
           
           
   public function __construct() {
       $conn = new DdataConn();
       $this->link = $conn->connect();
    
       return true;
   }
   
   
   public function creatGame($name,$master){
       $q = $this->link->prepare("INSERT into game (`gameName`,`gamePlayerID`,`gamePlayerMasterID`) values(?,?,?)");
       $values = array($name,$master,$master);
       $test = $q->execute($values);
     
       if($test){
           return true;
       }else{
           return false;
       }
    }
   
    public function joinGame($userID, $gameName){
        
        if(!$this->inGame($userID, $gameName)){
        
        $q = $this->link->prepare("INSERT into game (gamePlayerID,gameName) values(?,?)");
        $v = array($userID,$gameName);
        $q->execute($v);
         }
        return true;
    }
    
    private function inGame($userID,$gameName){
        $q = $this->link->prepare("SELECT count(*) as PlayerCount FROM game WHERE gamePlayerID = ? AND gameName = ? "); 
        $v = array($userID,$gameName);
        $q->execute($v);
        $results = $q->fetchALL(PDO::FETCH_ASSOC); 
        if($results[0]['PlayerCount']){
        return true;}else{
            return false; 
        }
    }

}
