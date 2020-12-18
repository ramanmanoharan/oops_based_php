<?php

require('../config/function.php');
$profile = new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}

$u_id = $_SESSION['user_login'];
$call = $profile->getData("SELECT * FROM user WHERE user_id='$u_id'");
foreach($call as $row);
include('include/header.php');


if(isset($_POST['update'])):
$name= $_POST['name'];
$phone= $_POST['phone'];
$gender= $_POST['gender'];
$dob= $_POST['dob'];
$address= $_POST['address'];
$city= $_POST['city'];
$zipcode= $_POST['zipcode'];
$update = $profile->updateData("UPDATE user SET f_name='$name', mobile='$phone', gender='$gender', dob='$dob', r_address='$address', city='$city', zipcode='$zipcode' WHERE user_id='$u_id'");

if($update){
?>
<div class="alert alert-success mb-5">Profile Successfully Updated</div><?php }else{ ?>
<div class="alert alert-success mb-5">Something Went Wrong</div><?php } endif; ?>
<div class="container">
    <div class="card">
        <div class="header mx-auto col-lg-10 bg-dark text-light rounded p-3 shadow" style="margin-top:-30px;">Profile Update <a href="" class="float-right text-light">Refresh</a></div>
        <div class="col-lg-8 mx-auto mt-5">
        <form action="" class="mx-auto" method="post">
            <div class="form-row mb-3">
               <label for="" class="col-3">Name</label>
                <input type="text" name="name" class="col form-control" value="<?= $row['f_name']; ?>">
            </div><div class="form-row mb-3">
               <label for="" class="col-3">Email</label>
                <input type="text" name="email" class="col form-control" value="<?= $row['email']; ?>" disabled>
            </div><div class="form-row mb-3">
               <label for="" class="col-3">Phone</label>
                <input type="text" name="phone" class="col form-control" value="<?= $row['mobile']; ?>">
            </div><div class="form-row mb-3">
               <label for="" class="col-3">Gender</label>
               <select name="gender" id="" class="form-control col">
                   <option value="" selected disabled hidden>Select Gender</option>
                   <option value="male">Male</option>
                   <option value="female">Female</option>
                   <option value="other">Other</option>
               </select>
            </div><div class="form-row mb-3">
               <label for="" class="col-3">Date of Birth</label>
                <input type="date" name="dob" class="col form-control" value="<?= $row['dob']; ?>">
            </div><div class="form-row mb-3">
               <label for="" class="col-3">Address</label>
                <input type="text" name="address" class="col form-control" value="<?= $row['r_address']; ?>">
            </div><div class="form-row mb-3">
               <label for="" class="col-3">City</label>
                <input type="text" name="city" class="col form-control" value="<?= $row['city']; ?>">
            </div><div class="form-row mb-3">
               <label for="" class="col-3">Zip Code</label>
                <input type="text" name="zipcode" class="col form-control" value="<?= $row['zipcode']; ?>">
            </div>
                    <input type="submit" name="update" class="btn btn-success btn-block" value="update">

        </form>
        </div>
    </div>
</div>





<?php
include('include/footer.php');?>