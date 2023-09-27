<?php $actova1=''; $actova2=''; $actova3=''; $actova4=''; $actova5=''; $actova6=''; $actova7=''; $actova8=''; $actova9='active'; $actova10='';?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php require_once('../../emails_lib.php'); 
require('../../dashboard/try/coinpayments.inc.php');
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$user_id = $_GET['id'];
}else{
	header("location:all-users");
}
?>
<?php $bassic->checkLogedINAdmin('login');?>

<?php 
if(isset($_POST['post'])){
    $inv_type = mysqli_real_escape_string($link,$_POST['inv_type']);
    $plan = mysqli_real_escape_string($link,$_POST['plan']);
    $coin = mysqli_real_escape_string($link,$_POST['coin']);
    $amount = mysqli_real_escape_string($link,$_POST['amount']);


	if(!empty($amount)){
	    
	// $amount = $amount;
	// $fields = array('main_account_balance');
	// $values = array($amount);
	// $pasER = $cal->update($user_tb,$fields,$values,'email',$user_id);
	
	// if($pasER){
	// 	 $msg = 'Update was successful!';
	//  }else{
	// 	 $msg = 'Update Failed!';
	//  }
	
	
	$amount = $amount;
    // print_r($amount);die();
	$tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
	$coin =  $coin;
	$plan = $plan;
	$intrest_growth = 0;
	$deposit_status = 'confirmed';
	$category = $coin.'-INVEST';
	$description = $coin.'-INC';
	$place_order = 'no';
	$received_status = 'no';
	$payout_consent = 'no';
	$day_counter = 0;
	$total_not_paid = 0;
	$total_paid = 0;
	$btc_address = 'none';
	$ethereum_address = 'none';
	$plan_type = $plan;
	$coin_type = $coin;
	$coin_value = '';
	$expire_time = '';
	$status_url = '';
	$package = $inv_type ;
	$invest_week_day = date('D');
	$transaction_hash = 'none';
	$perfectmoney = 'Bonus';
    if ($plan == 'LEVEL1'){$duration = '7';}
    if ($plan == 'LEVEL2'){$duration = '10';}
    if ($plan == 'LEVEL3'){$duration = '14';}
    if ($plan == 'LEVEL4'){$duration = '30';}
    if ($plan == 'LEVEL5'){$duration = '7';}
     
	$fields = array('id','transaction_id','email','amount','intrest_growth','deposit_status','deposit_category','description','place_order','received_status','payout_consent','day_counter','date_created','total_not_paid','total_paid','btc_address','ethereum_address','plan_type','coin_type','coin_value','expire_time','packagetype','status_url','invest_week_day','transaction_hash','perfectmoney','duration');
		
	$values = array(null,$tID,$user_id,$amount,$intrest_growth,$deposit_status,$category,$description,$place_order,$received_status,$payout_consent,$day_counter,$bassic->getDate(),$total_not_paid,$total_paid,$btc_address,$ethereum_address,$plan_type,$coin_type,$coin_value,$expire_time,$package,$status_url,$invest_week_day,$transaction_hash,$perfectmoney,$duration);
		
	$pasER = $cal->insertDataB($deposit_tb,$fields,$values);	
	if($pasER){
		 $msg = 'Update was successful!';
	 }else{
		 $msg = 'Update Failed!';
	 }
	}else{$msg = 'Please fill all fields';}
}


?>

<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Add Bonus';
 require_once('head.php')?>
  <body>
  <!-- container section start -->
  <section id="container" class="" style="margin-bottom:100px;">
  <?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
    <div class="container">
        <h1>Add Transaction</h1>

                                <?php if (isset($_GET['error']) && !empty($_GET['error'])) { ?>
                                    <div class="alert alert-warning">
                                        <div class="alert-cta flex-wrap flex-md-nowrap">
                                            <div class="alert-text">
                                                <p><?php print @$_GET['error']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
            <form enctype="multipart/form-data" method="post" action="">

            <div class="form-group">
                <label for="category">Select a category:</label>
                <select class="form-control" id="category" name="inv_type">
                    <option value="CRYPTO">CRYPTO</option>
                </select>
            </div>


            <div class="form-group">
                <label for="category">Select a Plan:</label>
                <select class="form-control" id="category" name="plan">
                    <option name="plan" value="LEVEL1">Swift Plan</option>
                    <option name="plan" value="LEVEL2">Medial Plan</option>
                    <option name="plan" value="LEVEL3">Brisk Plan</option>
                    <option name="plan" value="LEVEL4">Vertex Plan</option>
                    <option name="plan" value="LEVEL5">Elon musk shares</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category">Select a Wallet:</label>
                <select class="form-control" id="category" name="coin">

                    <option value="USDT">USDT (TRC20)</option>
                    <option value="ETH">ETH(Ethereum)</option>
                    <option value="BTC">BTC(Bitcoin)</option>
                    <option value="BCH">BCH(Bitcoin cash)</option>
                    <option value="XLM">XLM(Stellar)</option>
                    <option value="XRP">XRP(Ripple)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter your name">
            </div>



            <button type="submit" onClick="invest();" name="post" value="Post" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

               
                

			
		</section>
   
      <!--main content end-->
  </section>
  <!-- container section start -->
</section>
 
  	

    <!-- javascripts -->
  <?php require_once('jsfiles.php')?>
    <!-- charts scripts -->
  </body>
</html>
<!-- <script type="text/javascript" src="js/functionsmain.js"></script>
                <script>
                    function invest() {
                        var hr = new XMLHttpRequest();
                        var url = "code_prosessor.php";
                        var amount = document.getElementById('amount').value;
                        var plan = $('input[name="plan"]:checked').val();
                        //document.getElementById('plan').value;
                        var coin = document.getElementById('coin').value;
                        var vars = "amount=" + amount;
                        if (amount == "" || coin == "" || plan == "") {
                            sweetUnpre("Please fill all necessary fields!");
                        } else {
                            if (parseInt(amount) < <?php print $siteMinA; ?>) {
                                sweetUnpre("Error! Min is $<?php print $siteMinA; ?>!");
                            } else {

                                if (plan == 'LEVEL1' && parseInt(amount) < <?php print $siteMinA; ?>) {
                                    sweetUnpre("Error! `<?php print $planA; ?> Plan` Min $<?php print $siteMinA; ?> - Max $<?php print $siteMaxA; ?>");
                                } else {



                                    if (plan == 'LEVEL2' && parseInt(amount) < <?php print $siteMinB; ?>) {
                                        sweetUnpre("Error! `<?php print $planB; ?> Plan` Min $<?php print $siteMinB; ?> - Max $<?php print $siteMaxB; ?>");
                                    } else {



                                        if (plan == 'LEVEL3' && parseInt(amount) < <?php print $siteMinC; ?>) {
                                            sweetUnpre("Error! `<?php print $planC; ?> Plan` Min $<?php print $siteMinC; ?> - Max $<?php print $siteMaxC; ?>");
                                        } else {

                                            if (plan == 'LEVEL4' && parseInt(amount) < <?php print $siteMinD; ?>) {
                                                sweetUnpre("Error! `<?php print $planD; ?> Plan` Min $<?php print $siteMinD; ?> - Max $<?php print $siteMaxD; ?>");
                                            } else {


                                                if (plan == 'LEVEL5' && parseInt(amount) < <?php print $siteMinE; ?>) {
                                                    sweetUnpre("Error! `<?php print $planE; ?> Plan` Min $<?php print $siteMinE; ?> - Max $<?php print $siteMaxE; ?>");
                                                } else {
                                                    $('#sub').click();
                                                }
                                            }
                                        }
                                    }
                                }
                            } //end
                        } //end starter
                    } //else empty
                </script> -->
