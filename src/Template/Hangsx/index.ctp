<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Hangsx[]|\Cake\Collection\CollectionInterface $hangsx
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Hãng Sản Xuất') ?>
        <p style="text-align: right">        
        <a href="<?= $this->url->build(['action' => 'add']) ?>" class="fa fa-plus-square"></a>
        </p>
        <form action="<?php echo $this->Url->build(['controller'=>'Hangsx', 'action'=>'search']); ?>" method="post">
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
                <th scope="col" class="actions"><?= __('Hãng Sản Xuất') ?></th>
                <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hangsx as $hangsx): ?>
            <tr>
                <td><?= $this->Number->format($hangsx->id) ?></td>
                <td><?= h($hangsx->ten) ?></td>
                <td class="actions">
                     <a href="<?= $this->url->build(['action' => 'view', $hangsx->id]) ?>"><i class="fa fa-bank"></i></a>
                    &nbsp;
                    <a href="<?= $this->url->build(['action' => 'edit', $hangsx->id]) ?>"><i class="fa fa-wrench"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $hangsx->id], ['confirm' => __('Bạn muốn xoá # {0}?', $hangsx->ten)]) ?>
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
