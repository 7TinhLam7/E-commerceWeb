<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Danhgia'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="danhgia form large-9 medium-8 columns content">
    <?= $this->Form->create($danhgium) ?>
    <fieldset>
        <legend><?= __('Add Danhgium') ?></legend>
        <?php
        echo $this->Form->control('users_id', ['options' => $users]);
        echo $this->Form->control('sanpham_id');
        echo $this->Form->control('diemdg_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
