</div>
</div>

<div class="row" >

  <div class="col-md-3" style="background-color: white; margin-top: 20px;margin-left: 30px; margin-bottom: 20px;height:673px;">

   
    <div class="panel-body">
       <div class="media">
           <div align="center">
    <img src="../../<?php echo $user->hinhuser_dd.$user->hinhuser.$user->hinhmacdinh;?>" width="100" height="100">
           </div>
        <div class="media-body">
   <h3 align="center"><?= h($user->ho); ?> <?= h($user->ten); ?></h3>
   <h4 align="center"><a href="<?= $this->url->build(['action' =>'edittc',$userInfo["id"]]) ?>"><i class="fa fa-pencil" align="right"></i> Chỉnh Sửa</a></h4>
  
                        
                        
                      
                            <hr>
                            <h4 align="center"><strong><span class="glyphicon glyphicon-phone"></span> Điện Thoại</strong></h4>
                            <p align="center"> <?php echo $this->Number->format($user->sdt, [
                        'locale' => 'fr_FR']); ;?></p>
                            <hr>
                            <h4 align="center"><strong><span class="glyphicon glyphicon-map-marker"></span>Địa Chỉ</strong></h4>
                            <p align="center"><?= h($user->diachi); ?></p> 
                            <hr>
                            <h4 align="center"><strong><i class="fa fa-venus-mars"></i>Gender</strong></h4>
                            <p align="center"><?= $user->gioitinh ? __('Nữ') : __('Nam'); ?></p>
                            <hr>
                            <h4 align="center"><strong><i class="fa fa-user-secret"></i> Vai Trò</strong></h4>
                            <p align="center"><?= h($user->role->ten); ?></p>
                            <hr>
                            <h4 align="center"> <span class="glyphicon glyphicon-envelope"> </span> <strong>Email</strong></h4>
                            <p align="center"><?= h($user->email); ?></p>
                        </div>
                    </div>
                </div>
         
         </div>





 

<!-- end top -->
  <div class="col-md-8" style="background-color: white; margin-top: 20px;margin-left: 50px; margin-bottom: 20px; min-height:673px;">
    <div class="thumbnail" style="min-height:673px;">
   <h3 align="center"> Lịch Sử Đánh Giá </h3>
    <br>
    <br>
    <div class="row content" >
   

 <?php foreach($sp as $sps): ?> 
  
      <div class="col-sm-3">
        <div class="thumbnail" style="min-height: 250px">          
          <div class="caption" style="text-align: :center;height: 220px">
            <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $sps->sanpham->id]) ?>">  
              <img src="../../<?php echo $sps->sanpham->hinhsp_dd.$sps->sanpham->hinhsp;?>" style="height: 150px;width: 150px">
            </a>
           
    <h6 align="center" > <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $sps->sanpham->id]) ?>">  <?=h($sps->sanpham->ten) ; ?></a>
            </h6>
          </div>
<div class="ratings" align="center" style="margin-bottom: 0px">
    <div class="ratings">
    <p><?php
    switch ((int)$sps->sanpham->diemtb) {
                  case 0:
                  echo "Chưa có Đánh Giá";
                  break;
                  case 1:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 2:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 3:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 4:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 5:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 6:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 7:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 8:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 9:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  case 10:
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  echo "<i class='fa fa-star star' aria-hidden='true' ></i>";
                  break;
                  }   
                  ?></p>
                          <b align="center"> lượt xem <?=h($sps->sanpham->luotxem);?></b>
                          </div>
                        </div> 
        </div>
      </div>
                
<?php endforeach; ?>
</div><!--container-fluid-->
          



</div>
</div>
</div>












                  


