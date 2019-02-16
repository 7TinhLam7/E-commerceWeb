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
            <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Tên Màu') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Ảnh Màu') ?></th>
            
            <th scope="col" class="actions"><?= __('Chức năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kq as $mau): ?>
            <tr>
                <td><?= $this->Number->format($mau->id) ?></td>
                <td><img src="../<?php echo $mau->hinhm_dd.$mau->hinhm;?>" style="height: 60px;width: 60px"></td>
                <td><?= h($mau->ten) ?></td>
                
                
                <td class="actions">
                    <a href="<?= $this->url->build(['action' => 'view', $mau->id]) ?>"><i class="fa fa-folder-open" style="font-size:20px"></i></a>
                    &nbsp;
                    <a href="<?= $this->url->build(['action' => 'edit', $mau->id]) ?>"><i class="fa fa-wrench"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $mau->id], ['confirm' => __('Bạn muốn xoá # {0}?', $mau->ten)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



</div>










