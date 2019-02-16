<!-- /banner_bottom_agile_info -->
<?php
echo $this->Html->css('style.css'); 
?>
<br>
<br>

<h3 align="center">
Kết Quả Tìm Kiếm "
<?php echo $value; ?> "
</h3>
<br> 
<br>
<div style="min-height: 200px">
<?php foreach($kq as $finded): ?>
<div class="col-sm-2">
<div class="thumbnail" style="min-height: 250px">          
<div class="caption" style="text-align: :center;height: 220px">
<a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $finded->id]) ?>">  
<img src="../<?php echo $finded->hinhsp_dd.$finded->hinhsp;?>" style="height: 150px;width: 150px">
</a>

<h6 align="center" > <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $finded->id]) ?>">  <?=h($finded->ten) ; ?></a>
</h6>
</div>

<div class="ratings" align="center">
<p><?php
switch ((int)$finded->diemtb) {
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
<b align="center"> lượt xem <?=h($finded->luotxem);?></b>

</div> 
</div>
</div>



<?php endforeach; ?>     
</div>     


<br>
<br>




