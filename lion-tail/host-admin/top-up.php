<?php $actova1 = '';
$actova2 = '';
$actova3 = '';
$actova4 = '';
$actova5 = '';
$actova6 = '';
$actova7 = '';
$actova8 = '';
$actova9 = '';
$actovaw11eryy = 'active'; ?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php require_once('../../emails_lib.php'); ?>
<?php $bassic->checkLogedINAdmin('login'); ?>

<?php
if (isset($_GET['confirm-deposit']) && !empty($_GET['confirm-deposit'])) {

 $id = $_GET['confirm-deposit'];
 $email = $cal->selectFrmDB($top_up_tb, 'email', 'id', $id);
 $amount = $cal->selectFrmDB($top_up_tb, 'amount', 'id',  $id);
 $name = $cal->selectFrmDB($user_tb, 'first_name', 'email', $email);
 $coin  = $cal->selectFrmDB($top_up_tb, 'coin', 'id',  $id);
 $plan = 'TopUp';
 $mai_id = uniqid();

 if (!empty($email)) {
  $fields = array('status');
  $values = array('confirmed');
  $msg = $cal->update($top_up_tb, $fields, $values, 'id',   $id);

  //user
  $balance = $cal->selectFrmDB($user_tb, 'main_account_balance', 'email', $email);
  $new_balance =  $balance + $amount;
  $fields = array('main_account_balance');
  $values = array($new_balance);
  $msg = $cal->update($user_tb, $fields, $values, 'email', $email);

  $email_call->ConfirmPaymentNotify($amount, $plan, $coin, $mai_id, $name, $email);
  header("location:top-up?done=" . $msg);
 }
}


if (isset($_GET['unconfirm-deposit']) && !empty($_GET['unconfirm-deposit'])) {

 $id = $_GET['unconfirm-deposit'];
 $email = $cal->selectFrmDB($top_up_tb, 'email', 'id', $id);
 $amount = $cal->selectFrmDB($top_up_tb, 'amount', 'id',  $id);
 $name = $cal->selectFrmDB($user_tb, 'first_name', 'email', $email);
 $coin  = $cal->selectFrmDB($top_up_tb, 'coin', 'id',  $id);
 $plan = 'TopUp';
 $mai_id = uniqid();

 if (!empty($email)) {
  $fields = array('status');
  $values = array('pending');
  $msg = $cal->update($top_up_tb, $fields, $values, 'id',   $id);

  //user
  $balance = $cal->selectFrmDB($user_tb, 'main_account_balance', 'email', $email);
  $new_balance =  $balance - $amount;
  $fields = array('main_account_balance');
  $values = array($new_balance);
  $msg = $cal->update($user_tb, $fields, $values, 'email', $email);

  $email_call->ConfirmPaymentNotify($amount, $plan, $coin, $mai_id, $name, $email);
  header("location:top-up?done=" . $msg);
 }
}



if (isset($_GET['del']) && !empty($_GET['del'])) {
 if (query_sql("DELETE FROM $top_up_tb WHERE `id`='" . $_GET['del'] . "' LIMIT 1")) {
  $msg = 'Delete process was successful!';
  header("location:top-up?done=" . $msg);
 } else {
  $msg = 'Info Faild to delete!';
  header("location:top-up?done=" . $msg);
 }
}
?>
<?php if (isset($_GET['done']) && !empty($_GET['done'])) {
 $msg = $_GET['done'];
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Deposit |';
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
      <h3 class="page-header"><i class="fa fa-laptop"></i> Deposit</h3>
      <ol class="breadcrumb">
       <li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li>
      </ol>
     </div>
    </div>

    <?php if (!empty($msg)) { ?>
     <div class="row">
      <div id="go" class=" col-lg-12">
       <div id="go" class="alert alert-warning" style="text-align: center; color:#FFF;"><?php print @$msg; ?> <i id="remove" class="fa fa-remove pull-right"></i></div>
      </div>
     </div>
    <?php } ?>

    <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">

       <!-- <table style="font-size:10px;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
         <tr class="odd gradeX">
          <th><i class="fa fa-clock"></i></th>
          <th><span>Type</span></th>
          <th><span>User Email</span></th>
          <th><span>Amount</span></th>
          <th><span>Wallet</span></th>
          <th><span>Status</span></th>
          <th><span>Proof</span></th>

          <th><span>Remove</span></th>
         </tr>
        </thead>
        <tbody>
         <?php $sql = query_sql("SELECT * FROM $top_up_tb  ORDER BY id DESC");
         if (mysqli_num_rows($sql) > 0) {
          $c = 0;
          while ($row = mysqli_fetch_assoc($sql)) {
         ?>

           <tr>
            <td>
             <span class='text-<?php print @$col; ?>'><?php print $row['date']; ?></span>
            </td>
            <td><?php print $row['coin']; ?></td>
            <td><?php print $row['email']; ?></td>
            <td class="text-success">$<?php print number_format($row['amount']); ?></td>
            <td><?php print $row['address']; ?></td>
            <td><?php print $row['status']; ?></td>
            <td><img src="../../photo/<?php print $row['image']; ?>" width="50" /></td>

            <td><a data-toggle="modal" href="#myModalWWWa<?php print $row['id']; ?>"><i class="btn btn-default fa fa-trash-o"></i></a></td>
           </tr>


           <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalWWWa<?php print $row['id']; ?>" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title">Delete Deposit ?</h4>
              </div>
              <div class="modal-body">
               <p>Are you sure you want to delete this deposit</p>
              </div>
              <div class="modal-footer">
               <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
               <a href="top-up?delete=<?php print $row['id']; ?>">
                <span class="btn btn-theme">Delete</span>
               </a>
              </div>
             </div>
            </div>
           </div>


          <?php $c++;
          }
         } else { ?>
          <tr>
           <td colspan="9">
            <h3>No data found!</h3>
           </td>
          </tr>

         <?php } ?>
        </tbody>
       </table> -->




       <?php

       SelectDeposit($top_up_tb);
       function SelectDeposit($table)
       {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        echo '
			<table class="tableclass table-responsive table-bordered table-striped table-condensed" style="font-size:11px; color:#06C;"  width="100%">
						<tr style="color:#000;">
						<td >S/N</td>
						<td >Email</td>
						<td >Amount($)</td>
						<td>Wallet</td>
						<td >Type</td>
      <td >Status</td>
      <td >Image</td>
						<td >Date Reg.</td>
						<td >Confirm/Unconfirm</td>
						<td >Edit</td>
						<td >Remove</td>
						</tr>';
        $i = 1;
        if ($stmt) {
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

          if ($row['status'] == 'confirmed') {
           $state = '<a data-toggle="modal" href="#myModuUN' . $row['id'] . '" title="Unconfirm Wallet"><i class="btn btn-default fa fa-unlock"></i></a>';
           $ends = '<a data-toggle="modal" href="#myModull' . $row['id'] . '" title="End Transaction"><i class="btn btn-default fa fa-trash-o"></i></a>';
          } else if ($row['status'] == 'pending') {
           $state = '<a data-toggle="modal" href="#myModu' . $row['id'] . '" title="Confirm Wallet"><i class="btn btn-default fa fa-lock"></i></a>';
           $ends = '<a data-toggle="modal" href="#myModull' . $row['id'] . '" title="End Transaction"><i class="btn btn-default fa fa-trash-o"></i></a>';
          } else {
           $state = '<a data-toggle="modal" href="#myModu' . $row['id'] . '" title="Confirm Wallet"><i class="btn btn-default fa fa-unlock"></i></a>';
           $ends = '<a data-toggle="modal" href="#myModull' . $row['id'] . '" title="End Transaction"><i class="btn btn-default fa fa-trash-o"></i></a>';
          }

          if ($row['status'] == 'confirmed') {
           $color = '#006600';
          } else {
           $color = '';
          }

          if ($row['status'] == 'Payment Confirmed') {
           $colsa = '#00CC00';
          } else {
           $colsa = '';
          }



          echo '<tr style="color:' . $color . '">
			<td >' . $i . '</td>
			<td >' . $row['email'] . '</td>
			<td >' . $row['amount'] . '</td>
			<td style="color:#06C;">' . $row['address'] . '</td>
			<td style="color:#06C;">' . $row['coin'] . '</td>
			<td style="color:#06C;">' . $row['status'] . '</td>
   <td><img src="../../photo/' . $row['image'] . '" width="50" /></td>
			<td >' . $row['date'] . '</td>
			<td align="center">' . $state . '</td>
			<td><a href="edit-top-up?id=' . $row['id'] . '"> <i class="btn btn-default fa fa-edit"></i></a></td>
			<td><a data-toggle="modal" href="#myModullDEL' . $row['id'] . '" title="End Transaction"><i class="btn btn-default fa fa-trash-o"></i></a></td>
			
			
			
			<!-- Modal -->
			 <div class="modal fade" id="AlldelPACKSTDATA" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 align="center" class="modal-title">Confrim all <span class="text-success">selected</span> transaction</h4>
                          </div>
                          <div class="modal-body">
                              <h4>Are you sure you want to confirm this transaction</h4>
                          </div>
                          <div class="modal-footer">
						  <!--onClick="confrimTRN();"-->
                              <button data-dismiss="modal" onClick="confrimTRN();" id="pushUPT" type="button" class="btn btn-lg btn-info m-b-5" >Confrim</button>
                              <button type="button" class="btn btn-lg btn-default m-b-5" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
		 <!-- modal -->
		 
		 
			
				                  <!-- Modal -->
		    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModullDEL' . $row['id'] . '" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Delete User ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Are you sure you want to delete this user</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <a href="top-up?del=' . $row['id'] . '">
								  <span class="btn btn-theme">Delete</span>
								  </a>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
			
			<!-- Modal -->
		    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModu' . $row['id'] . '" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Confirm Deposit ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Are you sure you want to confirm this deposit?</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <a href="top-up?confirm-deposit=' . $row['id'] . '">
								  <span class="btn btn-theme">Confirm</span>
								  </a>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
				  
				  		<!-- Modal -->
		    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModuUN' . $row['id'] . '" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Unconfirm Deposit ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Are you sure you want to Unconfirm this deposit?</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <a href="top-up?unconfirm-deposit=' . $row['id'] . '">
								  <span class="btn btn-theme">Unconfirm</span>
								  </a>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
				  
				  
				  
				  
			</tr>';
          $i++;
         }
        } else {
         echo '<td colspan="11">No Detail Found!</td>';
        }
        echo '</table>';
        return;
       }
       ?>

      </div>
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