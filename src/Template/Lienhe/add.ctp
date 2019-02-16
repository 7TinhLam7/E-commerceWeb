<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\I18n\Time;
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="lienhe form large-9 medium-8 columns content">
    <?= $this->Form->create($lienhe) ?>
    <fieldset>
        <legend><?= __('Add Lienhe') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('noidung');
            $time = Time::now();
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $time= str_replace(array(' ','/',':','_',','),array(''),$time);
            $lienhe->set('tgtao', $time)
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
