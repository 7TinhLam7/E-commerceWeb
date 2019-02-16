<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Lienhe $lienhe
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="lienhe view large-12 medium-8 columns content">
    <h3><?= h($lienhe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($lienhe->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lienhe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tgtao') ?></th>
            <td><?= h($lienhe->tgtao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Noidung') ?></h4>
        <?= $this->Text->autoParagraph(h($lienhe->noidung)); ?>
    </div>
</div>
