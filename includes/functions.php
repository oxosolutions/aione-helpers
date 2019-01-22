<?php

/************************************************************
*   @function generate_filename
*   @description generate new filename
*   @access public
*   @since  1.0.0.0
*   @author SGS Sandhu(sgssandhu.com)
*   @perm length    [integer  optional  default 30]
*   @perm timestamp   [true/false optional  default true]
*   @return filename [string]
************************************************************/
function generate_filename($length = 30, $timestamp = true){  

  //Check if non integer value is provided for first argument
  if(!is_int($length)){
    $length = intval($length);
  }
  
  //inialize filename variable as empty string
  $filename = '';
  
  //prepend timestamp in filename
  if($timestamp){
    $datetime = date('Ymdhis');
    $microtime = substr(explode(".", explode(" ", microtime())[0])[1], 0, 6);
    $filename .= $datetime.$microtime;
  }
  
  //Check if filename length is achieved or exceeded
  if( strlen($filename) > $length){
    $filename = substr($filename, 0, $length);
  } else {
    $random_string_length = $length - strlen($filename);
    for($i = 0; $i < $random_string_length; $i++){
      $filename .= mt_rand(1,9);
    }
  }
  
  //Return generated filename
  return $filename;
}