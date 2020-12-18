<?php 
require('../config/function.php'); 
$profile = new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}
$u_id = $_SESSION['user_login'];
include('include/header.php');

$call = $profile->getData("SELECT * FROM user WHERE user_id = '$u_id'");
foreach($call as $row);
?>
<div class="container px-5 pb-5">
   <?php if($row['gender'] == "" || $row['dob'] == "" || $row['r_address']== "" || $row['city']==""): ?>
   <div class="alert alert-danger mb-5">Please Complete Your profile to access Full control
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div><?php endif; ?>
    <div class="card border-0 shadow pb-5">
        <div class="header  col-lg-6 bg-danger h4 font-weight-light p-3 shadow text-light rounded ml-5" style="margin-top:-30px;">Profile</div>

    <div class="col-lg-8  mx-auto">
               <div class="  bg-dark  carousel-inner " style="border-radius:50%;width:140px; height:140px; margin-left:130px;">
                  <img src="images/<?= $row['p_image']; ?>" class="img-fluid" alt="">
                   <div class="carousel-caption ">
         <a href="" class="text-danger" data-toggle="modal" data-target="#myModal">Change</a>
      </div> 
               </div>
              
        <table class="table mx-auto table-borderless ">
            <tr>
                <th>Name</th>
                <td><?= $row['f_name']; ?></td>
            </tr><tr>
                <th>Email</th>
                <td><?= $row['email']; ?></td>
            </tr><tr>
                <th>Phone</th>
                <td><?= $row['mobile']; ?></td>
            </tr><tr>
                <th>Gender</th>
                <td><?= $row['gender']; ?></td>
            </tr><tr>
                <th>Date of birth</th>
                <td><?= $row['dob']; ?></td>
            </tr><tr>
                <th>Address</th>
                <td><?= $row['r_address']; ?></td>
            </tr><tr>
                <th>City</th>
                <td><?= $row['city']; ?></td>
            </tr><tr>
                <th>Zip Cpde</th>
                <td><?= $row['zipcode']; ?></td>
            </tr>
            
        </table>
        <a href="profile_update.php" class="btn btn-info " style="margin-left:170px;" >edit</a>
    </div>
    </div>
</div>

<?php

if(isset($_POST['update'])):
$image = $_FILES['p_image']['name'];
$tmp_image = $_FILES['p_image']['tmp_name'];

    move_uploaded_file($tmp_image,"images/$image");

$update=$profile->updateData("UPDATE user SET p_image='$image' WHERE user_id='$u_id'");
if($update){
    redirect('profile');
}
else{
    alert('something went wrong');
} endif;
?>
<form action="" method="post" enctype="multipart/form-data">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title">Select Profile Image</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-row">
            <label for="" class="col-4">Select Image</label>
            <input type="file" name="p_image" class="form-control col">
        </div>
        <input type="submit" value="update" name="update" class="btn btn-success btn-block mt-3">
      </div>
      
    </div>

  </div>
</div>
</form>
<?php
include('include/footer.php'); ?>