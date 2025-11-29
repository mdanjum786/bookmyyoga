<?= $this->extend('front/master-layout') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
	<div class="row">
		<div class="col-12">
			<?= $privacy_policy[0]['privacy_policy'] ?? ''?>
		</div>
	</div>
</div>


<?= $this->endSection() ?>