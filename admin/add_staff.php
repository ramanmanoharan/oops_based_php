<?php require('../config/function.php');
$staff= new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include_once('include/header.php');


?>
<div class="container">
    <div class="card">
        <div class="header ml-5 w-50 bg-light text-dark p-3 shadow rounded" style="margin-top:-30px;">+ ADD STAFF <a href="add_staff.php" class="text-dark float-right"><i class="fas fa-sync-alt mr-2"></i>Refresh</a></div>
       <div class="col-lg-8 mx-auto">
          
          <?php 
           if(isset($_POST['add'])){
               $name = $_POST['s_name'];
               $email = $_POST['s_email'];
               $phone = $_POST['s_phone'];
               $address = $_POST['s_address'];
               $aadhar = $_POST['s_aadhar'];
               
               $insert= $staff->insertData("INSERT INTO staff(s_name, s_email, s_phone, s_address, s_aadhar) value('$name','$email','$phone','$address','$aadhar')");
               
               if($insert):
        
           ?>
           <div class="alert alert-success my-3">Staff Successfully Added <a href="manage_staff.php" class="text-info"><strong>click here</strong></a> to manage</div><?php else: ?>
           <div class="alert alert-danger my-3">Something Went Wrong. Please try again</div><?php endif; } ?>
            <form action="" class="mt-5" method="post">
            <div class="form-row mb-3">
                <label for="" class="col-3">Staff Name</label>
                <input type="text" name="s_name" class="form-control col">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Phone No</label>
                <input type="tel" name="s_phone" class="form-control col">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Email Id</label>
                <input type="email" name="s_email" class="form-control col">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Full Address</label>
                <input type="text" name="s_address" class="form-control col">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Aadhar No </label>
                <input type="text" name="s_aadhar" class="form-control col">
            </div>
            <input type="submit" value="+ADD" name="add" class="btn btn-block btn-info">
        </form>
       </div>
    </div>
</div>







<?php include('include/footer.php'); ?>