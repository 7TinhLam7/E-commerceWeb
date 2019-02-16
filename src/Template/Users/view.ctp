<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3> ID <?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Họ') ?></th>
            <td><?= h($user->ho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tên') ?></th>
            <td><?= h($user->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Giới tính') ?></th>
            <td><?= $user->gioitinh ? __('Nữ') : __('Nam'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Điện Thoại') ?></th>
            <td><?php echo $this->Number->format($user->sdt, [
                'locale' => 'fr_FR']); ;?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Địa chỉ') ?></th>
                <td><?= h($user->diachi) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Chức vụ') ?></th>
                <td><?= h($user->role->ten) ?></td>
            </tr>
            
            
            <tr>
                <th scope="row"><?= __('Thời gian tạo ') ?></th>
                <td><?= h($user->tgtao) ?></td>
            </tr>
            
            <tr>
                <th scope="row"><?= __('Ảnh Đại diện') ?></th>
                <td><img src="../../<?php echo $user->hinhuser_dd.$user->hinhuser.$user->hinhmacdinh;?>" width="150" height="150"></td>
            </tr>
            
            
        </table>
        <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        
    </div>
