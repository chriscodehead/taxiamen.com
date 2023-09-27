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
 $currency = $_POST['currency'];
 $elapse = $_POST['elapse'];
 $profit = $_POST['profit'];
 $email = $_POST['email'];

 if (!empty($amount) && !empty($currency) && !empty($elapse) && !empty($profit) && !empty($email)) {

  $fieldup = array("email", "amount", "currency", "elapse", "profit");
  $valueup = array($email, $amount, $currency, $elapse, $profit);
  $update = $cal->update($stacking_tb, $fieldup, $valueup, 'id', $p_id);
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
       <li><i class="fa fa-laptop"></i> <a href="stake">All Stake</a></li>
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
          <td><input type="email" class="form-control" value="<?php echo @$cal->selectFrmDB($stacking_tb, 'email', 'id', $_GET['id']) ?>" name="email">
          </td>
         </tr>

         <tr>
          <td>Amount</td>
          <td>
           <input type="text" class="form-control" value="<?php echo @$cal->selectFrmDB($stacking_tb, 'amount', 'id', $_GET['id']) ?>" name="amount">
          </td>
         </tr>

         <tr>
          <td>Currency</td>
          <td><input type="text" class="form-control" value="<?php echo @$cal->selectFrmDB($stacking_tb, 'currency', 'id', $_GET['id']) ?>" name="currency">
          </td>
         </tr>

         <tr>
          <td>Duration</td>
          <td><?php $elapse = @$cal->selectFrmDB($stacking_tb, 'elapse', 'id', $_GET['id']) ?>
           <select class="trade-input form-control" name="elapse" id="elapse" aria-describedby="elapseHelp" required>
            <option value="">SELECT</option>
            <option <?php if ($elapse == '3') print 'selected'; ?> value="3">3 days</option>
            <option <?php if ($elapse == '5') print 'selected'; ?> value="5">5 days</option>
            <option <?php if ($elapse == '7') print 'selected'; ?> value="7">7 days</option>
            <option <?php if ($elapse == '10') print 'selected'; ?> value="10">10 days</option>
            <option <?php if ($elapse == '14') print 'selected'; ?> value="14">14 days</option>
           </select>
          </td>
         </tr>

         <tr>
          <td>Profit</td>
          <td><input type="text" class="form-control" value="<?php echo @$cal->selectFrmDB($stacking_tb, 'profit', 'id', $_GET['id']) ?>" name="profit">
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