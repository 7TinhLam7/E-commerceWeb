<!-- /banner_bottom_agile_info -->
<?php
echo $this->Html->css('style.css'); 
?>
</div>
</div>
<div class="container-fluid">
<div style=" height: 60px;">
<div class="services-breadcrumb">
<div class="agile_inner_breadcrumb">
<ul class="w3_short" style="color: black">
<li><a href="<?= $this->url->build(['controller'=>'Sanpham','action' => 'home']) ?>" style="color: black"> &nbsp; Trang chủ <i class="glyphicon glyphicon-chevron-right"></i></a>

<p style="float: right">
<a href="<?= $this->url->build(['controller'=>'phankhuc','action' => 'phankhuc', $phankhuc->id]) ?>" style="color: black">
<?= h($phankhuc->ten) ;?> 
</a>
</p>
<?php foreach ($dong->where(['id'=>$phankhuc->dong_id]) as $dongs) :?>
<p style="float: right" >

<a href="<?= $this->url->build(['controller'=>'dong','action' => 'dong', $dongs->id]) ?>" style="color: black">
<?= h($dongs->ten) ;?> <i class="glyphicon glyphicon-chevron-right"></i> &nbsp;
</a>

<?php foreach ($loai->where(['id'=>$dongs->loai_id]) as $loais) :?>
<p style="float: right">

<a href="<?= $this->url->build(['controller'=>'loai','action' => 'loai', $loais->id]) ?>" style="color: black">
<?= h($loais->ten) ;?> <i class="glyphicon glyphicon-chevron-right"></i> &nbsp;
</a>

</p>

<?php foreach ($nhom->where(['id'=>$loais->nhom_id]) as $nhoms) :?>  
<a href="#" style="color: black">
<?= h($nhoms->ten) ;?> <i class="glyphicon glyphicon-chevron-right"></i> &nbsp;
</a>
<?php endforeach;?> 
<?php endforeach;?>
<?php endforeach;?>


</li>
</ul>
</div>

</div>
</div>

<hr>




<div class="row">
<div class="col-md-12">

<form class="form text-center" action="<?php echo $this->Url->build(['controller' => 'Phankhuc', 'action' => 'searchphankhuc',$phankhuc->id]) ?>" method="POST">


<div class="col-md-4 form-group">                      
<input type="text" name="noidung" class="form-control" placeholder="Tên sản phẩm ..." value="">
</div>

<div class="form-group col-md-2">
<select class="form-control" name="tag">
<option selected value="" class="form-group"> Tag</option>
<?php foreach($tags as $key => $value){ ?>
<option value="<?php echo $value->tag->ten; ?>"><?php echo $value->tag->ten; ?></option>
<?php } ?>
</select>
</div>



<div class="form-group col-md-2">
<select class="form-control" name="color">
<option selected value="" class="form-group">Màu</option>
<?php foreach($colors as $key => $value){ ?>
<option value="<?php echo $value->ten; ?>"><?php echo $value->ten; ?></option>
<?php } ?>
</select>
</div>



<div class="form-group col-md-2">
<select class="form-control" name="ddg">
<option selected value="" class="form-group"> Điểm Đánh Giá</option>
<?php foreach($sod as $key => $value){ ?>
<option value="<?php echo $value->diem; ?>"><?php echo $value->diem; ?> Sao Trở Lên</option>
<?php } ?>
</select>
</div>




<div class="col-md-1 form-group text-center">
<input type="submit" name="search-btn" class="btn btn-block btn-primary" value="Tìm kiếm">
</div>



<div class="col-md-2 form-group">                      
<input type="text" name="giamin" class="form-control" placeholder="Giá nhỏ nhất ..." value="">
</div>

<div class="col-md-2 form-group">                      
<input type="text" name="giamax" class="form-control" placeholder="Giá lớn nhất ..." value="">
</div>





</form> 
</div>
</div>

<br>
<br>

<div  style="text-align: center;" >
<?php 
foreach($phankhuc->sanpham as $sanpham):?>

<div class="col-sm-2">
<div class="thumbnail" style="min-height: 280px">          
<div class="caption" style="text-align: :center;height: 220px"> 
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





<?php endforeach;?>     



<br>

</div>


</div>
