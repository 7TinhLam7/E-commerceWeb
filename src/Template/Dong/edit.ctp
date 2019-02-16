<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <?= $this->Form->create($dong) ?>
    <fieldset>
        <legend><?= __('Chỉnh Sửa Dòng Sản Phẩm') ?>
             <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        </legend>
        <?php
            echo $this->Form->control('ten',['label' => 'Tên Dòng']);
            echo $this->Form->input('loai_id',['options' => $loai,'label' => 'Thuộc Loại' ]);
           
        ?>
    </fieldset> 
    <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>
</div>
