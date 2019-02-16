<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Danhgium $danhgium
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Danhgium'), ['action' => 'edit', $danhgium->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Danhgium'), ['action' => 'delete', $danhgium->id], ['confirm' => __('Are you sure you want to delete # {0}?', $danhgium->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Danhgia'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Danhgium'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="danhgia view large-9 medium-8 columns content">
    <h3><?= h($danhgium->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $danhgium->has('user') ? $this->Html->link($danhgium->user->hoten, ['controller' => 'Users', 'action' => 'view', $danhgium->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($danhgium->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sanpham Id') ?></th>
            <td><?= $this->Number->format($danhgium->sanpham_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diemdg Id') ?></th>
            <td><?= $this->Number->format($danhgium->diemdg_id) ?></td>
        </tr>
    </table>
</div>
