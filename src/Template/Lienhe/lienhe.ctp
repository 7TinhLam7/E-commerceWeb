
<?php
echo $this->Html->css('style.css'); 
?>
</div>
</div>
<!-- /banner_bottom_agile_info -->
<div class="col-sm-12" style="background-color: black;height: 200px;text-align: center;" >
  <br>
  <br>
  <h2 class="centered" align="center" style="color: white">Hãy Kết Nối Cùng Chúng Tôi
  </h2>
</div>
<div class="clearfix"> </div>
<div style="background-color: white">
 <!--/contact-->
 <div class="banner_bottom_agile_info" >  
  <div class="container">
    <div class="contact-grid-agile-w3s">
      <div class="col-md-4 contact-grid-agile-w3">
        <div class="contact-grid-agile-w31">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <h4>Địa Chỉ Liên Lạc</h4>
          <?php foreach ($ad as $ads) :?>
            <p style="color: white">  
              <?= h($ads->diachi);?>
            </p>
          <?php endforeach;?>
        </div>
      </div>

      <div class="col-md-4 contact-grid-agile-w3">
        <div class="contact-grid-agile-w32">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <h4>Hãy Gọi Cho Chúng Tôi</h4>
          <?php foreach ($ad as $ads) :?>
            <p style="color: white">  
              <?= h($ads->sdt);?>
            </p>
          <?php endforeach;?>
        </div>
      </div>

      <div class="col-md-4 contact-grid-agile-w3">
        <div class="contact-grid-agile-w33">
          <i class="fa fa-envelope-o" aria-hidden="true"></i>
          <h4>Email</h4>
          <?php foreach ($ad as $ads) :?>
            <p style="color: white">  
              <?= h($ads->email);?>
            </p>
          <?php endforeach;?>
        </div>
      </div>
      
      
    </div>
  </div>
</div>




<div class="col-md-6 contact-form" style="background-color: #78909c;float: right;margin-right: 200px">
  
  <h4 class="white-w3ls">Form Liên Hệ</h4>
  <div class="lienhe form large-9 medium-8 columns content">
    <?= $this->Form->create($lienhe) ?>
    <fieldset>
      <?php
      echo $this->Form->control('email',['label' => 'Email']);
      echo $this->Form->control('sdt',['label' => 'Số Điện Thoại']);
      echo $this->Form->control('noidung',['type' => 'textarea','rows' => '3', 'cols' => '65','label' => 'Nội Dung']);
      ?>
    </fieldset>
    <p style="text-align: right"> 
      <?= $this->Form->button(__('Gửi')) ?>
    </p>
    <?= $this->Form->end() ?>
  </div> 
</div>
<!--//contact-->
<!--/grids-->
<div class="coupons" style="margin-top:-40px;margin-left:100px  ">
  <div class="coupons-grids text-center">
    <div class="w3layouts_mail_grid">
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-money" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>Miễn Phí</h3>
          <p>Tất cả dịch vụ của chúng tôi đều miễn phí</p>
        </div>
      </div>
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-headphones" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>Hỗ Trợ 24/7</h3>
          <p>Được chăm sóc khách hàng là vinh dự của chúng tôi</p>
        </div>
      </div>
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-clock-o" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>Tiết Kiệm Thời Gian</h3>
          <p>Thời gian là tiền bạc, tiết kiệm tối thời gian tìm kiếm của bạn</p>
        </div>
      </div>
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>Đơn Giản</h3>
          <p>Đơn giản hoá các thao tác, phù hợp với nhiều đối tượng khách hàng </p>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>

  </div>
</div>
<!--grids-->
</div>
