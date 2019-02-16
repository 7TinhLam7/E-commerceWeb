<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="lienhe index large-12 medium-8 columns content">
    <?= $this->Form->create($lienhe) ?>
    <fieldset>
    <h4><?= h($lienhe->id) ?>
        <p class="text-right"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
    </h4>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($lienhe->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số Điện Thoại') ?></th>
            <td><?= h($lienhe->sdt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trạng Thái') ?></th>
            <td><?= h($lienhe->trangthai) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Người Đọc') ?></th>
            <td><?php if($lienhe->idnguoidoc == 0) : ?>
                    <?php echo 'Chưa Đọc';?>
                <?php else :?>
                <?= h($lienhe->idnguoidoc);?>
                <?php endif;?>        
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời Gian Gởi') ?></th>
            <td><?= h($lienhe->tgtao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Nội Dung') ?></h4>
        <?= $this->Text->autoParagraph(h($lienhe->noidung)); ?>
    </div>

    </fieldset>
    <p class="text-center"><?= $this->Form->button(__('Đã Đọc')) ?></p>
    <?= $this->Form->end() ?>
</div>
