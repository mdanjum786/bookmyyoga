<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div style="float: right;">
	<a href ="<?php echo base_url('admin/add-member');?>" class="btn btn-info">Add Member</a>
</div>
<h3>Member List</h3>
<hr>
<div class="table-responsive">
<table class="table  table-striped" id="member-list">
	<thead>
		<th>S.No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile No</th>
		<th>Aadhar No</th>
		<th>City</th>
		<th>Pincode</th>
		<th>Address</th>
		<th>Profile</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php
			if(count($members)){
				$i = 1;
				foreach($members as $member){


		?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $member['name']; ?></td>
			<td><?= $member['email']; ?></td>
			<td><?= $member['mobile_no']; ?></td>
			<td><?= $member['aadhar_no']; ?></td>
			<td><?= $member['city']; ?></td>
			<td><?= $member['pincode']; ?></td>
			<td><?= $member['address']; ?></td>
			<td><img src="<?= base_url('assets/profile/') . $member['profile'] ?>" width="100"></td>
			<td><a href="<?= base_url('admin/member/certificate/'). $member['id'];?>" target="_blank"><i class="fa fa-certificate" aria-hidden="true"></i></a></td>
			
		</tr>
		<?php
			}
		}
		?>
	</tbody>
</table>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
	$(function(){
		$('#member-list').DataTable();
	});
</script>
<?= $this->endSection() ?>