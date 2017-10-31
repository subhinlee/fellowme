<?php
  include('globalFunction.php');

  $userName = $_GET['userName'];
  $oldPassword = $_GET['oldPassword'];
  $newPassword = $_GET['newPassword'];

  $sql = "UPDATE tbl_user SET password = :newPassword WHERE username=:username AND password =:oldPassword";

  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("newPassword", $newPassword);
  $stmt->bindParam("username", $userName);
  $stmt->bindParam("oldPassword", $oldPassword);
  $stmt->execute();
  $db = null;

  if($stmt->rowCount() == 0){
    response('error','Nothing to update',null);
  }else{
    response('success','it is successfully updated ',null);
  }

?>
