<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <?= $this->Form->create($sanphamcc) ?>
    <fieldset>
        <legend><?= __('Thêm sản phẩm') ?>
             <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        </legend>
        
        <?php
            
            echo $this->Form->control('sanpham_id',['options' => $sanpham,'label'=> 'Sản Phẩm']);
            echo $this->Form->control('nhacc_id',['options' => $nhacc,'label' =>'Nhà Cung Cấp']);
            echo $this->Form->control('gia',['label'=>'Giá']);
            echo $this->Form->control('duongdan',['label'=>'Đường Dẫn']);
        ?>
    </fieldset>
     <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>
</div>
