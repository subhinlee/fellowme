<?php
include ('globalFunction.php');
 
$userId = $_GET['userId'];
$todaysDate = date("Y-m-d");

$amt_daysPassed = intVal(date("d")); // 8days passed in the current month 
$amt_numberOfDays = intVal(date("t")); // the number of days in the current month
$amt_totalFixed = 0; // the sum of all fixed costs
$amt_goalDaysPassed = 0; // the number of days from the date_start til today
$amt_goalDuration = 0; // the difference between the date_start and the end_date
$amt_goalValue = 0; // the set-up amount for the goal
$amt_totalVarMonth = 0; //the sum of all variable costs in the current month
$amt_dailyGoalSaving = 0; // the amount of daily saving for the goal
$amt_goalSavingMonth = 0; // the amount of the saved money for the goal
$amt_dailyFixedBudget = 0; // the amount of the daily-fixed budget

$result_goal_percentage = 0.0;
$result_dailyBudget = 0.0;
$result_todayBudgetLeft = 0.0;


// select the row of all infos from the goal table for current user
$sql =  "SELECT *,DATEDIFF(date_end, date_start) as Duration, DATEDIFF(NOW(), date_start) as Passed
FROM tbl_goal WHERE user_id = :user_id "; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$goalDetails = $stmt->fetchAll(PDO::FETCH_OBJ); // array of the goal details
$db = null;

$amt_goalDaysPassed = $goalDetails[0]->Passed;
$amt_goalDuration = $goalDetails[0]->Duration;
$amt_goalValue = $goalDetails[0]->amount;
$amt_dailyGoalSaving = number_format($amt_goalValue / $amt_goalDuration, 2);
$amt_goalSavingMonth = $amt_daysPassed* floatVal($amt_dailyGoalSaving)*-1;

//Select Total Fixed Values(Incomes and Expenses) 
$sql =  "SELECT SUM(amount) AS total FROM tbl_fixed WHERE user_id = :user_id "; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$totalFixed = $stmt->fetchAll(PDO::FETCH_OBJ); // array of the sum of fixed costs
$db = null;

$amt_totalFixed = intVal($totalFixed[0] -> total) ;

// select Total Variable for this month
$sql =  "SELECT SUM(amount) AS total FROM tbl_variable WHERE user_id = :user_id AND date BETWEEN (NOW() - INTERVAL :daysPassed DAY) AND NOW()"; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->bindParam("daysPassed", $amt_daysPassed);
$stmt->execute();
$totalVar = $stmt->fetchAll(PDO::FETCH_OBJ); // array of the sum of variable costs
$db = null;

// select all the variable records of today
$sql =  "SELECT * FROM tbl_variable WHERE user_id = :user_id AND date = :date"; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->bindParam("date", $todaysDate);
$stmt->execute();
$todaysTrack = $stmt->fetchAll(PDO::FETCH_OBJ); // array of the goal details
$db = null;

$amt_totalVarMonth = intVal($totalVar[0] -> total);
$amt_dailyFixedBudget = floatval(number_format($amt_totalFixed/$amt_numberOfDays,2));

// goal percentage calculating
$result_goal_percentage = number_format($amt_goalDaysPassed / $amt_goalDuration * 100, 1);

// Toadys Budget calculating
$result_dailyBudget = $amt_dailyFixedBudget - $amt_dailyGoalSaving;
$result_todayLeft = ($amt_dailyFixedBudget*$amt_daysPassed) + $amt_goalSavingMonth + $amt_totalVarMonth;

$data = array();
$data['dailyBudget']= $result_dailyBudget;
$data['todayBudget']= $result_todayLeft;
$data['goalPercentage']= floatVal($result_goal_percentage);
$data['goalDescription']= $goalDetails[0]->description;
$data['goalDday']= $amt_goalDuration-$amt_goalDaysPassed;
$data['trackdata']= $todaysTrack;
response('success', 'You are successfully registered!', $data);

?>