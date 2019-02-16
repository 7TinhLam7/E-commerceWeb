<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\phankhuc $phankhuc
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($phankhuc->id) ?>
        
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên Phân Khúc') ?></th>
            <td><?= h($phankhuc->ten) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Thuộc Dòng') ?></th>
            <td><?= h($phankhuc->dong->ten) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Thời gian tạo') ?></th>
            <td><?= h($phankhuc->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người tạo') ?></th>
            <td><?= h($phankhuc->idnguoitao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
            <td><?= h($phankhuc->tgsua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người sửa') ?></th>
            <td><?php if($phankhuc->idnguoisua == 0) : ?>
                    <?php echo 'Chưa Có Chỉnh Sửa';?>
                <?php else :?>
                <?= h($phankhuc->idnguoisua);?>
                <?php endif;?></td>
        </tr>
        
    </table>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
