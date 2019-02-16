<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Tag $tag
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($tag->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TAG') ?></th>
            <td><?= h($tag->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian tạo') ?></th>
            <td><?= h($tag->tgtao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người tạo') ?></th>
            <td><?= $this->Number->format($tag->idnguoitao) ?></td>
            
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian sửa') ?></th>
            <td><?= h($tag->tgsua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID người sửa') ?></th>
            <td><?php if($tag->idnguoisua == 0) : ?>
                    <?php echo 'Chưa Có Chỉnh Sửa';?>
                <?php else :?>
                <?= h($tag->idnguoisua);?>
                <?php endif;?></td>
        </tr>
    </table>
    <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
</div>
