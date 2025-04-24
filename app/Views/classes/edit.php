<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
  <h1>Edit Class: <?= esc($class['class_name']) ?></h1>
  <form action="<?= site_url('class/update/' . $class['id']) ?>" method="post">
      <?= csrf_field() ?>
      <div class="form-group">
          <label for="class_name">Class Name</label>
          <input type="text" class="form-control" id="class_name" name="class_name" value="<?= esc($class['class_name']) ?>" required>
      </div>
      <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" required><?= esc($class['description']) ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update Class</button>
  </form>
</div>
<?= $this->endSection() ?>
