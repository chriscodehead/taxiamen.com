<?php $actova1 = '';
$actova2 = '';
$actova3 = '';
$actova4 = '';
$actova5 = '';
$actova6 = '';
$actova7 = '';
$actova8 = '';
$actova6w = 'active';
$actova10 = ''; ?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php require_once('../../emails_lib.php'); ?>
<?php $bassic->checkLogedINAdmin('login'); ?>
<?php
$msg = '';
$p_id = $_GET['id'];
if (isset($_POST['post'])) {

 $amount = $_POST['amount'];
 $units = $_POST['units'];
 $type = $_POST['type'];
 $duration = $_POST['interval'];
 $symbol = $_POST['symbol'];
 $trade = $_POST['trade']; //buy/sell
 $profit = $_POST['profit'];
 $status = $_POST['status'];
 $email = $_POST['email'];

 if (!empty($amount) && !empty($units) && !empty($type) && !empty($duration) && !empty($symbol) && !empty($trade) && !empty($status) && !empty($email)) {

  $fieldup = array("email", "type", "amount", "symbol", "units", "trade", "duration", "profit", "status");
  $valueup = array($email, $type, $amount, $symbol, $units, $trade, $duration, $profit, $status);
  $update = $cal->update($trading_td, $fieldup, $valueup, 'id', $p_id);
  $msg = $update;
 } else {
  $msg = 'Please fill all fields';
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Edit Trades';
require_once('head.php') ?>

<body>
 <!-- container section start -->
 <section id="container" class="" style="margin-bottom:100px;">
  <?php require_once('header.php') ?>
  <?php require_once('sidebar.php') ?>
  <!--main content start-->
  <section id="main-content">
   <section class="wrapper">
    <!--overview start-->
    <div class="row">
     <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-laptop"></i> Edit Trades</h3>
      <ol class="breadcrumb">
       <li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li>
       <li><i class="fa fa-laptop"></i> <a href="all-trades">All Trades</a></li>
      </ol>
     </div>
    </div>

    <?php if (!empty($msg)) { ?>
     <div class="row">
      <div id="go" class=" col-lg-12">
       <div id="go" class="alert alert-warning" style="text-align: center; color:#FFF;"><?php print @$msg; ?> <i id="remove" class="fa fa-remove pull-right"></i></div>
      </div>
     </div>
    <?php } else { ?>
     <div class="row">
      <div id="go" class=" col-lg-12">
       <div id="go" class="alert alert-warning" style="text-align: center; color:#000;">Edit Trade <i id="remove" class="fa fa-remove pull-right"></i></div>
      </div>
     </div>
    <?php } ?>
    <div class="row">

     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <form action="" method="post" enctype="multipart/form-data">
       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tbody>

         <tr>
          <td>User Email</td>
          <td><input type="email" class="form-control" value="<?php echo @$cal->selectFrmDB($trading_td, 'email', 'id', $_GET['id']) ?>" name="email">
          </td>
         </tr>

         <tr>
          <td>Trade Type</td>
          <td>
           <?php $type = $cal->selectFrmDB($trading_td, 'type', 'id', $_GET['id']); ?>
           <select id="type" name="type" class="form-control">
            <option <?php if ($type == 'demo') print "selected"; ?> value="demo">Demo</option>
            <option <?php if ($type == 'live') print "selected"; ?> value="live">Live</option>
           </select>
          </td>
         </tr>

         <tr>
          <td>Symbol</td>
          <td><input type="text" class="form-control" value="<?php echo @$cal->selectFrmDB($trading_td, 'symbol', 'id', $_GET['id']) ?>" name="symbol">
          </td>
         </tr>

         <tr>
          <td>Amount</td>
          <td><input type="text" class="form-control" value="<?php echo @$cal->selectFrmDB($trading_td, 'amount', 'id', $_GET['id']) ?>" name="amount">
          </td>
         </tr>

         <tr>
          <?php $units = $cal->selectFrmDB($trading_td, 'units', 'id', $_GET['id']); ?>
          <td>Units</td>
          <td><select class="trade-input form-control" name="units" id="buy-units">
            <option <?php if ($units == '1') print "selected"; ?> value="1">1</option>
            <option <?php if ($units == '2') print "selected"; ?> value="2">2</option>
            <option <?php if ($units == '3') print "selected"; ?> value="3">3</option>
            <option <?php if ($units == '4') print "selected"; ?> value="4">4</option>
            <option <?php if ($units == '5') print "selected"; ?> value="5">5</option>
            <option <?php if ($units == '6') print "selected"; ?> value="6">6</option>
            <option <?php if ($units == '7') print "selected"; ?> value="7">7</option>
            <option <?php if ($units == '8') print "selected"; ?> value="8">8</option>
            <option <?php if ($units == '9') print "selected"; ?> value="9">9</option>
            <option <?php if ($units == '10') print "selected"; ?> value="10">10</option>
           </select>
          </td>
         </tr>

         <tr>
          <td>Trade</td>
          <td>
           <?php $trade = $cal->selectFrmDB($trading_td, 'trade', 'id', $_GET['id']); ?>
           <select id="trade" name="trade" class="form-control">
            <option <?php if ($trade == 'buy') print "selected"; ?> value="buy">Buy</option>
            <option <?php if ($trade == 'sell') print "selected"; ?> value="sell">Sell</option>
           </select>
          </td>
         </tr>

         <tr>
          <td>Duration</td>
          <?php $duration = $cal->selectFrmDB($trading_td, 'duration', 'id', $_GET['id']); ?>
          <td><select class="trade-input form-control" name="interval">
            <option <?php if ($duration == '1 minutes') print "selected"; ?> value="1 minute">1 minute</option>
            <option <?php if ($duration == '3 minutes') print "selected"; ?> value="3 minutes">3 minutes</option>
            <option <?php if ($duration == '5 minutes') print "selected"; ?> value="5 minutes">5 minutes</option>
            <option <?php if ($duration == '10 minutes') print "selected"; ?> value="10 minutes">10 minutes</option>
            <option <?php if ($duration == '20 minutes') print "selected"; ?> value="20 minutes">15 minutes</option>
            <option <?php if ($duration == '30 minutes') print "selected"; ?> value="30 minutes">30 minutes</option>
            <option <?php if ($duration == '45 minutes') print "selected"; ?> value="45 minutes">45 minutes</option>
            <option <?php if ($duration == '60 minutes') print "selected"; ?> value="60 minutes">1 hour</option>
            <option <?php if ($duration == '120 minutes') print "selected"; ?> value="120 minutes">2 hours</option>
            <option <?php if ($duration == '1440 minutes') print "selected"; ?> value="1440 minutes">1 day</option>
           </select>
          </td>
         </tr>

         <tr>
          <td>Profit</td>
          <td><input type="text" class="form-control" value="<?php echo @$cal->selectFrmDB($trading_td, 'profit', 'id', $_GET['id']) ?>" name="profit">
          </td>
         </tr>

         <tr>
          <td>Trade Status</td>
          <td>
           <?php $status = $cal->selectFrmDB($trading_td, 'status', 'id', $_GET['id']); ?>
           <select id="status" name="status" class="form-control">
            <option <?php if ($status == 'Trade Ongoing') print "selected"; ?> value="Trade Ongoing">Trade Ongoing</option>
            <option <?php if ($status == 'Loss') print "selected"; ?> value="Loss">Loss</option>
            <option <?php if ($status == 'Profit') print "selected"; ?> value="Profit">Profit</option>
           </select>
          </td>
         </tr>


         <tr>
          <td></td>
          <td><input class="btn btn-primary" type="submit" name="post" value="Post" /></td>
         </tr>

        </tbody>
       </table>
      </form>
     </div>
    </div><!--/.row-->




   </section>

   <!--main content end-->
  </section>
  <!-- container section start -->
 </section>



 <!-- javascripts -->
 <?php require_once('jsfiles.php') ?>
 <!-- charts scripts -->
</body>

</html>