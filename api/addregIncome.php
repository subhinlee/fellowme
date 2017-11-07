<?php

include('globalFunction.php');

  $amount = $_GET['amount'];
  $description = $_GET['description'];
  $user_id = $_GET['user_id'];
  $saving = 0;
// a function from api
  $sql = "SELECT id FROM tbl_fixed WHERE user_id = :user_id AND description = :description" ; // :contatinerName
  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("user_id", $user_id);
  $stmt->bindParam("description", $description);
  $stmt->execute();
  $user = $stmt->fetchAll(PDO::FETCH_OBJ);
  $db = null; // for security reason

    if(isset($user) && $user != null){
      $db = connection();
      $sql = "UPDATE tbl_fixed SET  amount = :amount , description = :description WHERE id = :id "; 
      $stmt = $db->prepare($sql);
      $stmt->bindParam("id", $user[0]->id);
      $stmt->bindParam("amount", $amount);
      $stmt->bindParam("description", $description);
      $stmt->execute();
      $db = null;
  
      response('success','successfully updated!',null);
    }
    else{
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