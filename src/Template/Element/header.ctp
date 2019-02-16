
<body style="background-color: white">
<nav class="navbar-inverse navbar-fixed-top" style="height:50px">
<div class="navbar-brand">

<a href="<?= $this->url->build(['controller'=>'Sanpham','action' => 'home']) ?>">S2B </a>
</div>


<div class="collapse navbar-collapse js-navbar-collapse">

<ul class="nav navbar-nav">
<?php foreach($n as $nhoms): ?>
<li class="dropdown mega-dropdown" >

<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= h($nhoms->ten); ?> <span class="caret"></span></a>        
<ul class="dropdown-menu mega-dropdown-menu">
<li class="col-sm-12">
<ul >
<li class="dropdown-header">             

<?php foreach($nhoms->loai as $loais): ?>
<div class="col-sm-2">
<h5 style="color: black" align="left">
<a href="<?= $this->url->build(['controller'=>'loai','action' => 'loai', $loais->id]) ?>" style="font-size: 17px">
<?= h($loais->ten); ?></a>
<br>
<?php foreach($d as $dong): ?>
<?php
if($dong['loai_id'] == $loais['id']){ ?>
<a href="<?= $this->url->build(['controller'=>'dong','action' => 'dong', $dong->id]) ?>" style="color: #000055;font-size: 15px">
<?= h($dong->ten);?>
<br>
</a>
<?php
foreach($dong->phankhuc as $pks){
?>
<a href="<?= $this->url->build(['controller'=>'phankhuc','action' => 'phankhuc', $pks->id]) ?>" style="color: gray;">
<?= h($pks->ten);?>
<br>
</a>
<?php
}
}
?>
<?php endforeach;?>
</h5>
</div>
<?php endforeach; ?>


</li>      
</ul>
</li>  
</ul>

</li>
<?php endforeach; ?>
<!-- end menu san pham -->
<li class="dropdown mega-dropdown" >
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Thương Hiệu <span class="caret"></span></a>        
<ul class="dropdown-menu mega-dropdown-menu">
<li class="col-sm-12">
<ul >
<li class="dropdown-header">             
<?php foreach($hsx as $hsxs): ?>
<div class="col-sm-2">
<a href="<?= $this->url->build(['controller'=>'hangsx','action' => 'hangsx', $hsxs->id]) ?>">
<h4 align="center" style="color: black"><?= h($hsxs->ten); ?></h4>
</a>
</div> 
<?php endforeach; ?>           
</li>      
</ul>
</li>  
</ul>       
</li>   

<li class="col-md 3" >
<?= $this->Html->link(__('LIÊN HỆ'), ['controller' => 'Lienhe', 'action' =>'lienhe']);
?>
</li>  

<li>
<div class="col-md-12" style="padding-top: 10px;">
<form action="<?php echo $this->Url->build(['controller'=>'Sanpham', 'action'=>'searchhome']); ?>" method="post">
<p style="float: left">
<input placeholder="Nhập tên, màu, hãng sản phẩm .... " value="" name="sr" style="height: 30px;width:320px">
<button class="fa fa-search" type="submit" style="height: 31px;width: 30px;background-color: white;border-radius: 50%;left: -10px ">
</button>
</p>

</form>    
</div>
</li>

</ul>
<ul class="nav navbar-nav navbar-right">
<li >

<?php if($loggedIn) : ?>

<li class="dropdown" style="padding-right: 25px;">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
<?= $ui = $_SESSION['Auth']['User']['ten'] ;?> <i class="fa fa-caret-down"> </i> 
</a>

<ul class="dropdown-menu dropdown-user">
<li> <!-- <i class="fa fa-user fa-fw"> </i>  -->
<?= $this->Html->link(__('Thông tin cá nhân'), ['controller' => 'Users', 'action' =>'trangcanhan',$_SESSION['Auth']['User']['id']]);
?>
</li>
<!-- <i class="fa fa-gear fa-fw"></i>  -->
<?php if($_SESSION['Auth']['User']['roles_id'] == 1):?>
<li><?= $this->Html->link(__('Quản trị'), ['controller' => 'Users', 'action' =>'index']);
?>
</li>
<?php endif ; ?>
<li class="divider"></li>
<li><?= $this->Html->link('Thoát', ['controller' => 'users', 'action' => 'logout']); ?></li>
</ul>
<!-- /.dropdown-user -->
</li>

<?php else : ?>
<li class="dropdown" style="padding-right: 25px;right: 30px">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
<i class="fa fa-user-circle"  style="font-size:23px"></i>
</a>
<ul class="dropdown-menu dropdown-user" style="top: 55px;background-color: white" >
<li>
<button type="button"  data-toggle="modal" data-target="#myModal1" style="width: 170px;height: 40px;background-color: white;border: 0px">Đăng Nhập</button>
</li>
<hr>
<li align="center" >
<a href="<?= $this->url->build(['controller'=>'users','action' => 'register']) ?>"> Đăng Ký </a>
<br>
</li>
</ul>
</li>
<?php endif; ?>

</li>
</li>

</ul>

<!-- Search -->


<li  style="padding-top: 10px;">
<?php echo $this->Html->link(
$this->Html->image('camera.png',['alt'=>'Lazada','height'=>'30']),['controller'=>'sanpham','action'=>'home'],['escapeTitle' => false]
); ?>
</li> 








</div><!-- /.nav-collapse -->

</nav>

<!-- Modal -->
<div class="modal " id="myModal1" role="dialog" >
<div class="modal-dialog" >

<!-- Modal content-->
<div class="modal-content" style="min-height: 270px">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" align="center">Đăng Nhập</h4>
</div>
<div class="modal-body" align="center">
<form method="post" action="<?= $this->url->build(['controller'=>'users','action'=>'login']) ?>">
<?= $this->Form->input('email', array('type' => 'text','placeholder'=>'Email','label'=>'')); ?>
<br>
<?= $this->Form->input('password', array('type' => 'password','placeholder'=>'Password','label'=>'','width'=>'50px')); ?>
<br>
<div align="center"><input type="submit" name="search-btn" class="btn btn-block btn-primary" value="Đăng Nhập" style="width: 120px;">
<p class="text-right"><?= $this->Html->link(__('Quên Mật Khẩu'), ['controller'=>'users','action' => 'getpass']) ?> </p>
</div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
</div>
</form>
</div>
</div>

</div>
</div>









