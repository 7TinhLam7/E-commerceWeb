<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Binhluan[]|\Cake\Collection\CollectionInterface $binhluan
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="binhluan index large-12 medium-8 columns content">
    <h3><?= __('Bình Luận') ?>
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
            <th scope="col"><?= $this->Paginator->sort('ID Người Đăng') ?></th>
            <th scope="col"><?= $this->Paginator->sort('ID Sản Phẩm') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Thời Gian Tạo') ?></th>
            
            
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($binhluan as $binhluan): ?>
            <tr>
                <td><?= $this->Number->format($binhluan->id) ?></td>
                
                

                <td><?= $binhluan->has('user') ? $this->Html->link($binhluan->users_id, ['controller' => 'Users', 'action' => 'view', $binhluan->user->id]) : '' ?></td>

                <td><?= $binhluan->has('sanpham') ? $this->Html->link($binhluan->sanpham_id, ['controller' => 'Sanpham', 'action' => 'view', $binhluan->sanpham->id]) : '' ?></td>
                <td><?= h($binhluan->tgtao) ?></td>

                <td class="actions">
                    <a href="<?= $this->url->build(['action' => 'view', $binhluan->id]) ?>"><i class="fa fa-commenting"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $binhluan->id], ['confirm' => __('Bạn muốn xoá # {0}?', $binhluan->id)]) ?>
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
