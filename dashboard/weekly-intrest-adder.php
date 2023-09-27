<?php require_once('../library.php'); ?>
<?php
//Sat, Sun 
$day_on = date('D');

$cal->add_interest_weeklyLA();
$cal->weekly_ConunterLA();

$cal->add_interest_weeklyLB();
$cal->weekly_ConunterLB();

$cal->add_interest_weeklyLC();
$cal->weekly_ConunterLC();

$cal->add_interest_weeklyLD();
$cal->weekly_ConunterLD();

$cal->add_interest_weeklyLE();
$cal->weekly_ConunterLE();

/*if($day_on=='Sat' || $day_on=='Sun'){
 
}else{*/



//}
?>