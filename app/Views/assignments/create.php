<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
<h1>Create Class Assignment</h1>

<form action="<?= site_url('assignments/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="user_id" class="form-label">Teacher</label>
        <select class="form-control" id="user_id" name="user_id" required>
            <?php foreach ($teachers as $teacher): ?>
                <option value="<?= esc($teacher['id']) ?>"><?= esc($teacher['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="class_id" class="form-label">Class</label>
        <select class="form-control" id="class_id" name="class_id" required>
            <?php foreach ($classes as $class): ?>
                <option value="<?= esc($class['id']) ?>"><?= esc($class['class_name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Assign Class</button>
</form>

<a href="<?= site_url('assignments') ?>" class="btn btn-secondary mt-3">Back to Assignments</a>

</div>
<?= $this->endSection() ?>
