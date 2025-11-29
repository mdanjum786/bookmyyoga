<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.inactive{
		color: gray;
	}
	.error-msg{
		color: red;
	}

</style>

<div class="">
	<div class=""  style="float: right;">
		
	</div>
	<h3>Client List</h3>
	<hr>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Image</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php

			if(count($clients)){
				$i = 1;
				foreach($clients as $client){
		?>
			<tr>
				<td><?= $i++; ?></td>
				<td><img src="<?= base_url('assets/clients/') . $client['image']; ?>" width="150" /></td>
				<td><?= ($client['status'] == 1) ? "Active" : 'In Active' ;?></td>
				<td></td>
			</tr>
		<?php
				}
			}
		?>
		</tbody>
	</table>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<?= $this->endSection() ?>
