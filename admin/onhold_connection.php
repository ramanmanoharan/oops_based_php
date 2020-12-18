<?php require('../config/function.php');
$connection = new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include('include/header.php'); ?>

<div class="container">
    <div class="card">
        <div class="header ml-5 w-50 bg-warning text-light p-3 rounded shadow" style="margin-top:-30px;">Onhold Connection <a href="onhold_connection.php" class="text-light float-right"><i class="fas fa-sync-alt mr-2"></i>Refresh</a></div>
            <table class="table table-borderless mt-4 table-hover">
               <tr class="table-danger">
                   <th>Sr No.</th>
                   <th>Request No</th>
                   <th>Name</th>
                   <th>Phone</th>
                   <th>Email</th>
                   <th>Status</th>
                   <th>Action</th>
               </tr>
               <?php                 
               
                
                
                $call = $connection->getData("SELECT * FROM connection WHERE status='0'");
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
                    <td><?= $row['full_name']; ?></td>
                    <td><?= $row['phone']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><span class="badge badge-warning badge-pill">Onhold</span></td>
                    <td><a href="connection_details.php?view_details=<?= $row['connection_id']; ?>" class="btn btn-info">Action</a></td>
                </tr>
                <?php $sr += 1; endforeach; endif;?>
                
            </table>
            
        </div>
    </div>
    
   <?php include_once('include/footer.php'); ?>