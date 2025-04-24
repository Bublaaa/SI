<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
  <h1>Create New Class</h1>

  <form action="<?= site_url('class/store') ?>" method="post">
      <?= csrf_field() ?> 
      
      <div class="mb-3">
          <label for="class_name" class="form-label">Class Name</label>
          <input type="text" class="form-control" id="class_name" name="class_name" required>
      </div>

      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Save Class</button>
  </form>

  <a href="<?= site_url('class') ?>" class="btn btn-secondary mt-3">Back to Class List</a>

</div>
<?= $this->endSection() ?>
