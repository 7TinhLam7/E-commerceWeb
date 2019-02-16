<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Loai $loai
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($loai->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên Loại') ?></th>
            <td><?= h($loai->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thuộc Nhóm') ?></th>
            <td><?= h($loai->nhom->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời Gian Tạo') ?></th>
            <td><?= h($loai->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Người Tạo') ?></th>
            <td><?= h($loai->idnguoitao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời Gian Sửa') ?></th>
            <td><?= h($loai->tgsua) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('ID Người Sửa') ?></th>
            <td>
              <?php if($loai->idnguoisua == 0) : ?>
                <?php echo 'Chưa Có Chỉnh Sửa';?>
                <?php else :?>
                    <?= h($loai->idnguoisua);?>
                <?php endif;?>
            </td>
        </tr>
        
    </table>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
