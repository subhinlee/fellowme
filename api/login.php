<?php
 include('globalFunction.php');

  $userName = $_GET['userName'];
  $password = $_GET['password'];
// a function from api
  $sql = "SELECT id, username FROM tbl_user
          WHERE username = :username AND password = :password" ; // :contatinerName
  $db = connection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("username", $userName);
  $stmt->bindParam("password", $password);
  $stmt->execute();
  $user = $stmt->fetchAll(PDO::FETCH_OBJ); // create an array of the row from the currently logged-in user
  $db = null; // for security reason

  if(isset($user) && $user != null){
    $_SESSION["user_id"] = $user[0]->id; // get user's id into SESSION[]
    response('success','You are logged in',$user[0]);
  }else{
    response('error','Please type the right username and password',null);
  }


?>
