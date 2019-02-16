<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Sanpham[]|\Cake\Collection\CollectionInterface $sanpham
  */


?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Chức Vụ') ?>
    <form action="<?php echo $this->Url->build(['controller'=>'Roles', 'action'=>'search']); ?>" method="post">
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
            <th scope="col" class="actions"><?= __('Tên Quyền') ?></t<th scope="col" class="actions"><?= __('Nội Dung') ?></th>
            <th scope="col" class="actions"><?= __('Chức Năng') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kq as $role): ?>
            <tr>
                <td><?= $this->Number->format($role->id) ?></td>
                <td><?= h($role->ten) ?></td>
                <td class="actions">
                    
                    <a href="<?= $this->url->build(['action' => 'view', $role->id]) ?>"><i class="fa fa-user-secret"></i></a>
                    &nbsp;
                    <?= $this->Form->postLink(__('X'), ['action' => 'delete', $role->id], ['confirm' => __('Bạn muốn xoá # {0}?', $role->ten)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



</div>










