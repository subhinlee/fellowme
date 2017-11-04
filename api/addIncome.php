<?php

include('globalFunction.php');

  $amount = $_GET['amount'];
  $description = $_GET['description'];
  $user_id = $_GET['user_id'];
  $date = date("Y-m-d");
// a function from api

    $db = connection();
    $sql = "INSERT INTO tbl_variable (user_id,amount,description,date) VALUES (:user_id,:amount,:description,:date)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("user_id", $user_id);
    $stmt->bindParam("amount", $amount);
    $stmt->bindParam("description", $description);
    $stmt->bindParam("date",$date);
    $stmt->execute();
    $db = null;

    response('success','successfully inserted!',null);
  

?>