<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="mau index large-12 medium-8 columns content">
    <?= $this->Form->create($mau,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Chỉnh Sửa Màu') ?>
            <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        </legend>
        <?php
            echo $this->Form->control('ten',['label'=>'Tên Màu']);
            echo $this->Form->input('hinhm',['type' => 'file','label' => 'Ảnh Màu']);
            
        ?>
    </fieldset>
    <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>
</div>
