<?php $actova1 = '';
$actova2 = '';
$actova3 = '';
$actova4 = '';
$actova5 = '';
$actova6 = '';
$actova7 = '';
$actova8 = '';
$actova9 = '';
$actova10 = ''; ?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php $bassic->checkLogedINAdmin('login'); ?>
<?php if (isset($_GET['id-ter']) && !empty($_GET['id-ter'])) {
    $user_id = $_GET['id-ter'];
} else {
    header("location:all-users");
} ?>
<?php
$msg = '';
//update wallet address
if (isset($_POST['subW'])) {
    $wallet_address = mysqli_real_escape_string($link, htmlentities($_POST['wallet']));
    $E_address = mysqli_real_escape_string($link, htmlentities($_POST['walletE']));
    $pm = mysqli_real_escape_string($link, htmlentities($_POST['pm']));
    if (!empty($wallet_address)) {
        $fieldW = array('wallet_address', 'ethereum_wallet_address', 'perfectmoney');
        $valueW = array($wallet_address, $E_address, $pm);
        $msg = $cal->update($user_tb, $fieldW, $valueW, 'email', $user_id);
    }
}
?>
<?php
if (isset($_POST['subP'])) {
    $pic_name  = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];
    $pic_size = $_FILES['pic']['size'];
    $passportIn = $cal->selectFrmDB($user_tb, 'passport', 'email', $user_id);
    if (!empty($pic_name)) {
        $gen_Num = $bassic->randGenerator();
        $extension_Name = $bassic->extentionName($pic_name);
        $new_name = $gen_Num . $extension_Name;
        $path = '../../photo/' . $new_name;
        $picvalidation = $bassic->picVlidator($pic_name, $pic_size);
        if (empty($picvalidation)) {
            $bassic->unlinkFile($passportIn, '../photo/');
            $upl = $bassic->uploadImage($pic_tmp, $path);
            if (empty($upl)) {
                $fieldP = array('passport');
                $valueP = array($new_name);
                $msg = $cal->update($user_tb, $fieldP, $valueP, 'email', $user_id);
            } else {
                $msg = $upl;
            }
        } else {
            $msg = $picvalidation;
        }
    } else {
        $msg = 'Please fill all fields!';
    }
}
?>
<?php
if (isset($_POST['sub'])) {
    $name = mysqli_real_escape_string($link, htmlentities($_POST['name']));
    //$trader = mysqli_real_escape_string($link, htmlentities($_POST['trader']));
    $sex = mysqli_real_escape_string($link, htmlentities($_POST['sex']));
    $country = mysqli_real_escape_string($link, htmlentities($_POST['country']));
    $phone = mysqli_real_escape_string($link, htmlentities($_POST['phone']));
    $id_document_status = mysqli_real_escape_string($link, htmlentities($_POST['id_document_status']));
    $id_type = mysqli_real_escape_string($link, htmlentities($_POST['id_type']));

    if (!empty($name) && !empty($sex) && !empty($country) && !empty($phone)) {
        $fieldA = array('first_name', 'sex', 'country', 'phone', 'id_document_status', 'id_type');
        $valueA = array($name, $sex, $country, $phone, $id_document_status, $id_type);
        $msg = $cal->update($user_tb, $fieldA, $valueA, 'email', $user_id);
    } else {
        $msg = 'Please fill all fields';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Users Profile | The Best Bitcoin Mining Company';
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
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Profile</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li>
                            <li><i class="fa fa-laptop"></i> My Profile</li>
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
                    <!-- profile-widget -->

                </div>
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">


                            <div class="panel-body">
                                <div class="tab-content">


                                    <!-- edit-profile -->
                                    <div id="" class="">
                                        <section class="">
                                            <div class="">

                                                <h1> Profile Picture Info</h1>
                                                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">passport</label>
                                                        <div class="col-lg-6">
                                                            <input name="pic" type="file">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <img src="../../photo/<?php if ($cal->selectFrmDB($user_tb, 'passport', 'email', $user_id) == 'passport') {
                                                                                        print 'avata.png';
                                                                                    } else {
                                                                                        print @$cal->selectFrmDB($user_tb, 'passport', 'email', $user_id);
                                                                                    } ?>" width="90" height="83" alt="passport-segaminer">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <button type="submit" name="subP" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <h1> Profile Info</h1>
                                                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Name</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" value="<?php print @$cal->selectFrmDB($user_tb, 'first_name', 'email', $user_id); ?>" class="form-control" id="f-name" name="name" placeholder=" ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <!--<label class="col-lg-2 control-label">Trader:</label>
                                                  <div class="col-lg-6">
                    <select class="form-control " name="trader" id="trader">

                     <?php $trader = @$cal->selectFrmDB($user_tb, 'preferred_trader', 'email', $user_id); ?>
                      <option selected="selected" value="">Select your Preferred trader</option>
                        <option <?php if ($trader == 'Daniel Johnson') echo 'selected="selected"'; ?> value="Daniel Johnson">Daniel Johnson</option>
                        <option <?php if ($trader == 'Raymond shore') echo 'selected="selected"'; ?> value="Raymond shore">Raymond shore</option>
                        <option <?php if ($trader == 'Coleman wood') echo 'selected="selected"'; ?> value="Coleman wood">Coleman wood</option>
                        <option <?php if ($trader == 'Christina Taylor') echo 'selected="selected"'; ?> value="Christina Taylor">Christina Taylor</option>
                        <option <?php if ($trader == 'Kelvin Graham Perry') echo 'selected="selected"'; ?> value="Kelvin Graham">Kelvin Graham Perry</option>
                        <option <?php if ($trader == 'Scott Henderson') echo 'selected="selected"'; ?> value="Scott Henderson">Scott Henderson</option>
                    </select>
                               </div>-->
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Sex</label>
                                                        <div class="col-lg-6">
                                                            <select class="form-control" name="sex" id="sex">
                                                                <option selected="selected" value="">Select your Gender</option>
                                                                <?php $sex = $cal->selectFrmDB($user_tb, 'sex', 'email', $user_id); ?>
                                                                <option <?php if ($sex == 'Male') echo 'selected="selected"'; ?> value="Male">Male</option>
                                                                <option <?php if ($sex == 'Female') echo 'selected="selected"'; ?> value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Country</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" value="<?php print @$cal->selectFrmDB($user_tb, 'country', 'email', $user_id); ?>" class="form-control" id="l-name" name="country" placeholder=" ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Email</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="email" readonly value="<?php print @$cal->selectFrmDB($user_tb, 'email', 'email', $user_id); ?>" class="form-control" id="email" placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Phone</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="phone" value="<?php print @$cal->selectFrmDB($user_tb, 'phone', 'email', $user_id); ?>" class="form-control" id="mobile" placeholder=" ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <?php $id_type = @$cal->selectFrmDB($user_tb, 'id_type', 'email', $user_id); ?>

                                                        <label class="col-lg-2 control-label">Method of Verification*</label>
                                                        <div class="col-lg-6">
                                                            <select name="id_type" id="id_type" class="profile-select form-control">
                                                                <option <?php if ($id_type == 'Drivers License') print 'selected="selected"'; ?> value="Drivers License">Drivers License</option>

                                                                <option <?php if ($id_type == 'International Passport') print 'selected="selected"'; ?> value="International Passport">International Passport</option>

                                                                <option <?php if ($id_type == 'National ID') print 'selected="selected"'; ?> value="National ID">National ID</option>

                                                            </select>

                                                            <a target="_blank" href="../../photo/<?php print $cal->selectFrmDB($user_tb, 'id_document', 'email', $user_id); ?>"><img src="../../photo/<?php print $cal->selectFrmDB($user_tb, 'id_document', 'email', $user_id); ?>" width="50" /></a>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Document Status</label>
                                                        <div class="col-lg-6">
                                                            <select class="form-control" name="id_document_status" id="id_document_status">

                                                                <?php $id_document_status = $cal->selectFrmDB($user_tb, 'id_document_status', 'email', $user_id); ?>
                                                                <option <?php if ($id_document_status == 'Not Verified') echo 'selected="selected"'; ?> value="Not Verified">Not Verified </option>
                                                                <option <?php if ($id_document_status == 'Verified') echo 'selected="selected"'; ?> value="Verified">Verified</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div style="display: none;" class="form-group">
                                                        <label class="col-lg-2 control-label">your Referral</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" readonly name="referral" value="<?php print @$cal->selectFrmDB($user_tb, 'referral_username', 'email', $user_id); ?>" class="form-control" id="url" placeholder="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <button type="submit" name="sub" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page end-->
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