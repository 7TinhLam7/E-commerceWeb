<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
  <?= $this->Form->create($role) ?>
  <fieldset>
    <legend><?= __('Thêm Chức Vụ') ?>
    <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
  </legend>
  <?php
  echo $this->Form->control('ten',['label'=>'Chức Vụ']);
  echo $this->Form->control('chuthich',['label'=>'Chú Thích']);
  
  ?>
</fieldset>
<p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
<?= $this->Form->end() ?>
</div>
