<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="danhgia form large-12 medium-8 columns content">
    <?= $this->Form->create($danhgium) ?>
    <fieldset>
        <legend><?= __('Edit Danhgium') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('sanpham_id');
            echo $this->Form->control('diemdg_id');
             
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
