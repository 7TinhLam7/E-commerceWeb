<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Danhgium[]|\Cake\Collection\CollectionInterface $danhgia
  */
?>  
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="danhgia index large-12 medium-8 columns content">
    <h3><?= __('Đánh Giá') ?>
        <form action="<?php echo $this->Url->build(['controller'=>'Danhgia', 'action'=>'search']); ?>" method="post">
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
                <th scope="col"><?= $this->Paginator->sort('ID Users') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Sản Phẩm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Số Điểm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Thời Gian Tạo') ?></th>
                <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($danhgia as $danhgium): ?>
            <tr>
                <td><?= $this->Number->format($danhgium->id) ?></td>
                <td><?= $danhgium->has('user') ? $this->Html->link($danhgium->user->id, ['controller' => 'Users', 'action' => 'view', $danhgium->user->id]) : '' ?></td>
                <td><?= h($danhgium->sanpham->ten) ?></td>
                <td><?= h($danhgium->diemdg->diem) ?></td>
                <td><?= h($danhgium->tgtao) ?></td>
                <td class="actions">
                   
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $danhgium->id], ['confirm' => __('Bạn muốn xoá # {0}?', $danhgium->id)]) ?>
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
