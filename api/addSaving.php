<?php

include('globalFunction.php');

  $amount = '-'.$_GET['amount'];
  $user_id = $_GET['user_id'];
  $description = "saving";
  $saving = 1;
// a function from api

  $sql = "SELECT id FROM tbl_fixed WHERE user_id = :user_id AND saving = :saving" ; // :contatinerName
  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("user_id", $user_id);
  $stmt->bindParam("saving", $saving);
  $stmt->execute();
  $user = $stmt->fetchAll(PDO::FETCH_OBJ);
  $db = null; // for security reason

  if(isset($user) && $user != null){
    $db = connection();
    $sql = "UPDATE tbl_fixed SET  amount = :amount WHERE id = :id "; 
    $stmt = $db->prepare($sql);
    $stmt->bindParam("id", $user[0]->id);
    $stmt->bindParam("amount", $amount);
    $stmt->execute();
    $db = null;

    response('success','successfully updated!',null);
  }else{

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
  }


?>