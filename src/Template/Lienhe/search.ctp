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
        <?php foreach ($kq as $lienhe): ?>
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


</div>










