<?php require('../config/function.php'); 
$report = new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}

include('include/header.php'); ?>

<div class="container">
    <div class="card">
        <div class="header ml-5 p-3 rounded w-75 bg-info text-light shadow " style="margin-top:-30px;">All reports<a href="all_report.php" class="text-light float-right"><i class="fas fa-sync-alt mr-2"></i>Refresh</a></div>
        <div class="container mt-3">
            <form action="" method="get" class="form-inline float-right">
              <div class="input-group">
  <input type="text" class="form-control rounded-0" name="search" placeholder="Search by booking no" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <input type="submit" value="search" name="find" class="btn btn-danger rounded-0">
  </div>
</div>  
            </form>
        </div>
        <div class="container">
        <div class="card border-0">
        
            <table class="table table-borderless mt-4 table-hover">
               <tr class="table-info">
                   <th>Sr No.</th>
                   <th>Connection No</th>
                   <th>Booking No</th>
                   <th>Consumer Name</th>
                   <th>Consumer Mobile no</th>
                   <th>Status</th>
                   <th>Action</th>
               </tr>
               <?php 
                if(isset($_GET['find'])):
                $search = $_GET['search'];
                
                $call= $report->getData("SELECT * FROM booked WHERE booking_no LIKE '%$search%'");
                else:
                
                $call = $report->getData("SELECT * FROM booked ORDER BY booking_no DESC");
                endif;
                $sr= 1;
                foreach($call as $row):
               
                ?>
                
                <tr>
                    <td><?= $sr; ?></td>
                    <td><?= $row['connection_id']; ?></td>
                    <td><?= $row['booking_no']; ?></td>
                    <td><?= $row['c_name']; ?></td>
                    <td><?= $row['c_phone']; ?></td>
                    <td>
                    <?php if($row['status']=="1"): ?>
                    <span class="badge badge-danger badge-pill p-2">cancelled</span>
                    <?php elseif($row['status_1']==""): ?>
                    <span class="badge badge-success badge-pill p-2">Confirmed</span><?php elseif($row['status_2']==""): ?>
                    <span class="badge badge-secondary badge-pill p-2">On the way</span><?php else: ?>
                    <span class="badge badge-success badge-pill p-2">Delivered</span><?php endif; ?>
                    
                    </td>
                    <td><a href="view_booking_details.php?view_details=<?= $row['booking_no']; ?>" class="btn btn-info">view</a></td>
                </tr>
                <?php $sr += 1; endforeach; ?>
            </table>
        </div>    
        </div>
    </div>
</div>











<?php include('include/footer.php'); ?>