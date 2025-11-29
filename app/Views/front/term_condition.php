<?= $this->extend('front/master-layout') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
	<div class="row">
		<div class="col-12">
			<?= $term_condition[0]['term_condition'] ?? ''?>
		</div>
	</div>
</div>


<?= $this->endSection() ?>