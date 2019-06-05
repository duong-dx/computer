<?php
	include_once('views/layout/header.php'); ?>
<div style="margin-bottom: 5%;" class="card">
    <div class="box">
        <div class="img">
            <img src="public/images/employee/<?php echo $employee['avatar']; ?>">
        </div>
        <h2><span><?php echo $employee['name']; ?></span></h2>
        <?php if($employee['gender']==true){
            ?>
            <p>Giới tính : <i class="fas fa-male" style="color:blue; font-size: 20px;"></i></p>
            <?php 
        } 
            else{
                ?>
                 <p>Giới tính :<i class="fas fa-female" style="color:pink; font-size: 20px;"></i></p>
                 <?php 
                }
        ?>
        <p> <?php echo $employee['mobile']; ?></p>
        <p> <?php echo $employee['address']; ?></p>
        <p> <?php echo $employee['email']; ?></p>
        <span>
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </span>
    </div>
</div>
<?php include_once('views/layout/footer.php'); ?>