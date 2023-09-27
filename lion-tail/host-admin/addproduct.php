<?php $actova1=''; $actova2=''; $actova3=''; $actova4=''; $actova5=''; $actova6=''; $actova7=''; $actova8=''; $actova6w='active'; $actova10='';?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php require_once('../../emails_lib.php'); ?>
<?php $bassic->checkLogedINAdmin('login');?>
  <?php 
$msg='';

if(isset($_POST['post'])){
    $msg = $_POST['msg'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $pic_name  = $_FILES['file']['name'];
    $pic_tmp = $_FILES['file']['tmp_name'];
    $pic_size = $_FILES['file']['size'];
    $tid = $bassic->randGenerator();

			if(!empty($msg )&&!empty($price)&&!empty($title)){
              $gen_Num = $bassic->randGenerator();
              $extension_Name = $bassic->extentionName($pic_name);
              $new_name = $gen_Num.uniqid().$extension_Name;
              $path = '../../productimage/'.$new_name;
              $picvalidation = $bassic->picVlidator($pic_name,$pic_size);

          if(empty($picvalidation)) {
              $upl = $bassic->uploadImage($pic_tmp,$path);
              if(empty($upl)) {
                  $fieldup = array("id", "trn_id", "name", "price", "image", "description", "date_post");
                  $valueup = array(null, $tid, $title, $price, $new_name, $msg, $bassic->getDate2());
                  $update = $cal->insertDataB($product, $fieldup, $valueup);
                  if (!empty($update)) {
                      if ($update == 'Registration was successful. Proceed to login!') {
                          $msg = 'Product upload was successfully!';
                      } else {
                          $msg = $update;
                      }
                  } else {$msg = 'An error occured!';}
              }else{$msg =  $upl;}
          }else{$msg =  $picvalidation;}
          }else{$msg = 'Please fill all fields';}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Products | ';
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
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Products</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li>
						<li><i class="fa fa-laptop"></i> Add Products</li>
                        <li><i class="fa fa-laptop"></i><a href="all-products"> View Products</a></li>
					</ol>
				</div>
			</div>

 <?php if(!empty($msg)){?>
 <div class="row">
         <div id="go" class=" col-lg-12">
        <div id="go" class="alert alert-warning" style="text-align: center; color:#FFF;"><?php print @$msg;?> <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
<?php }else{?>
 <div class="row">
         <div id="go" class=" col-lg-12">
        <div id="go" class="alert alert-warning" style="text-align: center; color:#000;">Add Products <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
    <?php }?>        
         <div class="row">
         
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
					 <form action="" method="post" enctype="multipart/form-data">  
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                     <tr>
                                        	<td>Product Name</td>
                                            <td><input type="text" class="form-control" value="" name="title" >
                                            </td>
                                        </tr>
                                     <tr>
                                         <td>Product Price($)</td>
                                         <td><input type="number" class="form-control" value="" name="price" >
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>Product Image(500 X 375)</td>
                                         <td><input type="file" class="form-control" value="" name="file" >
                                         </td>
                                     </tr>
                                        <tr>
                                        	<td>Product Description</td>
                                            <td><textarea class="form-control" value="" name="msg" ></textarea>
                                            </td>
                                        </tr>
                                        <!--<tr>
                                        <td> Admin Name</td>
                                        <td> <input  name="name" type="text" class="form-control" id="" /></td>
                                        </tr>-->
                                        <tr>
                                        	<td></td>
                                            <td><input class="btn btn-primary" type="submit" name="post" value="Post" /></td>
                                        </tr>
                                    </tbody>
                            </table></form>   
              </div>
         </div><!--/.row-->
               
                

			
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
