<?php require('../config/function.php');
$user =new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include('include/header.php'); ?>


<div class="container">
    <div class="card">
        <div class="header ml-5 w-50 bg-dark text-light p-3 rounded shadow" style="margin-top:-30px;">Registered Users <a href="reg_users.php" class="text-light float-right"><i class="fas fa-sync-alt mr-2"></i>Refresh</a></div>
        <div class="container mt-5">
            <table class=" table table-hover table-borderless">
                <tr class="table-primary">
                    <th>Sr no.</th>
                    <th>Request No</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                </tr>
                <?php $call =$user->getData("SELECT * FROM user");
                $sr =1;
                foreach($call as $row): ?>
                
                <tr>
                    <td><?= $sr; ?></td>
                    <td>
                    <?php $request= $user->getData("SELECT * FROM connection INNER JOIN user ON user.user_id=connection.user_id");
                        foreach($request as $value); ?>
                        <?= $value['connection_id']; ?>
                    

                    </td>
                    <td><?= $row['f_name']; ?></td>
                    <td><?= $row['mobile']; ?></td>
                    <td><?= $row['email']; ?></td>
                </tr><?php $sr +=1; endforeach; ?>
            </table>
        </div>
    </div>
</div>



<?php include('include/footer.php');
?>