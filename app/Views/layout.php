<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>

	<?= view('components/navbar.php') ?>

  <div class="container mt-4">
	<?php if (session()->getFlashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= session()->getFlashdata('success') ?>
		</div>
	<?php endif ?>

	<?php if (session()->getFlashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= session()->getFlashdata('error') ?>
		</div>
	<?php endif ?>

	<script>
		// Auto-dismiss alerts after 2 seconds (2000 ms)
		setTimeout(() => {
			const alerts = document.querySelectorAll('.alert');
			alerts.forEach(alert => {
				const alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
				alertInstance.close();
			});
		}, 2000);
	</script>

  <?= $this->renderSection('content') ?>
  </div>

</body>
</html>
