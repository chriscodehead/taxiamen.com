<?php $actova1 = '';
$actova2 = '';
$actova3 = '';
$actova4 = '';
$actova5 = '';
$actova6 = '';
$actova7 = '';
$actova8 = '';
$actova9 = '';
$actovaw11ery = 'active'; ?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php $bassic->checkLogedINAdmin('login'); ?>

<?php
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
 if (query_sql("DELETE FROM $stacking_tb WHERE `id`='" . $_GET['delete'] . "' LIMIT 1")) {
  $msg = 'Delete process was successful!';
  header("location:stake?done=" . $msg);
 } else {
  $msg = 'Info Faild to delete!';
  header("location:stake?done=" . $msg);
 }
}
?>
<?php if (isset($_GET['done']) && !empty($_GET['done'])) {
 $msg = $_GET['done'];
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Stake |';
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
      <h3 class="page-header"><i class="fa fa-laptop"></i> Stake</h3>
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

       <table style="font-size:10px;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
         <tr class="odd gradeX">
          <th><i class="fa fa-clock"></i></th>
          <th><span>Currency</span></th>
          <th><span>User Email</span></th>
          <th><span>Amount</span></th>
          <th><span>Profit</span></th>
          <th><span>Elapse Duration</span></th>
          <th><span>Edit</span></th>
          <th><span>Remove</span></th>
         </tr>
        </thead>
        <tbody>
         <?php $sql = query_sql("SELECT * FROM $stacking_tb  ORDER BY id DESC");
         if (mysqli_num_rows($sql) > 0) {
          $c = 0;
          while ($row = mysqli_fetch_assoc($sql)) {
         ?>

           <tr>
            <td>
             <span class='text-success'><?php print $row['date']; ?></span>
            </td>
            <td>
             <?php print $row['currency']; ?> </td>
            <td><?php print $row['email']; ?></td>
            <td class="text-success">$<?php print number_format($row['amount']); ?></td>
            <td><?php print $row['profit']; ?></td>
            <td><?php print $row['elapse']; ?></td>
            <td><a href="edit-stake?id=<?php print $row['id']; ?>"><i class="btn btn-default fa fa-edit"></i></a></td>
            <td><a data-toggle="modal" href="#myModalWWW<?php print $row['id']; ?>"><i class="btn btn-default fa fa-trash-o"></i></a></td>
           </tr>

           <!-- Modal -->
           <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalWWW<?php print $row['id']; ?>" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title">Delete Stake ?</h4>
              </div>
              <div class="modal-body">
               <p>Are you sure you want to delete this stake</p>
              </div>
              <div class="modal-footer">
               <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
               <a href="stake?delete=<?php print $row['id']; ?>">
                <span class="btn btn-theme">Delete</span>
               </a>
              </div>
             </div>
            </div>
           </div>
           <!-- modal -->

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
       </table>

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