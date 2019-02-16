<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <?= $this->Form->create($diemdg) ?>
    <fieldset>
        <legend><?= __('Thêm Điểm Đánh Giá') ?>
         <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
    </legend>
        <?php
            echo $this->Form->control('diem',['label'=>'Điểm Đánh Giá']);     
        ?>
    </fieldset>
    <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>
</div>
