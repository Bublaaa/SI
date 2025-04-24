<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

	<?= view('components/navbar.php') ?>

  <div class="container mt-4">
		<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
		<?php if (session()->getFlashdata('success')): ?>
			<div class="toast text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						<?= session()->getFlashdata('success') ?>
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		<?php endif ?>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="toast text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						<?= session()->getFlashdata('error') ?>
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		<?php endif ?>
	</div>


	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const toastElements = document.querySelectorAll('.toast');
			toastElements.forEach(toastEl => {
				const toast = new bootstrap.Toast(toastEl, { delay: 2000 });
				toast.show();
			});
		});
	</script>


  <?= $this->renderSection('content') ?>
  </div>

</body>
</html>
