<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author dan
 */

require_once '../run.php';
class users {
    public $link; 
    public $user; 
    public $active;
    public $id; 


    const USER_ADMIN = 1; 
    const USER_USER = 2; 
    const USER_SUPERVISOR = 3; 
    
    
    public function __construct() {
        $conn = new datalink();
        $this->link = $conn->connect(); 
    }
    
    private function open($id){
        $q = $this->link->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1 "); 
        $v = array($id); 
        $q->execute; 
        $results = $q->fetchALL(PDO::FETCH_ASSOC); 
        return $results; 
    }
    
      private function match($v1,$v2){
          
        if($v1===$v2){
            return true;
        }else{
      return false;}}
    
    
    public function login($username,$password){
        $q = $this->link->prepare("SELECT username,user_password,user_id FROM users WHERE username = ? LIMIT 1"); 
        $v = array($username); 
        $q->execute($v); 
        $results = $q->fetchALL(PDO::FETCH_ASSOC); 
      
          if(count($results)>0){
         if($this->match($password, $results[0]['user_password'])){
            $this->active = true;
            $this->id  = $results[0]['user_id'];
            return true; 
        }else
        {
            return false;
          }}else
              
              return false;
    }
    
    
    public function setPassword($new,$id){
        $query = $this->link->prepare("UPDATE users SET userPassword = ? WHERE userID = ? "); 
        $new = $this->hash($new);
        $values = array($new,$id); 
        if($query->execute($values)){
            
            return true; 
        }else
        {
        
            return false; }
        
        
    }
    
    public static function hash($key){
        $value = hash('sha256',$key);    
        return $value;
    }
    
    
    
    
    
  
    
    
    
}
