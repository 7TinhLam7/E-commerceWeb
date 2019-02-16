
<footer>
<div class="container-fluid">
<div class="row" style="padding-top: 5px;">
<div class="col-md-4 col-sm-6 footer-col">
<div class="logofooter"> S2B</div>
<p>S2B Giúp bạn tăng thêm doanh số mà không phải cạnh tranh quyết liệt trên các kênh quảng cáo khác như Facebook hay google. Hãy đến với chúng tôi để nhận được những ưu đãi hấp dẫn.</p>
<?php foreach ($ad as $ads):?>
<p><i class="fa fa-map-pin"></i> <?= h($ads->diachi);?></p>
<p><i class="fa fa-phone"></i> Phone : <?= h($ads->sdt);?></p>
<p><i class="fa fa-envelope"></i> E-mail : <?= h($ads->email);?></p>
<?php endforeach;?>    
</div>

<div class="col-md-8 col-sm-6 footer-col">
<div class="row">
<h6 class="heading7" >Các Nhà Cung Cấp</h6>
<?php foreach ($ncc as $nccs):?>
<div class="col-md-3">
<a href="http://<?= h($nccs->diachi); ?>" target="_blank">  <?=h($nccs->ten) ; ?></a> 
</div>
<?php endforeach;?>
</div> 
</div>
</div>
</div>


<!--footer start from here-->
<br>
<br>
<div class="copyright">
<div class="container">
<div class="col-md-6">
<p>© 2017 - All Rights with S2B</p>
</div>

</div>
</div>

<div style="text-align:center; font-size:30px; position: fixed;"><a href='#' title="Back to top">&#710;</a></div>

<script>
$(document).ready(function() {
$('#myCarousel').carousel({
interval: 50000
})
});
</script>
</footer>
</body>
