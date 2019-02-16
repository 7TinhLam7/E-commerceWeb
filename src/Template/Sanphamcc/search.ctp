<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Sanpham[]|\Cake\Collection\CollectionInterface $sanpham
  */


?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Sản Phẩm Cung Cấp') ?>
    <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>    
    <form action="<?php echo $this->Url->build(['controller'=>'Sanphamcc', 'action'=>'search']); ?>" method="post">
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
            <th scope="col" class="actions"><?= __('Tên Sản Phẩm') ?></th>
            
            <th scope="col" class="actions"><?= __('Nhà Cung Cấp') ?></th>
            <th scope="col" class="actions"><?= __('Giá') ?></th>
            

            
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kq as $sanphamcc): ?>
            <tr>
                <td><?= $this->Number->format($sanphamcc->id) ?></td>
                <td><?= $sanphamcc->has('sanpham') ? $this->Html->link($sanphamcc->sanpham->ten, ['controller' => 'sanpham', 'action' => 'view', $sanphamcc->sanpham->id]) : '' ?>   
            </td>
            
            <td><?= $sanphamcc->has('nhacc') ? $this->Html->link($sanphamcc->nhacc->ten, ['controller' => 'nhacc', 'action' => 'view', $sanphamcc->nhacc->id]) : '' ?></td>
            
            <td><?php echo $this->Number->format($sanphamcc->gia, [
                'locale' => 'fr_FR']); ;?> </td>
                
                <td class="actions">
                    <a href="<?= $this->url->build(['action' => 'view', $sanphamcc->id]) ?>"><i class="fa fa-archive"></i></a>
                    
                    &nbsp;
                    <a href="<?= $this->url->build(['action' => 'edit', $sanphamcc->id]) ?>"><i class="fa fa-wrench"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $sanphamcc->id], ['confirm' => __('Bạn muốn xoá # {0}?', $sanphamcc->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</div>










