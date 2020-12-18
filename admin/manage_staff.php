<?php require('../config/function.php');
$staff = new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include('include/header.php'); ?>

<div class="container">
    <div class="card">
        <div class="header ml-5 w-50 bg-dark text-light p-3 rounded shadow" style="margin-top:-30px;">Manage Staff <a href="manage_staff.php" class="text-light float-right"><i class="fas fa-sync-alt mr-2"></i>Refresh</a></div>
            <table class="table table-borderless mt-4 table-hover">
               <tr class="table-danger">
                   <th>Sr No.</th>
                   <th>Staff Name</th>
                   <th>Staff Id</th>
                   <th>Phone</th>
                   <th>Email</th>
                   <th>Address</th>
                   <th>Aadhar No.</th>
                   <th>Action</th>
               </tr>
               <?php $call = $staff->getData("SELECT * FROM staff");
                $sr= 1;
                foreach($call as $row): ?>
                <tr>
                    <td><?= $sr; ?></td>
                    <td><?= $row['s_name']; ?></td>
                    <td><?= $row['staff_id']; ?></td>
                    <td><?= $row['s_phone']; ?></td>
                    <td><?= $row['s_email']; ?></td>
                    <td><?= $row['s_address']; ?></td>
                    <td><?= $row['s_aadhar']; ?></td>
                    <td><a href="edit_staff.php?staff_id=<?= $row['staff_id']; ?>" class="text-primary mr-2">Edit</a><a href="manage_staff.php?delete=<?= $row['staff_id']; ?>" class="text-danger">Delete</a></td>
                </tr>
                <?php $sr += 1; endforeach; ?>
            </table>
        </div>
    </div>




<?php include('include/footer.php'); 
if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];
    
    $query = $staff->deleteData("staff","staff_id='$del_id'");
    if($query){
        redirect('manage_staff');
    }
    else{
        alert('something Went Wrong');
    }
        
        
}

?>