<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend><?= __('Chỉnh sửa Tag') ?><p class="text-right">
            <?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        </legend>
        <?php
            echo $this->Form->control('ten',['label'=>'Tên']);
            
        ?>
    </fieldset>
     <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>
</div>
