<?= $this->extend('front/master-layout') ?>
<?= $this->section('content') ?>
<section class="mb-10">
	<center>
		<h3>Thank you for part of our yoga session</h3>
	</center>
	<center>
		<a href="<?php echo base_url('member-certificate');?>" class="btn btn-flat btn-colored btn-theme-colored mt-15 mr-15">Download Certificate</a>
	</center>
</section>
<?= $this->endSection() ?>