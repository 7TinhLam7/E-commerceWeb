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
    <form action="<?php echo $this->Url->build(['controller'=>'Binhluan', 'action'=>'search']); ?>" method="post">
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
            <th scope="col" class="actions"><?= __('ID Người Đăng') ?></th>
            <th scope="col" class="actions"><?= __('ID Sản Phẩm ') ?></th>
            <th scope="col" class="actions"><?= __('Thời Gian Tạo') ?></th>
            
            
            <th scope="col"><?= __('Chức năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kq as $finded): ?>
            
            <td><?= $this->Number->format($finded->id) ?></td>      
            <td><?= $finded->has('user') ? $this->Html->link($finded->users_id, ['controller' => 'Users', 'action' => 'view', $finded->user->id]) : '' ?></td>

            <td><?= $finded->has('sanpham') ? $this->Html->link($finded->sanpham_id, ['controller' => 'Sanpham', 'action' => 'view', $finded->sanpham->id]) : '' ?></td>
            <td><?= h($finded->tgtao) ?></td> 
            


            
            <td class="actions">
                
                <a href="<?= $this->url->build(['action' => 'view', $finded->id]) ?>"><i class="fa fa-address-card"></i></a>
                &nbsp;
                <a href="<?= $this->url->build(['action' => 'edit', $finded->id]) ?>"><i class="fa fa-wrench"></i></a>
                &nbsp;
                <?= $this->Form->postLink(__('X'), ['action' => 'delete', $finded->id], ['confirm' => __('Bạn muốn xoá # {0}?', $finded->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>




</div>










