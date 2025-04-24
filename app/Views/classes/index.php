<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
  <h1>Classes</h1>
  <a href="<?= site_url('class/create') ?>" class="btn btn-primary mb-3">Add Class</a>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>Class Name</th>
              <th>Description</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($classes as $class): ?>
              <tr>
                  <td><?= esc($class['class_name']) ?></td>
                  <td><?= esc($class['description']) ?></td>
                  <td>
                      <a href="<?= site_url('class/edit/' . $class['id']) ?>" class="btn btn-warning">Edit</a>
                      <a href="<?= site_url('class/delete/' . $class['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this class?');">Delete</a>
                  </td>
              </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
</div>
<?= $this->endSection() ?>
