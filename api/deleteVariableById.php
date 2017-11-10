<?php
  include('globalFunction.php');

  $id = $_GET['id'];

  $sql = "DELETE FROM tbl_variable WHERE id=:id";
  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("id", $id);
  $stmt->execute();
  $db = null;

  if($stmt->rowCount() == 0){
  response('error','Nothing to delete',null);
}else{
  response('success','it is successfully deleted ',null);
}
?>
