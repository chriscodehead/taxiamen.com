<?php
require_once('include.php');

if (isset($_POST['sub'])) {
  $taxi_id =  $bassic->picker() . uniqid();
  $title = mysqli_real_escape_string($link, $_POST['title']);
  $price = mysqli_real_escape_string($link, $_POST['price']);
  $description = $_POST['description'];
  $image = '';
  $date = date('Y-m-d g:i:a');

  if (!empty($title) && !empty($price)) {
    $feilds = array('id', 'taxi_id', 'title', 'price', 'description', 'image', 'date');
    $value = array(null, $taxi_id, $title, $price, $description, $image, $date);
    $insert = $cal->insertDataB($taxi_type, $feilds, $value);
    if ($insert) {
      $msg = 'Your data was entered successfully!';
    } else {
      print 'Error! Please try again.';
    }
  } else {
    $msg =  "Please enter a valid wallet address!";
  }
}

if (isset($_GET['del']) && !empty($_GET['del'])) {
  if (query_sql("DELETE FROM $taxi_type WHERE `id`='" . $_GET['del'] . "' LIMIT 1")) {
    $msg = 'Delete process was successful!';
    header("location:taxi-type?done=" . $msg);
  } else {
    $msg = 'Info Faild to delete!';
    header("location:taxi-type?done=" . $msg);
  }
}

if (isset($_GET['done']) && !empty($_GET['done'])) {
  $msg = $_GET['done'];
}
$title = 'Add Wallet | ' . $siteName;
$desc = '';
require_once('head.php'); ?>

<body class="nk-body npc-crypto bg-white has-sidebar ">
  <div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
      <?php require_once('side-bar.php'); ?>
      <!-- wrap @s -->
      <div class="nk-wrap ">
        <?php require_once('header.php'); ?>
        <!-- content @s -->

        <div class="nk-content nk-content-fluid">
          <div class="container-xl wide-lg">
            <div class="nk-content-body">
              <div class="kyc-app wide-sm m-auto">
                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                  <div class="nk-block-head-content text-center">
                    <h2 class="nk-block-title fw-normal">Add Taxi</h2>
                  </div>
                </div>
                <?php if (!empty($msg)) { ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php print @$msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>

                <form enctype="multipart/form-data" action="" method="post">
                  <div class="nk-block">
                    <div class="card card-bordered">
                      <div class="nk-kycfm">

                        <div class="nk-kycfm-content">
                          <div class="row g-4">
                            <div class="col-md-12">

                              <div class="form-group">
                                <div class="form-label-group">
                                  <label class="form-label">Tour Title <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-control-group">
                                  <input value="" name="title" id="title" type="text" class="form-control form-control-lg" placeholder="City Center 1-4 pers. €25">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="form-label-group">
                                  <label class="form-label">Price (€) <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-control-group">
                                  <input value="" name="price" id="price" type="number" class="form-control form-control-lg" placeholder="25">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="form-label-group">
                                  <label class="form-label">Description <span class="text-danger"></span></label>
                                </div>
                                <div class="form-control-group">
                                  <textarea rows="1" name="description" id="description" class="form-control form-control-lg" placeholder=""></textarea>
                                </div>
                              </div>



                            </div>
                          </div>
                        </div>

                        <div class="nk-kycfm-footer">

                          <div class="nk-kycfm-action pt-2">
                            <button type="submit" name="sub" id="sub" class="btn btn-lg btn-primary">Add Taxi</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="nk-content nk-content-fluid">
          <div class="container-xl wide-lg">

            <div class="nk-content-body">
              <div class="kyc-app wide-sm m-auto">
                <h3>Recent Data</h3>
                <div class="table-responsive">
                  <table id="myTable" class="display">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th><span>Ttitle</span></th>
                        <th><span>Price</span></th>
                        <th><span>Description</span></th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $sql = query_sql("SELECT * FROM $taxi_type ORDER BY id DESC");
                      if (mysqli_num_rows($sql) > 0) {
                        $c = 0;
                        while ($row = mysqli_fetch_assoc($sql)) { ?>
                          <tr>
                            <td><?php print $c + 1; ?></td>
                            <td><?php print $row['title']; ?></td>
                            <td class="text-success">€<?php print number_format($row['price']); ?></td>
                            <td><?php print $row['description']; ?></td>
                            <td><?php print $row['date']; ?></td>
                            <td><a href="edit-taxi?id=<?php print $row['id']; ?>"><i class="btn btn-primary icon ni ni-edit"></i></a></td>
                            <td><a data-toggle="modal" href="#myModalWWW<?php print $row['id']; ?>"><i class="btn btn-danger icon ni ni-trash"></i></a></td>

                            <!-- Modal -->
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalWWW<?php print $row['id']; ?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Delete Item?</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure you want to delete this item</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <a href="taxi-type?del=<?php print $row['id']; ?>">
                                      <span class="btn btn-danger">Delete</span>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- modal -->
                          </tr>

                        <?php $c++;
                        }
                      } else { ?>
                        <tr>
                          <td colspan="5">
                            <h3>No data found!</h3>
                          </td>
                        </tr>

                      <?php } ?>


                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content @e -->
        <?php require_once('footer.php'); ?>