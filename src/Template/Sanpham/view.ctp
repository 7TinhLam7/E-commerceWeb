<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Sanpham $sanpham
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($sanpham->id) ?>
    
</h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Tên Sản Phẩm') ?></th>
        <td><?= h($sanpham->ten) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Màu Sắc') ?></th>
        <td><?= h($sanpham->mau->ten) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Thuộc Tag') ?></th>
        <td><?= h($sanpham->tag->ten) ?></td>
    </tr>
    
    <tr>
        <th scope="row"><?= __('Thuộc Phân Khúc') ?></th>
        <td><?= h($sanpham->phankhuc->ten) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Hãng Sản Xuất') ?></th>
        <td><?= h($sanpham->hangsx->ten) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Lượt Xem') ?></th>
        <td><?= h($sanpham->luotxem) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Điểm Đánh Giá Trung Bình') ?></th>
        <td><?= h($sanpham->diemtb) ?></td>
    </tr>
    
    <tr>
        <th scope="row"><?= __('Thời gian tạo sản phẩm') ?></th>
        <td><?= h($sanpham->tgtao) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('ID người tạo') ?></th>
        <td><?= h($sanpham->idnguoitao) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
        <td><?= h($sanpham->tgsua) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('ID người sửa') ?></th>
        <td><?php if($sanpham->idnguoisua == 0) : ?>
        <?php echo 'Chưa Có Chỉnh Sửa';?>
        <?php else :?>
            <?= h($sanpham->idnguoisua);?>
            <?php endif;?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hình Ảnh') ?></th>
            <td><img src="../../<?php echo $sanpham->hinhsp_dd.$sanpham->hinhsp;?>" width="250" height="250"></td>
        </tr>
        
    </table>
    <div class="row">
        <h4><?= __('Thông Tin') ?></h4>
        <?= $this->Text->autoParagraph(h($sanpham->thongtin)); ?>
    </div>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
