<?php require('../config/function.php');
$report= new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}

include('include/header.php'); ?>
<div class="container">
    <div class="card"><div class="header ml-5 w-50 bg-info text-light rounded p-3" style="margin-top:-30px;">Search <a href="search.php" class="text-light float-right"><i class="fas fa-sync-alt mr-2"></i>Refresh</a></div>
    <div class="container my-4">
        <form action="" class="form-inline" method="get">
            <div class="input-group col-lg-8 mx-auto">
                
                 <input type="search" name="search" class="form-control rounded-0" placeholder="Search by Booking no / connection_no">
                 <div class="input-group-append">
                <input type="submit" value="Search" name="find" class="btn btn-info rounded-0 ml">
                 </div>
            </div>
               
            
        </form>
    </div>
   <?php 
                if(isset($_GET['find'])):
                $search =$_GET['search'];
                
                $call= $report->getData("SELECT * FROM booked WHERE booking_no LIKE '%$search%' OR connection_id LIKE '%$search%'");
                $sr= 1; ?>
                
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
               
                <?php foreach($call as $row): ?>
                
                <tr>
                    <td><?= $sr; ?></td>
                    <td><?= $row['connection_id']; ?></td>
                    <td><?= $row['booking_no']; ?></td>
                    <td><?= $row['c_name']; ?></td>
                    <td><?= $row['c_phone']; ?></td>
                    <td>
                    <?php if($row['status_1']==""): ?>
                    <span class="badge badge-success badge-pill p-2">Confirmed</span><?php elseif($row['status_2']==""): ?>
                    <span class="badge badge-secondary badge-pill p-2">On the way</span><?php else: ?>
                    <span class="badge badge-success badge-pill p-2">Delivered</span><?php endif; ?>
                    
                    </td>
                    <td><a href="view_booking_details.php?view_details=<?= $row['booking_no']; ?>" class="btn btn-info">view</a></td>
                </tr>
                <?php $sr += 1; endforeach; ?>
            </table>
        </div>    
        </div><?php else: endif; ?>
</div>

</div>



<?php include('include/footer.php'); ?>