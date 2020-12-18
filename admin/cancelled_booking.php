<?php require('../config/function.php');
$booking = new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include('include/header.php'); ?>
<div class="container">
    <div class="card">
        <div class="header ml-5 w-50 bg-dark text-light p-3 rounded shadow" style="margin-top:-30px;">Cancelled Booking <a href="cancelled_booking.php" class="text-light float-right"><i class="fas fa-sync-alt mr-2"></i>Refresh</a></div>
            <table class="table table-borderless mt-4 table-hover">
               <tr class="table-danger">
                   <th>Sr No.</th>
                   <th>Connection No</th>
                   <th>Booking No</th>
                   <th>Consumer Name</th>
                   <th>Consumer Mobile no</th>
                   <th>Status</th>
                   <th>Action</th>
               </tr>
               <?php $call = $booking->getData("SELECT * FROM booked WHERE status='1'");
                if(!$call): ?>
                <tr>
                    <td colspan="6" class="text-danger h6">No records found</td>
                </tr>
                                
                <?php
                else:
                $sr= 1;
                foreach($call as $row):
               
                ?>
                
                <tr>
                    <td><?= $sr; ?></td>
                    <td><?= $row['connection_id']; ?></td>
                    <td><?= $row['booking_no']; ?></td>
                    <td><?= $row['c_name']; ?></td>
                    <td><?= $row['c_phone']; ?></td>
                    <td><span class="badge badge-danger badge-pill p-2">Cancelled</span></td>
                    <td><a href="view_booking_details.php?view_details=<?= $row['booking_no']; ?>" class="btn btn-info">Action</a></td>
                </tr>
                <?php $sr += 1; endforeach;endif; ?>
            </table>
        </div>
    </div>







<?php
include('include/footer.php'); ?>