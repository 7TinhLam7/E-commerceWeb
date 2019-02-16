<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\mau $mau
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="maus index large-12 medium-8 columns content">
    <h3><?= h($mau->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tên Màu') ?></th>
            <td><?= h($mau->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian tạo') ?></th>
            <td><?= h($mau->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người tạo') ?></th>
            <td><?= h($mau->idnguoitao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
            <td><?= h($mau->tgsua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người sửa') ?></th>
            <td><?php if($mau->idnguoisua == 0) : ?>
            <?php echo 'Chưa Có Chỉnh Sửa';?>
            <?php else :?>
                <?= h($mau->idnguoisua);?>
                <?php endif;?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Ảnh màu') ?></th>
                <td><img src="../../<?php echo $mau->hinhm_dd.$mau->hinhm;?>" style="height: 60px;width: 60px"></td>
            </tr>
            
            
        </table>
        <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
        
    </div>
