<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class utils{
    const TYPE_NUM = 1; 
    const TYPE_TEXT= 2; 
    const TYPE_BOOL=3;
    const TYPE_NULL=NULL;
   // public static $TYPE_CHARS = array("!","@","#'","$","%","^","&","*","(","0","-","+","=",")");

   
public static function getURLParam($array, $name, $type=null){
        /// Add functions for cleaning User Input
        $return = false;
       
        if($type != null)
        {
        switch ($type)
        {
            case 1: //TYPE_NUM
                 if(is_numeric($array[$name])) 
                 {$return = $array[$name];}else{
                     $return= false;
                 }
                
                 break;
            case 2:  // TYPE_TEXT
                if(is_string($array[$name]))
                {$return = $array[$name];}else{
                    $return = false;
                }
                break;
            case 3:  // TYPE_BOOL
                if( strtolower($array[$name])==='false' || strtolower($array[$name])==='true'  )
                {$return = strtolower($array[$name]);}else{
                    $return = false;
                }
                break;
        }}
        else{
        $return = $array[$name];}
       return $return;
    }
    

public static function cleanInput($input){
$bad = array('\'', '*','!','#','$','%','^','&','(',')','DELETE','DROP','/','`','~'); 
    if(is_array($input))
    { 
            foreach($input as $key=>$value)
            {
                    $return[$key] = self::cleanInput($value);
            }	 
    }	
$return = str_replace($bad,' ',$input); 
return $return; 
}


public static function FLUSH_ARRAY($array, $die=NULL){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        if($die)
        {
            die;
        }
    }

public static function loginTest(){
    if(!isset($_SESSION['login']) || $_SESSION['login'] == false ){
            header('location:login.php');}  
    }

 public static function setHash($string){
     return hash('sha256',$string); 
 }
 
 }
