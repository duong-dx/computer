<?php require_once('views/layout_user/header_user.php'); 
if(isset($_COOKIE['editkhtc'])){ 
 ?>
 <script type="text/javascript">
    toastr["success"]("Chỉnh sửa thông tin khách hàng thành công !", "Thông báo :");
</script>
<?php

}
if(isset($_COOKIE['themkhtc'])){ 
            ?>
            <script type="text/javascript">
                toastr["success"]("Thêm mới nhân viên thành công !", "Thông báo :");
            </script>
            <?php

        }?>

        <!-- nhu facebook -->
    <div class="row">
        <header class="site-header"></header>
        <div style="margin-top: 5%;" class="cover-photo"><img style="width: 100%;height: 100%;" src="public/images/customer/anhbia.jpg" alt=""/></div>
        <div class="body">
          <section class="left-col user-info">
            <div class="profile-avatar">
              <div class="inner"><img style="width: 100%;height: 100%;" src="public/images/customer/<?php echo $customer_online['avatar']; ?>" alt=""/></div>
          </div>
          <h1><?php echo $customer_online['name']; ?></h1>
          <div class="meta">
              <p><i class="fa fa-fw fa-map-marker"></i><?php echo $customer_online['address']; ?></p>
              <p><i class="fa fa-fw fa-link"></i> paledivision.com</p>
              <p><i class="fa fa-fw fa-clock-o"></i> Joined Dec 26, 2008</p>
          </div>
      </section>
      <section class="section center-col content">

        <!-- Nav -->
        <nav class="profile-nav">
          <ul>
            <li class="active">Activity</li>
            <li>Looks</li>
            <li>Hyped</li>
            <li>Loved</li>
            <li>Collections</li>
        </ul>
    </nav>
    
    <!-- Wil hyped X-->
    <div style="text-align: left;margin: 5%;" class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h1>profile</h1>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $customer_online['id']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $customer_online['name']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $customer_online['email']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $customer_online['mobile']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $customer_online['address']; ?></p>
                                    </div>
                                </div>
                                
                            </div>
</section>
<section class="right-col">
    <h3>Mời quảng cáo</h3>

</section>
<a href="?mod=sale_online&act=update_profile&customer_code=<?php echo $customer_online['id']; ?>" class="btn btn-success">Update</a>
</div>
</div>
<?php require_once('views/layout_user/footer_user.php'); ?>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/67239/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="//use.typekit.net/psm0wvc.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>