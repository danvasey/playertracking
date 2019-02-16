<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DdataConn
 *
 * @author Joe
 */
class DdataConn {
     protected $db_conn; 
     public $db_name = 'playertracker';
     public $db_user = 'root'; 
     public $db_password = '';
   
   public $db_host = 'localhost';
    function connect(){
       try
       {
        $this->db_conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;",$this->db_user,$this->db_password); 
        return $this->db_conn; 
       }
       catch (PDOException $e)
       {
           return $e->getMessage();  
       }
    }
    
}
    

