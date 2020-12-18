<?php 
require('../config/function.php');
require('include/header.php'); 
if($_SESSION['admin_login']):
$setting= new Ogbs();

if(isset($_POST['update'])){
$confirm_password = $_POST['confirm_pass'];
$current_password = $_POST['current_pass'];
$id = $_SESSION['admin_login'];
$call = $setting->getData("SELECT * FROM admin WHERE  password = '$current_password'");
foreach($call as $row);

$update_pass = $setting->updateData("UPDATE admin SET password = '$confirm_password'");


if($update_pass){
?>

<div class="container alert alert-success mx-auto">Password Successfully updated
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php }else{ ?>

<div class="container alert alert-danger mx-auto">Something went wrong !
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php }} ?>

<div class="col-lg-12 mt-5">
    <div class="card">
       <div class="header p-3 bg-dark text-light mx-auto" style="width:95%; border-radius:5px; margin-top:-30px;">Change Password </div>
        <div class="card-body mt-5">
            <form class="form" method="post">
                <div class="form-group row">
                    <label for="" class="col-lg-3">Current Password :</label>
                    <input type="text" name="current_pass" class="form-control col-lg-9" placeholder="enter current password" required>
                </div>
                   <div class="form-group row">
                    <label for="" class="col-lg-3">New Password :</label>
                    <input type="password" name="new_pass" class="form-control col-lg-9" required>
                </div>
                   <div class="form-group row">
                    <label for="" class="col-lg-3">Confirm Password :</label>
                    <input type="password" name="confirm_pass" class="form-control col-lg-9" required>
                </div>
                <input type="submit" class="btn btn-info " style="margin-left:45%;" name="update" value="change Password">
            </form>
        </div>
    </div>
</div>

<?php require('include/footer.php'); else: redirect('login'); endif; ?>