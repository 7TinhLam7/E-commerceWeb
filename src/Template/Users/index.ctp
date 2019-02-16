<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>

<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3 ><?= __('Danh sách thành viên') ?> 
    <p style="text-align: right">        
        <a href="<?= $this->url->build(['action' => 'add']) ?>" class="fa fa-user-plus"></a>
    </p>
    <form action="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'search']); ?>" method="post">
        <p style="float: left">
            <input placeholder="Nhập.... " value="" name="sr" style="height: 40px">
        </p>

        <p style="float: left">
            <button class="fa fa-search" type="submit" style="height: 40px;width: 30px;">
            </button> 
        </p>    
    </form>   
</h3>



<table>
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col" class="actions"><?= __('Ảnh đại diện ') ?></th>
            <th scope="col" class="actions"><?= __('Tên') ?></th>
            <th scope="col" class="actions"><?= __('Email') ?></th>
            <th scope="col" class="actions"><?= __('Giới Tính') ?></th>
            
            <th scope="col" class="actions"><?= __('Điện Thoại') ?></th>
            
            <th scope="col" class="actions"><?= __('Quyền Hạn') ?></th>
            
            <th scope="col"><?= __('Chức năng') ?></th>
        </tr>
    </thead>
    <tbody> 
        <?php foreach ($user as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><img src="<?php echo $user->hinhuser_dd.$user->hinhuser.$user->hinhmacdinh;?>" style="height: 60px;width: 60px"></td>        
                <td> <?= h($user->ten) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= $user->gioitinh ? __('Nữ') : __('Nam'); ?></td>
                <td><?php echo $this->Number->format($user->sdt, [
                    'locale' => 'fr_FR']); ;?></td>
                    <td><?= h($user->role->ten) ?></td>  
                    


                    
                    <td class="actions">
                        
                        <a href="<?= $this->url->build(['action' => 'view', $user->id]) ?>"><i class="fa fa-address-card"></i></a>
                        &nbsp;
                        <?= $this->Form->postLink(__('X'), ['action' => 'delete', $user->id], ['confirm' => __('Bạn muốn xoá người dùng # {0}?', $user->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first( __('Đầu')) ?>
            <?= $this->Paginator->prev('< ' . __('trước')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('sau') . ' >') ?>
            <?= $this->Paginator->last(__('Cuối') ) ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('trang {{page}} trên tổng {{pages}} trang, hiện {{current}} kết quả trên tổng {{count}} kết quả')]) ?></p>
    </div>
</div>
