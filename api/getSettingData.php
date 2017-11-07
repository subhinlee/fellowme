<?php
include ('globalFunction.php');

$userId = $_GET['userId'];
   
 // get all data of regular income
$sql = "SELECT id,amount,description FROM tbl_fixed
           WHERE user_id = :user_id AND amount > 0 "; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$regularIncome = $stmt->fetchAll(PDO::FETCH_OBJ); // array of regular incomes
$db = null; 

// get all data of regular expense
$sql = "SELECT id,amount,description FROM tbl_fixed
WHERE user_id = :user_id AND amount < 0 AND saving = 0"; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$regularExpense = $stmt->fetchAll(PDO::FETCH_OBJ);// array of regular expenses
$db = null; 

// get all data of monthly saving
$sql = "SELECT id,amount,description FROM tbl_fixed
WHERE user_id = :user_id AND amount < 0 AND saving = 1";
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$saving = $stmt->fetchAll(PDO::FETCH_OBJ); // array of saving
$db = null; 

$data = array();
$data["income"] = $regularIncome;
$data["expense"] = $regularExpense;
$data["saving"] = $saving;


response('success', 'You are successfully registered!', $data);



?>