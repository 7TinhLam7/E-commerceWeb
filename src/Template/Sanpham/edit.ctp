<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <?= $this->Form->create($sanpham,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Chỉnh sửa sản phẩm') ?></legend>
        <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        <?php
            echo $this->Form->control('ten',['label' => 'Tên Sản Phẩm']);
            echo $this->Form->control('phankhuc_id',['options' => $phankhuc,'label' => 'Phân Khúc Sản Phẩm']);
            echo $this->Form->control('mau_id',['options' => $mau,'label' => 'Màu Sản Phẩm']);
            echo $this->Form->control('hangsx_id',['options' => $hangsx,'label' => 'Hãng Sản Xuất']);
            echo $this->Form->control('tag_id',['options' => $tag,'label' => 'Tag']);
            
            echo $this->Form->control('thongtin',['label' => 'Thông Tin Sản Phẩm']);
            echo $this->Form->control('barcode',['label' => 'Mã barcode']);
            
            
            echo $this->Form->input('hinhsp',['type' => 'file','label' => 'Hình Sản Phẩm']);
        ?>
    </fieldset>
     <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>
</div>
