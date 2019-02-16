<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Sanpham[]|\Cake\Collection\CollectionInterface $sanpham
  */


?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Kết Quả') ?>
    <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
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

<table cellpadding="0" cellspacing="0">
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
        <?php foreach ($kq as $finded): ?>
            
            <td><?= $this->Number->format($finded->id) ?></td>
            <td><img src="./../<?php echo $finded->hinhuser_dd.$finded->hinhuser.$finded->hinhmacdinh;?>" width="50" height="50"></td>        
            <td><?= h($finded->ten) ?></td>
            <td><?= h($finded->email) ?></td>
            <td><?= $finded->gioitinh ? __('Nữ') : __('Nam'); ?></td>
            <td><?php echo $this->Number->format($finded->sdt, [
                'locale' => 'fr_FR']); ;?></td>
                <td><?= h($finded->role->ten) ?></td> 
                


                
                <td class="actions">
                    
                    <a href="<?= $this->url->build(['action' => 'view', $finded->id]) ?>"><i class="fa fa-address-card"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $finded->id], ['confirm' => __('Bạn muốn xoá người dùng # {0}?', $finded->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



</div>










