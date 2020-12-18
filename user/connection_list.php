<?php 
require('../config/function.php');
if(!isset($_SESSION['user_login'])){
    redirect('login');
}
include('include/header.php'); 

$get = new Ogbs();

$u_id = $_SESSION['user_login'];
$call = $get->getData("SELECT * FROM connection WHERE user_id = $u_id");
$sr= 1;

?>

 <?php 
$u_id= $_SESSION['user_login'];
$call = $get->getData("SELECT * FROM user WHERE user_id= '$u_id'");
foreach($call as $value);

if($value['gender'] == "" || $value['dob'] == "" || $value['r_address']== "" || $value['city']==""): ?>
 <div class="container">
     <div class="alert alert-danger"><strong></strong>First of all complete Your <a href="profile.php" class="text-info">profile</a> Details </div>
 </div>
 <?php else: ?>

<div class="col-lg-12">
    <div class="card shadow border-0 p-3">
       <div class="header bg-primary col-lg-10 text-light text-center mx-auto rounded p-2 shadow" style="margin-top:-30px;">Manage Connection</div>
        <table class="table-stripped table  table-boderless mt-5">
           <?php 
            $u_id = $_SESSION['user_login'];
            $call = $get->getData("SELECT * FROM connection WHERE user_id = $u_id");
            $sr= 1;

            foreach($call as $row); ?>
            <tr class="table-dark text-dark">
                <th>Sr no.</th>
                <th>Name</th>
                <th>Request no</th>   
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            foreach($call as $row): ?>
            <tr>
                <td><?= $sr; ?></td>
                <td><?= $row['full_name']; ?></td>
                <td><?= $row['connection_id']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td>
                <?php
                    if($row['status'] == ""): ?>
                    <span class="badge badge-danger badge-pill p-2">Pending</span><?php elseif($row['status']=="0"): ?>
                    <span class="badge badge-warning badge-pill p-2">Onhold</span><?php elseif($row['status']=="1"):?><span class="badge badge-success badge-pill p-2">approved</span><?php elseif($row['status']=="2"): ?><span class="badge badge-danger badge-pill p-2">rejected</span> <?php endif; ?>
    
    </td>
                <td>
                  <a href="connection_details.php?view=<?= $row['connection_id']; ?>" class="text-primary ml-2" title="view"><i class="fas fa-eye"></i></a>
                  <?php if($row['status'] == ""): ?>
                   <a href="connection_edit.php?con_id=<?= $row['connection_id']; ?>" class="text-info ml-2" title="edit"><i class="fas fa-edit"></i></a>      
                   <a href="connection_list.php?del=<?= $row['connection_id']; ?>" class="text-danger ml-2" title="delete"><i class="fas fa-trash-alt"></i></a><?php else: endif; ?>  
                </td>
            </tr>
            <?php $sr +=1;  endforeach; ?>
        </table>
    </div>
</div>


<?php endif; include('include/footer.php'); 
if(isset($_GET['del'])){
    $d_id = $_GET['del'];
    
    $query = $get->deleteData("connection","connection_id='$d_id'");
    if($query){
        redirect('connection_list');
    }else{
        alert('something went wrong');
    }
}


?>