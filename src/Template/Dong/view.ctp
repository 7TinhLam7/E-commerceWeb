<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Dong $dong
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($dong->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên Dòng') ?></th>
            <td><?= h($dong->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thuộc Loại') ?></th>
            <td><?= h($dong->loai->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian tạo') ?></th>
            <td><?= h($dong->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người tạo') ?></th>
            <td><?= h($dong->idnguoitao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
            <td><?= h($dong->tgsua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người sửa') ?></th>
            <td><?php if($dong->idnguoisua == 0) : ?>
            <?php echo 'Chưa Có Chỉnh Sửa';?>
            <?php else :?>
                <?= h($dong->idnguoisua);?>
                <?php endif;?></td>
            </tr>
            
            
        </table>
        <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
    </div>
