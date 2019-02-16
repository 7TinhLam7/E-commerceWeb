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
            <th scope="col"><?= $this->Paginator->sort('Tên') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Dòng') ?></th>
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kq as $phankhuc): ?>
            <tr>
                <td><?= $this->Number->format($phankhuc->id) ?></td>
                <td><?= h($phankhuc->ten) ?></td>
                <td><?= $phankhuc->has('dong') ? $this->Html->link($phankhuc->dong->ten, ['controller' => 'Dong', 'action' => 'view', $phankhuc->dong->id]) : '' ?></td>
                <td class="actions">
                    <a href="<?= $this->url->build(['action' => 'view', $phankhuc->id]) ?>"><i class="fa fa-window-maximize"></i></a>
                    &nbsp;
                    <a href="<?= $this->url->build(['action' => 'edit', $phankhuc->id]) ?>"><i class="fa fa-wrench"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $phankhuc->id], ['confirm' => __('Bạn muốn xoá # {0}?', $phankhuc->ten)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</div>










