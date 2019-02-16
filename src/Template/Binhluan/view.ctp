<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Binhluan $binhluan
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="binhluan view large-12 medium-8 columns content">
    <h3><?= h($binhluan->id) ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('ID User') ?></th>
            <td><?= $binhluan->has('user') ? $this->Html->link($binhluan->user->id, ['controller' => 'Users', 'action' => 'view', $binhluan->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Sanpham') ?></th>
            <td><?= $binhluan->has('sanpham') ? $this->Html->link($binhluan->sanpham->id, ['controller' => 'Sanpham', 'action' => 'xem', $binhluan->sanpham->id]) : '' ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Thời Gian Tạo') ?></th>
            <td><?= h($binhluan->tgtao) ?></td>
        </tr>
        
    </table>
    <div class="row">
        <h4><?= __('Nội Dung') ?></h4>
        <?= $this->Text->autoParagraph(h($binhluan->noidung)); ?>
    </div>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
