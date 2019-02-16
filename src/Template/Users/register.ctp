<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
<div class="panel">
  <h2 class="text-center"> Đăng Ký </h2>
  <?= $this->Form->create($user); ?>
    <?= $this->Form->control('ho', ['label' => 'Nhập Họ']); ?>
    <?= $this->Form->control('ten', ['label' => 'Nhập Tên']); ?>
    <?= $this->Form->control('email', ['label' => 'Nhập Email']); ?>
    <?= $this->Form->control('password', array('type' => 'password'), ['label' => 'Nhập Mật Khẩu']); ?>
    <?=  $this->Form->select('gioitinh',['Nam','Nữ']);?>
    <?= $this->Form->control('sdt', ['label' => 'Số điện thoại']); ?>
    <?= $this->Form->control('diachi', ['label' => 'Địa chỉ']);?>
    


    <?= $this->Form->submit('Đăng Ký', array('class' => 'button')); ?>
  <?= $this->Form->end(); ?>

</div>
</div>
