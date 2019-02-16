<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\sanphamcc $sanphamcc
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<div class="users index large-12 medium-8 columns content">
    <h3><?= h($sanphamcc->id) ?></h3>

    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Tên Sản Phẩm') ?></th>
            <td><?= h($sanphamcc->sanpham->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tên Nhà Cung Cấp') ?></th>
            <td><?= h($sanphamcc->nhacc->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Giá') ?></th>
            <td><?php echo $this->Number->format($sanphamcc->gia, [
                'locale' => 'fr_FR']); ;?> </td>
            </tr>
            
            <tr>
                <th scope="row"><?= __('Thời gian tạo sản phẩm') ?></th>
                <td><?= h($sanphamcc->tgtao) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('ID người tạo') ?></th>
                <td><?= h($sanphamcc->idnguoitao) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Thời gian sửa gần nhất') ?></th>
                <td><?= h($sanphamcc->tgsua) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('ID người sửa') ?></th>
                <td><?php if($sanphamcc->idnguoisua == 0) : ?>
                <?php echo 'Chưa Có Chỉnh Sửa';?>
                <?php else :?>
                    <?= h($sanphamcc->idnguoisua);?>
                    <?php endif;?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Đường dẫn') ?></th>
                    <td><a href='<?= h($sanphamcc->duongdan)?>'
                      target='_blank'><?= h($sanphamcc->duongdan) ?></a></td>
                  </tr>
              </table>
              <p class="text-center"><?= $this->Html->link(__('Quay lại'), ['action' => 'index']) ?> </p>
          </div>
