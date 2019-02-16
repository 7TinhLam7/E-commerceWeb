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
        <legend><?= __('Edit Binhluan') ?></legend>
        <?php
        echo $this->Form->control('noidung');
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('tg_tao');
        echo $this->Form->control('tg_sua');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
