<?php

require_once 'src/BeforeValidException.php';
require_once 'src/ExpiredException.php';
require_once 'src/SignatureInvalidException.php';
require_once 'src/JWT.php';


use \Firebase\JWT\JWT;

$key = "example_key";
$token = array(
   "iss" => "http://example.org",
   "aud" => "http://example.com",
   "iat" => 1356999524,
   "nbf" => 1357000000
);



$tk = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDB9.KcNaeDRMPwkRHDHsuIh1L2B01VApiu3aTOkWplFjoYI';
$jwt = JWT::encode($token, $key);

//echo $jwt;
//$decoded = JWT::decode($tk, $key, array('HS256'));



try {
     //JWT::$leeway = 60; // $leeway in seconds
     $decoded = JWT::decode($tk, $key, array('HS256'));
     $decoded->valid = true;
     echo json_encode( $decoded );
     exit;
     var_dump($decoded);
     //return $decoded;

    } catch (\Exception $e) {
    	$data = array('valid' => 'false');
    	echo json_encode($data);

    	//print_r($data);
    	exit;
       // return FALSE;
    }


$decoded_array = (array) $decoded;

   JWT::$leeway = 60; // $leeway in seconds
   $decoded = JWT::decode($jwt, $key, array('HS256'));
   print_r($decoded);

?>