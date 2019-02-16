<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Role $role
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="roles view large-12 medium-8 columns content">
    <h3><?= h($role->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên') ?></th>
            <td><?= h($role->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời Gian Tạo') ?></th>
            <td><?= h($role->tgtao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Chú Thích') ?></h4>
        <?= $this->Text->autoParagraph(h($role->chuthich)); ?>
    </div>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
