<?php

include('globalFunction.php');

  $amount = $_GET['amount'];
  $description = $_GET['description'];
  $user_id = $_GET['user_id'];
  $date_start = date("Y-m-d");
  $date_end=$_GET['date_end'];
// a function from api

  $sql = "SELECT user_id FROM tbl_goal WHERE user_id = :user_id" ; // :contatinerName
  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("user_id", $user_id);
  $stmt->execute();
  $user = $stmt->fetchAll(PDO::FETCH_OBJ);
  $db = null; // for security reason

  if(isset($user) && $user != null){
    $db = connection();
    $sql = "UPDATE tbl_goal SET  date_start = :date_start, date_end = :date_end, amount = :amount ,description = :description 
            WHERE user_id = :user_id"; 
    $stmt = $db->prepare($sql);
    $stmt->bindParam("user_id", $user_id);
    $stmt->bindParam("amount", $amount);
    $stmt->bindParam("description", $description);
    $stmt->bindParam("date_start",$date_start);
    $stmt->bindParam("date_end",$date_end);
    $stmt->execute();
    $db = null;

    response('success','successfully updated!',null);
  }else{

    $db = connection();
    $sql = "INSERT INTO tbl_goal (user_id,date_start,date_end,amount,description) VALUES (:user_id,:date_start,:date_end,:amount,:description)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("user_id", $user_id);
    $stmt->bindParam("amount", $amount);
    $stmt->bindParam("description", $description);
    $stmt->bindParam("date_start",$date_start);
    $stmt->bindParam("date_end",$date_end);
    $stmt->execute();
    $db = null;

    response('success','successfully inserted!',null);
  }


?>