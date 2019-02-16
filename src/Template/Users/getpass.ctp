<br>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<div class="index large-6 medium-6 large-offset-3 medium-offset-4 columns ">
	<div class="panel" style="box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;">
		<form action="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'getpass']);?> " method='POST'>
		<h4 class="text-center">Tìm Kiếm Password</h4>
		<input type='text' name='email' class='form-control' placeholder="Nhập Email ..">
		<br>
		<div class="text-center"> 
			<?= $this->Form->button(__('Xác nhận')) ?>
		</div>
	</form>
		
	</div>



</div>
