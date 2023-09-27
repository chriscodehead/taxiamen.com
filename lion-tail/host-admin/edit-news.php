<?php $actova1=''; $actova2=''; $actova3=''; $actova4=''; $actova5=''; $actova6=''; $actova7=''; $actova8=''; $actova9=''; $actova10='active';?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php $bassic->checkLogedINAdmin('login');?>
  <?php 
$msg='';
if(isset($_GET['id'])&&!empty($_GET['id'])){}else{header("location:message-activater");}
if(isset($_POST['post'])){
			$msg = $_POST['msg'];
			$name = $_POST['name'];
			$title = $_POST['title'];
			$postdate = $_POST['datepost'];
			if(!empty($msg )&&!empty($name)&&!empty($title)){
										  $fieldup = array("title","news","admin_name","date_post");
					                      $valueup = array($title,$msg,$name,$postdate);
					                      $update = $cal->update($news,$fieldup,$valueup,'id',$_GET['id']);
						if(!empty($update)){
									 $msg = $update;
						  }else{/*do nothing*/}
										  
			}else{$msg = 'Please fill all fields';}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'News View |';
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
					<h3 class="page-header"><i class="fa fa-laptop"></i> News</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li>
						<li><i class="fa fa-laptop"></i> News View</li>						  	
					</ol>
				</div>
			</div>

 <?php if(!empty($msg)){?>
 <div class="row">
         <div id="go" class=" col-lg-12">
        <div id="go" class="alert alert-warning" style="text-align: center; color:#FFF;"><?php print @$msg;?> <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
<?php }?>
            
         <div class="row">
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
					  <form action="" method="post" enctype="multipart/form-data">  
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                     <tr>
                                        	<td>News Message Title</td>
                                            <td><input class="form-control" value="<?php echo @$cal->selectFrmDB($news,'title','id',$_GET['id'])?>" name="title" >
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>News Message</td>
                                            <td><textarea class="form-control"  name="msg" ><?php echo @$cal->selectFrmDB($news,'news','id',$_GET['id'])?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td> Admin Name</td>
                                        <td> <input  name="name" value="<?php echo @$cal->selectFrmDB($news,'admin_name','id',$_GET['id'])?>" type="text" class="form-control" id="" /></td>
                                        </tr>
                                          <tr>
                                        <td>Date Post</td>
                                        <td> <input  name="datepost" value="<?php echo @$cal->selectFrmDB($news,'date_post','id',$_GET['id'])?>" type="text" class="form-control" id="" /></td>
                                        </tr>
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
