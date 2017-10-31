<?php
session_start();
// function to connect to database
function connection() {
    $dbhost= "localhost";
    $dbuser= "root";
    $dbpass= "";
    $dbname= "db_fellowme";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
// creates an array to encode the this array into json(string) format in order to show the response
function response($status,$message,$data){

  $result = array();
  $result['status'] = $status;
  $result['message'] = $message;
  $result['data'] = $data;

  $result = json_encode($result);
  echo $result;
  exit();

 }

?>
