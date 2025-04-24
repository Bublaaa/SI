<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Enroll Student</h1>
    <form action="<?= site_url('enrollments/store') ?>" method="post">
        <div class="mb-3">
            <label for="user_id" class="form-label">Student</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <?php foreach ($students as $student): ?>
                    <option value="<?= $student['id'] ?>"><?= esc($student['name']) ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" id="class_id" class="form-control" required>
                <?php foreach ($classes as $class): ?>
                    <option value="<?= $class['id'] ?>"><?= esc($class['class_name']) ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enroll</button>
    </form>
</div>

<?= $this->endSection() ?>
