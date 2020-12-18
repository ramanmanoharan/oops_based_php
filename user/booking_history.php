<?php include('../config/function.php'); 
$booking =new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}
include('include/header.php');?>
 <?php 
$u_id= $_SESSION['user_login'];
$call = $booking->getData("SELECT * FROM user WHERE user_id= '$u_id'");
foreach($call as $row);

if($row['gender'] == "" || $row['dob'] == "" || $row['r_address']== "" || $row['city']==""): ?>
 <div class="container">
     <div class="alert alert-danger"><strong></strong>First of all complete Your <a href="profile.php" class="text-info">profile</a> Details </div>
 </div>
 <?php else: ?>

<div class="col-lg-12">
    <div class="card border-0 shadow">
       <div class="header col-lg-10 mx-auto p-3 text-light text-center rounded bg-warning shadow " style="margin-top:-30px;">Booking History</div>
        <table class="table table-bordered table-hover mt-5 ">
            <tr>
                <th>Sr no.</th>
                <th>Booking No</th>
                <th>Name</th>
                <th>Refill Size</th>
                <th>Booking Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php $call = $booking->getData("SELECT * FROM booked WHERE user_id = '$u_id'");
            $sr =1;
            foreach($call as $row): ?>
            <tr>
                <td><?= $sr; ?></td>
                <td><?= $row['booking_no']; ?></td>
                <td><?= $row['c_name']; ?></td>
                <td><?= $row['refill_size']; ?></td>
                <td><?= $row['booking_time']; ?></td>
                <td><?php
                    if($row['status'] == ""): ?>
                    <span class="badge badge-danger badge-pill p-2">Pending</span><?php elseif($row['status']=="1"): ?>
                    <span class="badge badge-danger badge-pill p-2">cancelled</span><?php elseif($row['status_1']==""): ?>
                    <span class="badge badge-success badge-pill p-2">Confirmed</span><?php elseif($row['status_2']==""): ?>
                    <span class="badge badge-secondary badge-pill p-2">On the way</span><?php else: ?>
                    <span class="badge badge-success badge-pill p-2">Delivered</span><?php endif; ?>
                </td>
                <td><a href="view_booking_history.php?booking_no=<?= $row['booking_no']; ?>" class="text-info">view</a></td>
<?php $sr += 1; endforeach; ?>
        </table>
    </div>
</div>










<?php
endif; include('include/footer.php');?>