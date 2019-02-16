<br>

<?php
/**
* @var \App\View\AppView $this
*/
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="index large-6 medium-6 large-offset-3 medium-offset-4 columns ">
<div class="panel" style="box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;">
<h2 class="text-left">Đăng nhập</h2>
<?= $this->Form->create(); ?>
<?= $this->Form->input('email', array('type' => 'text','placeholder'=>'Email','label'=>'')); ?>
<?= $this->Form->input('password', array('type' => 'password','placeholder'=>'Password','label'=>'')); ?>
<div align="center"><?= $this->Form->submit('Đăng nhập', array('class' => 'button')); ?></div>

<p class="text-right"><?= $this->Html->link(__('Quên Mật Khẩu'), ['action' => 'getpass']) ?> </p>
</div>

<?= $this->Form->end(); ?>

</div>



</div>
