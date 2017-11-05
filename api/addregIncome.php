<?php

include('globalFunction.php');

  $amount = $_GET['amount'];
  $description = $_GET['description'];
  $user_id = $_GET['user_id'];
  $saving = 0;
// a function from api

    $db = connection();
    $sql = "INSERT INTO tbl_fixed (user_id,amount,description,saving) VALUES (:user_id,:amount,:description,:saving)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("user_id", $user_id);
    $stmt->bindParam("amount", $amount);
    $stmt->bindParam("description", $description);
    $stmt->bindParam("saving",$saving);
    $stmt->execute();
    $db = null;

    response('success','successfully inserted!',null);
  

?>