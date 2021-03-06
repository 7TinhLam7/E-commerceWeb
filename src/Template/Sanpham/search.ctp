<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Sanpham[]|\Cake\Collection\CollectionInterface $sanpham
  */


?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'); ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Kết Quả')  ?>
    <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
    <form action="<?php echo $this->Url->build(['action'=>'search']); ?>" method="post">
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
            <th scope="col" class="actions"><?= __('Hình Sản Phẩm') ?></th>
            <th scope="col" class="actions"><?= __('Tên Sản Phẩm') ?></th>
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kq as $finded): ?>
            
            <tr>
                <td><?= $this->Number->format($finded->id) ?></td>

                <td><img src="./../<?php echo $finded->hinhsp_dd.$finded->hinhsp;?>" width="70" height="70"></td>

                <td><?= h($finded->ten) ?></td>
                
                
                <td class="actions">

                    <a href="<?= $this->url->build(['action' => 'view', $finded->id]) ?>"><i class="fa fa-archive"></i></a>
                    &nbsp;
                    <a href="<?= $this->url->build(['action' => 'edit', $finded->id]) ?>"><i class="fa fa-wrench"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $finded->id], ['confirm' => __('Bạn muốn xoá # {0}?', $finded->ten)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</div>










