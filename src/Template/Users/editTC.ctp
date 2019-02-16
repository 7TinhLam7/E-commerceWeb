<?php
/**
  * @var \App\View\AppView $this
  */
echo $this->Html->css('style.css');
?>

</div>
</div>
<div style="background-color: black; height: 60px;">
  
 <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
               <ul class="w3_short">
                <li><a href="<?= $this->url->build(['controller'=>'Home','action' => 'trangchu']) ?>" style="color: white"> &nbsp; Trang chủ</a><i>|</i>
                    Chỉnh sửa thông tin cá nhân</li>
              </ul>
             </div>
        </div>
</div>

<br>
<div class="container" >
   
<div style="background-color: white">
    <div class="thumbnail">
    <?= $this->Form->create($user,['type' => 'file']); ?>
    <fieldset>
        

        <h5 class="text-right" ><?= $this->Html->link(__('Quay lại'), ['controller'=>'users','action' => 'trangcanhan',$user->id]) ?> </h5>
        
        <div style="background-color: white;text-align: center">
            <?php
            
            echo '<br>';
            echo $this->Form->control('ho',['label'=>'Họ:','style'=>'width:200px;border-radius:3px;margin-left:100px;']);
            echo '<br>';
            echo $this->Form->control('ten',['label'=>'Tên:','style'=>'width:200px;border-radius:3px;margin-left:92px;']);
            echo '<br>';
            echo $this->Form->control('password',['label'=>'Mật khẩu:','style'=>'width:200px;border-radius:3px;margin-left:58px']);
            echo '<br>';
            echo $this->Form->control('sdt',['label'=>'Số điện thoại:','style'=>'width:200px;border-radius:3px;margin-left: 30px']);
            echo '<br>';
            echo $this->Form->control('diachi',['label'=>'Địa chỉ:','style'=>'width:200px;border-radius:3px;margin-left:68px']);
            echo '<br>';
            echo $this->Form->label('Giới tính:');
            echo $this->Form->select('gioitinh',['Nam','Nữ'],['style'=>'margin-left:50px;border-radius:3px;width:200px']);
            echo '<br>';
            echo '<br>';
            echo $this->Form->input('hinhuser',['type' => 'file','label'=>'Đổi ảnh đại diện','style'=>'margin-left:400px']);
            
        ?>
 
        </div>
        
    </fieldset>
    
    <p class="text-center" style="padding-top: 40px;padding-left: 520px "><input type="submit" name="search-btn" class="btn btn-block btn-primary" value="Xác nhận" style="width: 120px;"></p>
    <?= $this->Form->end() ?>
</div> 
</div>
</div>
