<?php
include ('globalFunction.php');

$userId = $_GET['userId'];
$todaysDate = date("Y-m-d");

 // get data for the piechart : exepenses by category
$sql = "SELECT SUM(amount)*-1 AS total,description FROM tbl_variable
        WHERE user_id = :user_id AND amount < 0 AND MONTH(date) = MONTH(CURRENT_DATE())
        AND YEAR(date) = YEAR(CURRENT_DATE()) GROUP BY description"; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$totalMonthlyExpensesByCategory = $stmt->fetchAll(PDO::FETCH_OBJ); // array of regular incomes
$db = null; 
$data['chart2']= $totalMonthlyExpensesByCategory;


// get data for the line graph : the sum of monthly variable costs
$sql = "SELECT CONCAT(MONTHNAME(date), ' ' , YEAR(date)) as date,
        SUM(amount)*-1 AS amount
        FROM tbl_variable WHERE user_id = :user_id AND amount < 0
        GROUP BY YEAR(date), MONTH(date)"; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$db = null; 

$monthlyVariableByMonth = $stmt->fetchAll(PDO::FETCH_OBJ);// array of regular expenses

$data['chart3']= $monthlyVariableByMonth;


// get data for the stacked bar graph 
$sql = "SELECT SUM(a.amount) AS totalincome,
        (SELECT SUM(b.amount)*-1 FROM tbl_fixed b WHERE b.user_id = a.user_id AND b.saving = 1) as totalsaving,
        (SELECT SUM(c.amount)*-1 FROM tbl_fixed c WHERE c.user_id = a.user_id AND c.saving = 0 AND c.amount < 0) as totalexpenses
        FROM tbl_fixed a
        WHERE a.user_id = :user_id AND a.amount > 0 AND a.saving = 0";

$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$fixes = $stmt->fetchAll(PDO::FETCH_OBJ); // array of saving
$db = null; 

$sql =  "SELECT ABS(SUM(amount)) AS totalvariable FROM tbl_variable WHERE user_id = :user_id AND MONTH(date) = MONTH(CURRENT_DATE())"; 
$db = connection();
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $userId);
$stmt->execute();
$totalVar = $stmt->fetchAll(PDO::FETCH_OBJ); // array of the sum of variable costs
$db = null;


$amt_daysPassed = intVal(date("d")); // 8days passed in the current month
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
$amt_goalSavingMonth = $amt_daysPassed* floatVal($amt_dailyGoalSaving);


$overviewCurrentMonth['totalincome'] = floatVal($fixes[0]->totalincome);
$overviewCurrentMonth['totalsaving'] = floatVal($fixes[0]->totalsaving);
$overviewCurrentMonth['totalexpenses'] = floatVal($fixes[0]->totalexpenses);
$overviewCurrentMonth['totalvariable'] = floatVal($totalVar[0]->totalvariable);
$overviewCurrentMonth['totalgoal'] = $amt_goalSavingMonth;
$overviewCurrentMonth['currmonth'] = date("F");

$data['chart1']= $overviewCurrentMonth;

response('success', 'You are successfully registered!', $data);


?>