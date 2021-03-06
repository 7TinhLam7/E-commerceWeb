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
    <form action="<?php echo $this->Url->build(['controller'=>'Diemdg', 'action'=>'search']); ?>" method="post">
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
            <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Điểm') ?></th>
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kq as $diemdg): ?>
            <tr>
                <td><?= $this->Number->format($diemdg->id) ?></td>
                <td><?= h($diemdg->diem) ?></td>
                <td class="actions">
                 <a href="<?= $this->url->build(['action' => 'view', $diemdg->id]) ?>"><i class="fa fa-star"></i></a>
                 &nbsp;
                 <a href="<?= $this->url->build(['action' => 'edit', $diemdg->id]) ?>"><i class="fa fa-wrench"></i></a>
                 &nbsp;
                 <?= $this->Form->postLink(__('X'), ['action' => 'delete', $diemdg->id], ['confirm' => __('Bạn muốn xoá # {0}?', $diemdg->diem)]) ?>
             </td>
         </tr>
     <?php endforeach; ?>
 </tbody>
</table>



</div>










