<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="nhacc index large-12 medium-8 columns content">
    <?= $this->Form->create($nhacc,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Chỉnh Sửa Nhà Cung Cấp') ?>
             <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        </legend>
        <?php
            echo $this->Form->control('ten',['label' => 'Tên Nhà Cung Cấp']);
            echo $this->Form->control('diachi',['label' => 'Địa chỉ']);
            echo $this->Form->control('sdt',['label' => 'Số Điện Thoại']);
            echo $this->Form->input('hinhcc',['type' => 'file','label' => 'Logo Nhà Cung Cấp']);
        ?>
    </fieldset>
    <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>
</div>
