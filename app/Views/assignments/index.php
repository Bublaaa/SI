<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
	<h1>Class Assignments</h1>
	<a href="<?= site_url('assignments/create') ?>" class="btn btn-primary mb-3">Assign Class</a>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Teacher</th>
				<th>Class</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($assignments as $assignment): ?>
				<tr>
					<td><?= esc($assignment['teacher_name']) ?></td>
					<td><?= esc($assignment['class_name']) ?></td>
					<td>
						<a href="<?= site_url('assignments/edit/' . $assignment['id']) ?>" class="btn btn-warning">Edit</a>
						<a href="<?= site_url('assignments/delete/' . $assignment['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this assignment?');">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?= $this->endSection() ?>
