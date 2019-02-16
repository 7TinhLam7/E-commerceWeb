<!-- full image -->
</div>
</div>
<!-- full image -->
<?php
echo $this->Html->css('style.css'); 
?>

<style>
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}



/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3.5s;
  animation-name: fade;
  animation-duration: 3.5s;
}


@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>

<!-- -------------------------------------------------------------------- -->


<div class="slider-timkiem" style="height: 600px" >
  <?= $this->Html->image('shop.jpg');?>
</div>
<br>
<br>

<div class="container-fluid text-center" >    
  <div class="row content">
    <div class="col-sm-4 text-left" > 
<div class="thumbnail" style="height: 281px">
<div class="slideshow-container" style="padding-top: 20px">

<?php
        $i='0';
        foreach($sanphamdg as $sp){
$dg[$i]= array('id'=>$sp->id,'hinhsp_dd'=>$sp->hinhsp_dd, 'hinhsp'=>$sp->hinhsp);
$i =$i+1;
} ;?>

<div class="mySlides fade" align="center">
  
   <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $dg['0']['id']]) ?>">
                <img src="../<?php echo $dg['0']['hinhsp_dd'].$dg['0']['hinhsp'];?>" style="height:200px ;width: 200px" >
              </a>

</div>

<div class="mySlides fade" align="center">
  
   <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $dg['1']['id']]) ?>">
                <img src="../<?php echo $dg['1']['hinhsp_dd'].$dg['1']['hinhsp'];?>" style="height:200px ;width: 200px" >
              </a>
</div>

<div class="mySlides fade" align="center">

   <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $dg['2']['id']]) ?>">
                <img src="../<?php echo $dg['2']['hinhsp_dd'].$dg['2']['hinhsp'];?>" style="height:200px ;width: 200px" >
              </a>
</div>

<div class="mySlides fade" align="center">

   <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $dg['3']['id']]) ?>">
                <img src="../<?php echo $dg['3']['hinhsp_dd'].$dg['3']['hinhsp'];?>" style="height:200px ;width: 200px" >
              </a>
</div>

<div class="mySlides fade" align="center">

   <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $dg['4']['id']]) ?>">
                <img src="../<?php echo $dg['4']['hinhsp_dd'].$dg['4']['hinhsp'];?>" style="height:200px ;width: 200px" >
              </a>
</div>
</div>

<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

    </div>
    <div class="col-sm-8 text-right" style="background-color: white;height: 250px " >
      
      <div class="col-sm-12" >
 <!--  <h5 class="title-bg" align="center" style="color: black">
    <span class="glyphicon glyphicon-star"></span>
    <span class="glyphicon glyphicon-star"></span>
    <span class="glyphicon glyphicon-star"></span>
       Sản Phẩm Mới 
     <span class="glyphicon glyphicon-star"></span>
     <span class="glyphicon glyphicon-star"></span>
     <span class="glyphicon glyphicon-star"></span>
     </h5> -->
     </div>
     <div class="row" align="center">
    <?php foreach($spmoi as $spmois): ?>
      <div class="col-md-3 ">
        <div class="thumbnail" style="min-height: 250px;width: 180px">
          <div class="caption" style="text-align: :center;height: 220px">
           <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $spmois->id]) ?>">  
    <img src="../<?php echo $spmois->hinhsp_dd.$spmois->hinhsp;?>" style="height: 150px;width: 150px" >
           </a> 
            <h6 > <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $spmois->id]) ?>">  <?=h($spmois->ten) ; ?></a>
            </h6>
          </div>
 
  <div class="ratings">
    <p><?php
    switch ((int)$spmois->diemtb) {
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
                          <b align="center"> lượt xem <?=h($spmois->luotxem);?></b>
                          
                        </div> 
                      </div>   
                  </div>
              <?php endforeach; ?>     
              </div><!--container-fluid-->

    </div>
  </div>
  </div>

<br>
<br>
<br>



<!-- <div class="col-sm-12" style="background-color: black;height: 40px" class="text-center">
  <h4 class="title-bg" align="center" style="color: white">Sản phẩm đang được quan tâm
  </h4>
</div> -->





<div class="col-sm-12" style="background-color: white ">  
<div class="thumbnail">  
  <br>
 <div class="row" align="center" >
<h3 style="color: gray"> H O T </h3>
  <br>
    <?php foreach($sanpham as $sanpham): ?>
      <div class="col-sm-2">
        <div class="thumbnail" style="min-height: 250px">          
          <div class="caption" style="text-align: :center;height: 220px">
          <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $sanpham->id]) ?>"> 
    <img src="../<?php echo $sanpham->hinhsp_dd.$sanpham->hinhsp;?>" style="height: 150px;width: 1500px" >
         </a>
          
            <h6 > <a href="<?= $this->url->build(['controller'=>'sanpham','action' => 'xem', $sanpham->id]) ?>">  <?=h($sanpham->ten) ; ?></a>
            </h6>
          </div>
 
  <div class="ratings">
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
                          <b align="center"> lượt xem <?=h($sanpham->luotxem);?></b>
                          
                        </div> 
                      </div>   
                  </div>
              <?php endforeach; ?>     
              </div><!--container-fluid-->
              <br>
<br>
<br>
</div><!--container-fluid-->
</div>










