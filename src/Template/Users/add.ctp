<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <?= $this->Form->create($user,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Thêm Thành viên') ?> <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p></legend>

        <?php
            
            echo $this->Form->control('ho', ['label' => 'Họ']);
            echo $this->Form->control('ten', ['label' => 'Tên']);
            echo $this->Form->control('email', ['label' => 'Email']);
            echo $this->Form->control('password', ['label' => 'Mật Khẩu']);
            echo "Giới tính";
            
            echo $this->Form->select('gioitinh',['Nam','Nữ']);
            echo $this->Form->control('sdt', ['label' => 'Số điện thoại']);
            echo $this->Form->control('diachi', ['label' => 'Địa chỉ']);
            
            echo $this->Form->control('roles_id',['options' => $role,'label' => 'Chức Vụ']); 
            
            echo $this->Form->input('hinhuser',['type' => 'file','label' => 'Ảnh Đại Diện']);
        ?>
    </fieldset>

    <p class="text-center"><?= $this->Form->button(__('Lưu')) ?></p>
    <?= $this->Form->end() ?>

</div>
