<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
        <?= $this->fetch('title') ?>
    </title>
    <!-- <?= $this->Html->meta('icon') ?> -->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'); ?>

    
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <!-- <?= $this->fetch('meta') ?> -->
    <!-- <?= $this->fetch('css') ?> -->
    <!-- <?= $this->fetch('script') ?> -->
    <style>
.fa-user-plus{
    font-size: 30px;
}
.fa-search{
font-size: 15px;
}
.fa-address-card{
font-size: 20px;
}
.fa-wrench{
    font-size: 20px;
}
.fa-plus-square{
font-size: 30px;
}
.fa-archive{
font-size: 20px;
}
.fa-users{
font-size: 20px;
}
.fa-check-square{
font-size: 20px;
}
.fa-comments-o{
font-size: 20px;
}
.fa-cubes{
font-size: 20px;
}
.fa-cube{
font-size: 20px;
}
.fa-file-image-o{
font-size: 20px;
}
.fa-bank{
font-size: 20px;
}
.fa-star{
font-size: 20px;
}
.fa-star-o{
font-size: 20px;
}
.fa-handshake-o{
font-size: 20px;
}
.fa-user-secret{
font-size: 20px;
}
.fa-money{
font-size: 20px;
}
.fa-line-chart{
font-size: 20px;
}
.fa-commenting{
font-size: 20px;
}
.fa-shopping-bag{
font-size: 20px;
}
.fa-assistive-listening-systems{
font-size: 20px;
}
.fa-window-maximize{
font-size: 20px;    
}
.fa-paint-brush{
font-size: 20px;    
}
.fa-bookmark-o{
font-size: 20px;    
}
</style>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation" style="background-color: #c5d5cb">
        <ul class="title-area large-3 medium-4 columns" style="background-color: #729f98">
            <li class="name">
                <h1><?= $this->Html->link(__('S2B'), ['controller' => 'Sanpham','action' => 'home']) ?></h1>
            </li>
        </ul> 
        <div class="top-bar-section">
            <ul class="right">
            <?php if($loggedIn) : ?>
                <li><?= $this->Html->link('Đăng Xuất', ['controller' => 'users', 'action' => 'logout']);?> </li>
                
            <?php else : ?>    
                <li><?= $this->Html->link('Đăng Ký', ['controller' => 'users', 'action' => 'register']);?> </li>
                 
            <?php endif; ?>    
            </ul>
        </div>
    </nav>

<?php if($loggedIn) : ?>
    <nav class="large-3 medium-4 columns" >
    <ul class="side-nav" style="border: solid lightgrey;width: 337px;margin-left: -15px;margin-bottom: auto; ">
        <li class="heading"><?= __('Trang Quản Trị') ?></li>
        <li><a href="<?= $this->url->build(['controller' => 'Users','action' => 'index']) ?>"><i class="fa fa-users"></i> Thành Viên</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Nhom','action' => 'index']) ?>"><i class="fa fa-cubes"></i> Nhóm Sản Phẩm</a></li> 
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Loai','action' => 'index']) ?>"><i class="fa fa-cube"></i><i class="fa fa-cube"></i> Loại Sản Phẩm</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Dong','action' => 'index']) ?>"><i class="fa fa-cube"></i> Dòng Sản Phẩm</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Phankhuc','action' => 'index']) ?>"><i class="fa fa-window-maximize"></i> Phân Khúc</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Tag','action' => 'index']) ?>"><i class="fa fa-bookmark-o"></i> Tag</a></li>        
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Sanpham','action' => 'index']) ?>"><i class="fa fa-archive"></i> Sản Phẩm</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Sanphamcc','action' => 'index']) ?>"><i class="fa fa-archive"></i> Sản Phẩm Cung Cấp</a></li>
<br>        
        <li><a href="<?= $this->url->build(['controller' => 'Hangsx','action' => 'index']) ?>"><i class="fa fa-bank"></i> Hãng Sản Xuất</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Nhacc','action' => 'index']) ?>"><i class="fa fa-handshake-o"></i> Nhà Cung Cấp</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Mau','action' => 'index']) ?>"><i class="fa fa-paint-brush"></i>  Bảng Màu </a></li>      
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Lienhe','action' => 'index']) ?>"><i class="fa fa-assistive-listening-systems"></i> Liên Hệ</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Binhluan','action' => 'index']) ?>"><i class="fa fa-commenting"></i> Bình Luận</a></li>        
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Diemdg','action' => 'index']) ?>"><i class="fa fa-star"></i> Điểm Đánh Giá</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Danhgia','action' => 'index']) ?>"><i class="fa fa-star-o"></i> Đánh Giá</a></li>
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Roles','action' => 'index']) ?>"><i class="fa fa-user-secret"></i> Chức Vụ</a></li>        
<br>
        <li><a href="<?= $this->url->build(['controller' => 'Sanpham','action' => 'thongke']) ?>"><i class="fa fa-line-chart"></i> Thống Kê</a></li>        




    </ul>
</nav>
<?php endif; ?> 
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
