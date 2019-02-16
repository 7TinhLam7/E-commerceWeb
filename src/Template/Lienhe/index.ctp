<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Lienhe[]|\Cake\Collection\CollectionInterface $lienhe
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Phần Liên Hệ') ?>
    <form action="<?php echo $this->Url->build(['controller'=>'Lienhe', 'action'=>'search']); ?>" method="post">
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
            <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Thời Gian Gởi') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Trạng Thái') ?></th>
            <th scope="col"><?= $this->Paginator->sort('ID Người Đọc') ?></th>
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lienhe as $lienhe): ?>
            <tr>
                <td><?= $this->Number->format($lienhe->id) ?></td>
                <td><?= h($lienhe->email); ?></td>
                <td><?= h($lienhe->tgtao) ?></td>
                <td><?= h($lienhe->trangthai) ?></td>
                <td><?php if($lienhe->idnguoidoc == 0) : ?>
                <?php echo 'Chưa Đọc';?>
                <?php else :?>
                    <?= h($lienhe->idnguoidoc);?>
                <?php endif;?>
            </td>

            <td class="actions">
                <a href="<?= $this->url->build(['action' => 'edit', $lienhe->id]) ?>"><i class="fa fa-assistive-listening-systems"></i></a>
                &nbsp;
                <?= $this->Form->postLink(__('X'), ['action' => 'delete', $lienhe->id], ['confirm' => __('Bạn muốn xoá # {0}?', $lienhe->id)]) ?>
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
