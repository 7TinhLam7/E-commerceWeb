<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Mau[]|\Cake\Collection\CollectionInterface $mau
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Màu Sắc') ?>
    <p style="text-align: right">        
        <a href="<?= $this->url->build(['action' => 'add']) ?>" class="fa fa-plus-square"></a>
    </p>
    <form action="<?php echo $this->Url->build(['controller'=>'Mau', 'action'=>'search']); ?>" method="post">
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
            <th scope="col"><?= $this->Paginator->sort('Ảnh Màu') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Tên Màu') ?></th>
            
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mau as $mau): ?>
            <tr>
                <td><?= $this->Number->format($mau->id) ?></td>
                <td><img src="<?php echo $mau->hinhm_dd.$mau->hinhm;?>" style="height: 60px;width: 60px"></td>
                <td><?= h($mau->ten) ?></td>
                
                
                <td class="actions">
                    <a href="<?= $this->url->build(['action' => 'view', $mau->id]) ?>"><i class="fa fa-paint-brush" style="font-size:20px"></i></a>
                    &nbsp;
                    <a href="<?= $this->url->build(['action' => 'edit', $mau->id]) ?>"><i class="fa fa-wrench"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $mau->id], ['confirm' => __('Bạn muốn xoá # {0}?', $mau->tên)]) ?>
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
