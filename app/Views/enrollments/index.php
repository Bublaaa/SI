<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Enrollments</h1>
    <a href="<?= site_url('enrollments/create') ?>" class="btn btn-primary mb-3">Enroll Student</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student</th>
                <th>Class</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enrollments as $enrollment): ?>
                <tr>
                    <td><?= esc($enrollment['student_name']) ?></td>
                    <td><?= esc($enrollment['class_name']) ?></td>
                    <td>
                        <a href="<?= site_url('enrollments/edit/' . $enrollment['id']) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('enrollments/delete/' . $enrollment['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
