<?php
echo $this->Html->css('style.css'); 
?>

<div class="col-md-12" style="padding-top:10px">
  <ul class="breadcrumb" style="background-color:white">
    <li><a href="<?= $this->url->build(['controller'=>'Sanpham','action' => 'home']) ?>" style="color: black">Trang Chủ</a></li> 
    <i class="glyphicon glyphicon-chevron-right"></i>  
    <li> 
     
      <p style="float: right">
        <i class="glyphicon glyphicon-chevron-right"></i>
        <?= h($sanpham->ten) ;?>
      </p>
      <?php foreach ($pk->where(['id'=>$sanpham->phankhuc_id]) as $pks) :?>
        <p style="float: right">
          <i class="glyphicon glyphicon-chevron-right"></i>
          <a href="<?= $this->url->build(['controller'=>'phankhuc','action' => 'phankhuc', $pks->id]) ?>" style="color: black">
            <?= h($pks->ten) ;?>
          </a>
        </p>
        <?php foreach ($dong->where(['id'=>$pks->dong_id]) as $dongs) :?>
          <p style="float: right">
            <i class="glyphicon glyphicon-chevron-right"></i>
            <a href="<?= $this->url->build(['controller'=>'dong','action' => 'dong', $dongs->id]) ?>" style="color: black">
              <?= h($dongs->ten) ;?>
            </a>
          </p>
          <?php foreach ($loai->where(['id'=>$dongs->loai_id]) as $loais) :?>
            <p style="float: right">
              <i class="glyphicon glyphicon-chevron-right"></i>
              <a href="<?= $this->url->build(['controller'=>'loai','action' => 'loai', $loais->id]) ?>" style="color: black">
                <?= h($loais->ten) ;?>
              </a>
            </p>
            <?php foreach ($nhom->where(['id'=>$loais->nhom_id]) as $nhoms) :?> 
              <a href="#" style="color: black"> 
                <?= h($nhoms->ten) ;?>
              </a>
            <?php endforeach;?> 
          <?php endforeach;?> 
        <?php endforeach;?> 
      <?php endforeach;?>
      
    </li>
    <hr>
  </ul>

</div>
<div class="col-md-7 " style="background-color: white; height: 550px;border: 1px">
  <div class="wrapper row">
    <br>
    <div class="col-md-6" style="margin-top: 70px">
      
      <img src="../../<?php echo $sanpham->hinhsp_dd.$sanpham->hinhsp;?>" width="300" height="350">
      
    </div>
    
    <!-- hinh san pham -->
    <div class=" col-md-5">
      <br>
      <br>
      <br>
      <h3 class="product-title">
       <?=h($sanpham->ten) ; ?>
     </h3>
     <h4>
       Lượt Xem : <?= h($sanpham->luotxem)?>
     </h4>
     <br>
     <h4>
      Điểm Đánh Giá : <?= 
      $this->Number->precision($z, 2) ;?>
      <br>

      <?php
      switch ((int)$z) {
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
      ?>  
      
      <br>
      <h5>
        Trên tổng <?php foreach($count as $c):?>
        <?= h($c->dem);?>
        <?php endforeach;?> lượt đánh giá
      </h5>
      
    </h4>
    <h4>            
     <?php if($loggedIn) : ?>
      
      <div>
        <?php $x= '0' ;?>
        <?php foreach ($dg as $dgs): ?> 
          <h5>
           <?php echo 'Bạn Đã Đánh Giá Sản Phẩm' ;?>
           <br>
           <?php
           switch ((int)$dgs->diemdg->diem) {
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
           ?>  
           <?php $x= '1';?>

           
           <h5>
           <?php endforeach;?>
           <?php foreach ($thaydoi as $td): ?>
            <?= $this->Form->postLink(__('Thay Đổi Đánh Giá'), ['controller'=>'danhgia','action' => 'delete', $td->id]); ?>
          <?php endforeach;?>

          <?php if($x=='0') :?>
            <div class="input-group"> 
              <?= $this->Form->create($danhgia) ?>         
              <fieldset>
                <?php
                echo 'Đánh Giá Sản Phẩm';
                echo '<br>';
                ?>
                <table>
                  <td>
                    <?php
                    echo $this->Form->control('diemdg_id',['options' => $diemdg, 'label'=>'']);?>
                  </td> 
                  <td>
                    <?php
                    echo $this->Form->button('<i class="fa fa-check-square"></i>');?>
                  </td>
                </table>
              </fieldset>
              <?= $this->Form->end(); ?>
            </div>
          <?php endif;?>

          
        </div>
        <?php else : ?>
          <div>
            <h4> Vui Lòng Đăng Nhập Để Đánh Giá Sản Phẩm</h4>
          </div>
        <?php endif; ?>
      </h4>
      <h4>
       Chọn Màu:
     </h4>
     <div> 
       
      
      <?php foreach ($sp as $sps) :?>
        <div class="col-md-3">
          <div class="thumbnail " style="height: 50px;width: 50px">
            <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $sps->id]) ?>">
             <img src="../../<?php echo $sps->mau->hinhm_dd.$sps->mau->hinhm;?>" style="width:50px;height:40px;">
           </a>
         </div>
       </div>
     <?php endforeach; ?>
     
   </div>
 </div>
 
</div>  
<!-- thong tin san pham -->
</div>


<!-- Danh sach san pham  -->
<div class="col-md-4  rightbody" style="background-color: white; width: 39.4%; height:600px">
 
 

  <table class="table table-hover">
    <thead>
      <tr>
       <td> <h4>Top 5 Cửa Hàng Giá Rẻ</h4></td>
       <td style="padding-top: -8px"> <button type="button"  data-toggle="modal" data-target="#myModal2" class="btn btn-block btn-primary" style="width: 120px;height: 30px">Xem Tất Cả</button> </td> 
       <td> </td>
     </tr>
   </thead>

   <tbody>
    <?php foreach ($spcc as $spcc): ?>
      <tr>
       <td>
        <div class="thumbnail " style="height: 50px;width: 170px">
          <img src="../../<?php echo $spcc->nhacc->hinhcc_dd.$spcc->nhacc->hinhcc ?>" style="height: 40px;width: 170px">
        </div>
      </td>
      <td> 
        <div class='col-price' style='text-align:right;'>
          
          <div class='priceH'> <?php echo $this->Number->format($spcc->gia, [
            'locale' => 'fr_FR'
            ]); ;?> (VNĐ)</div>
            <a class='btn btn-primary' style='font-size: 13px;padding: 4px 8px;' rel='nofollow' href='<?= h($spcc->duongdan)?>'
              target='_blank' ssg-track='true' ssg-category='Product' ssg-action='Compare table top'
              ssg-label='Click Trần Anh' ssg-event='click'>Đến nơi bán</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog" >
  <div class="modal-dialog" >
    
    <!-- Modal content-->
    <div class="modal-content" style="min-height: 270px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">
          <?php echo $this->Html->link(__('Xuất danh sách',true),array('controller'=>'sanpham','action'=>'export',$sanpham->id)) ;?>
        </h4>
      </div>
      <div class="modal-body" align="center">
        <table>
          <tbody>
            <?php foreach ($lscc as $spcc): ?>
              <tr>
               <td style="padding-top: 20px;">
                 <div class="thumbnail " style="height: 50px;width: 200px">
                  <img src="../../<?php echo $spcc->nhacc->hinhcc_dd.$spcc->nhacc->hinhcc ?>" style="height: 40px;width: 150px">
                </div>
              </td>
              

              <td style="padding-left: 20px;"> 
                <div class='col-price' style='text-align:right;'> 
                  <div class='priceH'> <?php echo $this->Number->format($spcc->gia, [
                    'locale' => 'fr_FR']); ;?> (VNĐ)
                  </div>
                  <a class='btn btn-primary' style='font-size: 13px;padding: 4px 8px;' rel='nofollow' href='<?= h($spcc->duongdan)?>'
                    target='_blank' ssg-track='true' ssg-category='Product' ssg-action='Compare table top'
                    ssg-label='Click Trần Anh' ssg-event='click'>Đến nơi bán</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
</div>

<!-- end rightbody -->

<div class="col-md-7 product-info" style="background-color: white;min-height: 630px">

  <ul id="myTab" class="nav nav-tabs nav_tabs">
    
    <li class="active"><a href="#service-one" data-toggle="tab">Bình Luận</a></li>
    <li><a href="#service-two" data-toggle="tab">Thông Tin Sản Phẩm </a></li>

  </ul>
  <div id="myTabContent" class="tab-content"  style="min-height:586px">
    <div class="tab-pane fade in active" id="service-one" style="margin-top: 10px;margin-left: 10px;margin-right: 10px">
      <?php if($loggedIn) : ?>
        <div class="input-group"> 

          <div class="col-md-12" style="margin-top: 20px;margin-left: -20px;">
            <?php foreach ($nguoidung as $nd): ?>
              <div class="col-md-2" style="float: left;">
                <img src="../../<?php echo $nd->hinhuser_dd.$nd->hinhuser.$nd->hinhmacdinh;?>" style ="width: 65px;height: 65px;border-radius: 50%;">
              </div>
            <?php endforeach ;?>
            <div class="col-md-10" >
              <textarea id='noidungbinhluan' class="form-control" cols="69" rows="3" placeholder="Nội dung bình luân .." name="noidung"></textarea>
            </div>
          </div>
          <p style="padding-right: 50px;padding-top: 5px ">
           <button id="thembinhluan1" onclick="thembinhluan1()" class="btn btn-xs btn-default" style="margin-top: 0px;float: right;width: 70px;height: 35px"><b>Đăng</b></button>
         </p>
         
       </div>
       <?php else : ?>
        <div>
          <h3> Vui Lòng Đăng Nhập Để Bình Luận</h3>
        </div>
      <?php endif; ?>
      <script type="text/javascript">

        function thembinhluan1(){
          var sp_id = "<?php echo $sanpham->id ;?>"
          var noidung = $('#noidungbinhluan').val();
                             // alert(noidung);
                             $.ajax({
                              url: "<?php echo $this->Url->build(['controller'=>'Binhluan', 'action' =>'addcomment']); ?>",
                              type: 'post',
                              dataType: 'text',
                              data: {
                                sp_id: sp_id,
                                noidung : noidung
                              },
                              success: function(result){
                                      // $("#kq").html(result);
                                    }
                                  });
                             location.reload();
                           }



                           function xoabinhluan(id){
                            var comment_id = id;
                             // alert(comment_id);
                             $.ajax({
                              url: '<?php echo $this->Url->build(['controller'=>'Binhluan', 'action' =>'deletecomment']); ?>',
                              type: 'post',
                              dataType: 'text',
                              data: {
                                comment_id: comment_id
                              },
                              success: function(result){
                                      // $("#kq").html(result);
                                    }
                                  });
                             location.reload();
                           }
                         </script>
                         <br>

                         <?php foreach ($htbl as $htbls): ?>
                          <div class="thumbnail" style="min-height: 80px">
                            <table >
                              <tr>
                                <th>
                                  <img src="../../<?php echo $htbls->user->hinhuser_dd.$htbls->user->hinhuser.$htbls->user->hinhmacdinh;?>" style="height: 30px;width: 30px ;border-radius: 50%;" >
                                </th>
                                <th> &nbsp; </th>
                                <th style="width: 300px">
                                  <h4 class="user"><?=h($htbls->user->ten); ?> :<span style="font-size: 12px;"> <?=h($htbls->tgtao) ; ?></span> </h4>
                                </th>

                                <th style="width: 250px;text-align: right">
                                  <?php if($xoabl == $htbls->user->id){ ?>
                                   <button id="xoabinhluan" onclick="xoabinhluan(<?php echo $htbls->id;?>)" class="btn btn-xs btn-default" style="margin-top: 0px;float: right"><b>X</b></button>
                                 <?php } ?> 
                                 <?php if($htbls->user->roles_id == 1){ ?> 
                                   <p style="color: red;margin-top: 0px;float: right"> Admin &nbsp;</p> 
                                 <?php } ?>  
                               </th>
                             </tr>
                           </table>
                           <table >
                            <tr>
                              <td style="padding-left: 40px">
                                <?= $this->Text->autoParagraph(h($htbls->noidung)); ?>
                              </td>
                            </tr>
                          </table>
                        </div>
                      <?php endforeach;?>
                      



                    </div><!-- end tab one -->


                    <div class="tab-pane fade" id="service-two">  
                     <div class="row" style="margin-left: 10px ">
                       <h4><?= __('Thông Tin Sản Phẩm ') ?></h4>
                       <?= $this->Text->autoParagraph(h($sanpham->thongtin)); ?>
                     </div>     
                   </div><!-- end tab two -->
                 </div>

               </div>
               <div class="col-md-3  rightbody" style="background-color: white; width: 39.4%;min-height:  630px;top: 20px">
                <h4 align="center" style="color: gray">
                  <a href="<?= $this->url->build(['controller'=>'hangsx','action' => 'hangsx', $sanpham->hangsx->id]) ?>">
                   Sản Phẩm Cùng Hãng <?php echo $sanpham->hangsx->ten ;?>
                 </a>
               </h4>
               <?php foreach($hang as $sanpham): ?> 
                 
                <div class="col-sm-6">
                  <div class="thumbnail" style="min-height: 250px">          
                    <div class="caption" style="text-align: :center"> 
                      <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $sanpham->id]) ?>">  
                        <img src="../../<?php echo $sanpham->hinhsp_dd.$sanpham->hinhsp;?>" style="height: 150px;width: 150px">
                      </a>
                      
                      <h6 align="center" > <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $sanpham->id]) ?>">  <?=h($sanpham->ten) ; ?></a>
                      </h6>
                    </div>

                    <div class="ratings" align="center" style="margin-bottom: 0px">
                      <p><?php
                      switch ((int)$sanpham->diemtb) {
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
                      <b align="center" > lượt xem <?=h($sanpham->luotxem);?></b>
                      
                    </div> 
                  </div>
                </div>
                
              <?php endforeach; ?>

            </div> 

          </div>

        </div>
        <!-- end card -->
        
      </div><!--container-->

    </div><!--padding-->
    <br>
    <br>
