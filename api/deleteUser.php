<?php
  include('globalFunction.php');

  $userName = $_GET['userName'];

  $sql = "DELETE FROM tbl_user WHERE username=:username";
  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("username", $userName);
  $stmt->execute();
  $db = null;

  if($stmt->rowCount() == 0){
  response('error','Nothing to delete',null);
}else{
  response('success','it is successfully deleted ',null);
}
?>
