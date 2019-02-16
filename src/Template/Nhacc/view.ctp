<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\nhacc $nhacc
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($nhacc->id) ?></h3>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên') ?></th>
            <td><?= h($nhacc->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số điện Thoại') ?></th>
            <td><?php echo $this->Number->format($nhacc->sdt, [
                'locale' => 'fr_FR'
                ]); ;?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Địa Chỉ') ?></th>
                <td><?= h($nhacc->diachi) ?></td>
            </tr>
            
            <tr>
                <th scope="row"><?= __('Thời gian tạo ') ?></th>
                <td><?= h($nhacc->tgtao) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('ID người tạo') ?></th>
                <td><?= h($nhacc->idnguoitao) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
                <td><?= h($nhacc->tgsua) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('ID người sửa') ?></th>
                <td><?php if($nhacc->idnguoisua == 0) : ?>
                <?php echo 'Chưa Có Chỉnh Sửa';?>
                <?php else :?>
                    <?= h($nhacc->idnguoisua);?>
                    <?php endif;?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Logo Nhà Cung Cấp') ?></th>
                    <td><img src="../../<?php echo $nhacc->hinhcc_dd.$nhacc->hinhcc;?>" width="150" height="150"></td>
                </tr>
            </table>
            <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        </div>
