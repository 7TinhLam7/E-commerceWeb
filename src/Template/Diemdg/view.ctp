<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\diemdg $diemdg
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($diemdg->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Điểm') ?></th>
            <td><?= h($diemdg->diem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian tạo') ?></th>
            <td><?= h($diemdg->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người tạo') ?></th>
            <td><?= h($diemdg->idnguoitao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
            <td><?= h($diemdg->tgsua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người sửa') ?></th>
            <td><?php if($diemdg->idnguoisua == 0) : ?>
            <?php echo 'Chưa Có Chỉnh Sửa';?>
            <?php else :?>
                <?= h($diemdg->idnguoisua);?>
                <?php endif;?></td>
            </tr>
            
            
        </table>
        <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
    </div>
