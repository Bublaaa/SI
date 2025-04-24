<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <h2>Create New User</h2>

  <form action="<?= base_url('/users/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select name="status" id="status" class="form-select" required>
        <option value="">-- Select Role --</option>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>
<?= $this->endSection() ?>
