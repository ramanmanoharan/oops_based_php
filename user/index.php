<?php 
require_once('../config/function.php');
$index= new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}
$id = $_SESSION['user_login'];
$call = new Ogbs();
$query = $call->getData("SELECT * FROM user WHERE user_id= '$id'");
foreach($query as $row);
include('include/header.php'); ?>

<div class="container">
    <h4 class="font-weight-light text-light bg-info p-2 shadow" style='border-radius:5px;'>WELCOME TO ONLINE GAS BOOKING FACILITY</h4>
 </div>
 <?php if($row['gender'] == "" || $row['dob'] == "" || $row['r_address']== "" || $row['city']==""): ?>
 <div class="container">
     <div class="alert alert-danger"><strong></strong>First of all complete Your <a href="profile.php" class="text-info">profile</a> Details </div>
 </div>
 <?php else: ?>
 <div class="container-fluid mt-5">
     <div class="row">
    <div class="col-lg-8 mb-5">
        <div class="card border-0 shadow">
            <div class="card-body row" >
                <div class=" col-lg-3 col-sm-6 col-md-3 col-xs-3 mx-auto p-0"  >
                    <div class="header bg-light rounded shadow" style="margin-top:-50px; height:180px;"><img src="images/<?= $row['p_image']; ?>" alt="" style=" border-radius:4px;" class="img-fluid h-100 rounded img-responsive">
                    
                    </div>
                </div>
                <div class="col-lg-8 col-sm-6 col-md-8 col-xs-8 mb-5"><h4 class="text-dark font-weight-light">Profile Details </h4><hr>
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>Name</th>
                        <td><?= $row['f_name']; ?></td> </tr>
                       <tr><th>Email</th>
                           <td><?= $row['email']; ?></td></tr>
                      <tr><th>Phone</th>
                          <td><?= $row['mobile'] ; ?></td></tr>
                          <tr><th>Gender</th>
                          <td><?= $row['gender'] ; ?></td>
                          </tr><tr><th>Address</th>
                          <td><?= $row['r_address'] ; ?>
                          </td></tr><tr><th>City</th>
                          <td><?= $row['city'] ; ?></td></tr>
                   
                </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow border-0" style="min-height:458px;height:auto;">
            <div class="header w-75 ml-4 rounded bg-info text-light p-2 shadow" style="margin-top:-21px;"><i class="fas fa-bell mr-2"></i>Notifications</div>
            <div class="container-fluid mt-5 p-1">
               <?php $call = $index->getData("SELECT * FROM booked WHERE DATE(response_time) = DATE(NOW()) AND user_id='$id'");
                foreach($call as $value): 
                if($value['status']=="0" || $value['status']=="1"):
                ?>
                
                <?php
                    if($value['status'] == ""): ?>
                    <div class="alert alert-warning p-2">Your Refill <strong>Booking no:<?= $value['booking_no']; ?></strong> is Pending , <strong><a href="view_booking_history.php?booking_no=<?= $value['booking_no']; ?>" class="text-warning">Click Here</a></strong> to check status.</div>
                    <?php elseif($value['status']=="1"): ?>
                    
                    <div class="alert alert-danger p-2">Your Refill <strong>Booking no: <?= $value['booking_no']; ?></strong> is cancelled, <strong><a href="view_booking_history.php?booking_no=<?= $value['booking_no']; ?>" class="text-danger">Click Here</a></strong> to check status.</div>
                    <?php elseif($value['status_1']==""): ?>
                    
                    <div class="alert alert-info p-2">Your Refill <strong>Booking no:<?= $value['booking_no']; ?></strong> is confirmed, <strong><a href="view_booking_history.php?booking_no=<?= $value['booking_no']; ?>" class="text-info">Click Here</a></strong> to check status.</div>
                    <?php elseif($value['status_2']==""): ?>
                    
                    <div class="alert alert-secondary  p-2">Your Refill <strong>Booking no:<?= $value['booking_no']; ?></strong> is on the way, <strong><a href="view_booking_history.php?booking_no=<?= $value['booking_no']; ?>" class="text-dark">Click Here</a></strong> to check status.</div>
                    <?php else: ?>
                    
                    
                    <div class="alert alert-success p-2">Your Refill <strong>Booking no:<?= $value['booking_no']; ?></strong> is Successfully Deliverd, <strong><a href="view_booking_history.php?booking_no=<?= $value['booking_no']; ?>" class="text-success">Click Here</a></strong> to check status.</div><?php endif; ?>
                <?php endif; endforeach; ?>
            </div>
        </div>
    </div>
</div>
 </div>

<?php endif; include('include/footer.php'); ?>