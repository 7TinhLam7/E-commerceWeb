<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\hangsx $hangsx
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($hangsx->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên Hãng') ?></th>
            <td><?= h($hangsx->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời Gian Tạo') ?></th>
            <td><?= h($hangsx->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Người Tạo') ?></th>
            <td><?= h($hangsx->idnguoitao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời Gian Sửa Gần Nhất') ?></th>
            <td><?= h($hangsx->tgsua) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('ID Người Sửa') ?></th>
            <td>
              <?php if($hangsx->idnguoisua == 0) : ?>
                <?php echo 'Chưa Có Chỉnh Sửa';?>
                <?php else :?>
                    <?= h($hangsx->idnguoisua);?>
                <?php endif;?>
            </td>
        </tr>
        
    </table>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
