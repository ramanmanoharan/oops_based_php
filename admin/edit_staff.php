<?php require('../config/function.php');
$staff= new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include_once('include/header.php');
$s_id = $_GET['staff_id'];

$call = $staff->getData("SELECT * FROM staff WHERE staff_id='$s_id'");
foreach($call as $row); 

?>
<div class="container">
    <div class="card border-0 shadow">
        <div class="header ml-5 w-50 bg-light text-dark p-3 shadow rounded" style="margin-top:-30px;">Update STAFF Details <a href="" class="text-info float-right">Refresh</a></div>
       <div class="col-lg-8 mx-auto">
          
          <?php 
           if(isset($_POST['update'])){
               $name = $_POST['s_name'];
               $email = $_POST['s_email'];
               $phone = $_POST['s_phone'];
               $address = $_POST['s_address'];
               $aadhar = $_POST['s_aadhar'];
               
               $update= $staff->updateData("UPDATE staff SET s_name='$name', s_email='$email', s_phone='$phone', s_address='$address', s_aadhar='$aadhar' WHERE staff_id='$s_id'" );
               
               if($update):
        
           ?>
           <div class="alert alert-success my-3">Staff Record Successfully Updated <a href="manage_staff.php" class="text-info"><strong>click here</strong></a> to manage</div><?php else: ?>
           <div class="alert alert-danger my-3">Something Went Wrong. Please try again</div><?php endif; } ?>
            <form action="" class="mt-5" method="post">
            <div class="form-row mb-3">
                <label for="" class="col-3">Staff Id</label>
                <input type="text" name="s_name" class="form-control col" value="<?= $row['staff_id']; ?>" disabled>
            </div>
               <div class="form-row mb-3">
                <label for="" class="col-3">Staff Name</label>
                <input type="text" name="s_name" class="form-control col" value="<?= $row['s_name']; ?>">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Phone No</label>
                <input type="tel" name="s_phone" class="form-control col" value="<?= $row['s_phone']; ?>">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Email Id</label>
                <input type="email" name="s_email" class="form-control col" value="<?= $row['s_email']; ?>">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Full Address</label>
                <input type="text" name="s_address" class="form-control col" value="<?= $row['s_address']; ?>">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3">Aadhar No </label>
                <input type="text" name="s_aadhar" class="form-control col" value="<?= $row['s_aadhar']; ?>">
            </div>
            <input type="submit" value="+ADD" name="update" class="btn btn-block btn-info">
        </form>
       </div>
    </div>
</div>







<?php include('include/footer.php'); ?>