<?php 
include('include/header.php');
include('include/navbar.php');
?>

<div class= "card shadow mb-4">
    <div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary"> Edit client infos</h6>
</div>
<div class="card-body">
<?php
require '../connection.php';

if(isset($_POST['edit_btn'])) {

    $id = $_POST['edit_id'];

    $query = "SELECT * FROM `admin` WHERE id='$id' ";
    $query_run = mysqli_query($database, $query);

    foreach($query_run as $row) {
        ?>
 
    <form action="clientinfo_backend.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
        <div class="form-group">
        <label>HOSPITAL NAME</label>
        <input type="text" name="edit_hospitalName" value="<?php echo $row['hosname']?>" class="form-control" placeholder="hospital name">
        </div>
        <div class="form-group">
        <label>AVS</label>
        <input type="text" name="edit_avs" value="<?php echo $row['avs']?>" class="form-control" placeholder="avs">
        </div>
        <div class="form-group">
        <label>DVS</label>
        <input type="text" name="edit_dvs" value="<?php echo $row['dvs']?>" class="form-control" placeholder="dvs">
        </div>
        <div class="form-group">
        <label>USERTYPE</label>
        <input type="text" name="edit_usertype" value="<?php echo $row['usertype']?>" class="form-control" placeholder="usertype">
        </div>
        <a href="Clientsinfo.php" class="btn btn-danger" >CANCEL</a>
        <button  type="submit" name="updatebtn" class="btn btn-primary" >update</button>
    </fom>
    <?php
    }
}
?>
</div>

<?php
include('include/scripts.php');
include('include/footer.php');
?>