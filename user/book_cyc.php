<?php 
require('../config/function.php');
include('include/header.php'); 
$get = new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}


?>

<!---->
 <?php 
$u_id= $_SESSION['user_login'];
$call = $get->getData("SELECT * FROM user WHERE user_id= '$u_id'");
foreach($call as $row);

if($row['gender'] == "" || $row['dob'] == "" || $row['r_address']== "" || $row['city']==""): ?>
 <div class="container">
     <div class="alert alert-danger"><strong></strong>First of all complete Your <a href="profile.php" class="text-info">profile</a> Details </div>
 </div>
 <?php else: ?>
 
 

<div class="col-lg-12">
    <div class="card shadow border-0 p-3">
       <div class="header bg-primary col-lg-10 mb-4 text-light text-center mx-auto rounded p-2 shadow" style="margin-top:-30px;">Book Cylinder</div>
        <table class="table-stripped table  table-boderless mt-3">
           <?php 
             ?>
            <tr class="table-info text-dark">
                <th>Sr no.</th>
                <th>Name</th>
                <th>Connection no</th>   
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            $call = $get->getData("SELECT * FROM connection WHERE user_id ='$u_id'");
            
            ?>
            <?php 
            if(!$call): ?>
            <tr>
                <td colspan="6" class="text-danger">No connection Found please add connection First</td>
            </tr>
            
            <?php else: ?>
            <?php 
            
            
            $sr= 1;
            foreach($call as $value): ?>
            <tr>
                <td><?= $sr; ?></td>
                <td><?= $value['full_name']; ?></td>
                <td><?= $value['connection_id']; ?></td>
                <td><?= $value['phone']; ?></td>
                <td><?= $value['email']; ?></td>
                <td>
                  <a href="book_cylinder.php?view=<?= $value['connection_id']; ?>" class=" ml-2 btn-info btn">Book</a>
                  
                </td>
            </tr>
            <?php $sr +=1; endforeach; endif;   ?>
        </table>
    </div>
</div>


<?php endif; include('include/footer.php'); 


?>