<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Nhom $nhom
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($nhom->id) ?></h3>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên Nhóm') ?></th>
            <td><?= h($nhom->ten) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Thời gian tạo ') ?></th>
            <td><?= h($nhom->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người tạo') ?></th>
            <td><?= h($nhom->idnguoitao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
            <td><?= h($nhom->tgsua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người sửa') ?></th>
            <td><?php if($nhom->idnguoisua == 0) : ?>
                    <?php echo 'Chưa Có Chỉnh Sửa';?>
                <?php else :?>
                <?= h($nhom->idnguoisua);?>
                <?php endif;?></td>
        </tr>
    </table>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
