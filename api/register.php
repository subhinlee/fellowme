<?php
  include('globalFunction.php');

  $userName = $_GET['userName'];
  $password = $_GET['password'];
// a function from api
  $sql = "SELECT username FROM tbl_user
          WHERE username = :username" ; // :contatinerName
  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("username", $userName);
  $stmt->execute();
  $user = $stmt->fetchAll(PDO::FETCH_OBJ);
  $db = null; // for security reason

  if(isset($user) && $user != null){
    response('error','This username already exists, Please type other username',null);
  }else{

    $db = connection();
    $sql = "INSERT INTO tbl_user (username,password) VALUES (:username,:password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("username", $userName);
    $stmt->bindParam("password", $password);
    $stmt->execute();
    $db = null;

    response('success','You are successfully registered!',null);
  }
?>
