<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="binhluan form large-12 medium-8 columns content">
    <?= $this->Form->create($binhluan) ?>   
    <fieldset>
        <legend><?= __('Add Binhluan') ?></legend>
        <?php
        echo $this->Form->control('noidung');
            // echo $this->Form->control('users_id', ['options' => $users]);
            // echo $this->Form->control('sanpham_id',['options' => $sanpham]);
            // echo $this->Form->control('tgtao');
        
        ?>
    </fieldset>
    <?= $this->Form->button(__('Xác Nhận')) ?>
    <?= $this->Form->end() ?>
</div>
