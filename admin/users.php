<?php include("includes/admin_navigation.php"); ?>
<?php
$users = User::get_all();
?>

<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Title</th>
      <th>Status</th>
      <th>Position</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="images/<?= $user->image ?>" 
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?= $user->username ?></p>
        <p class="text-muted mb-0"><?= $user->first_name . ' ' . $user->last_name ?> </p>
            <p class="text-muted mb-0"><?= $user->email ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?= $user->role; ?></p>
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline">Active</span>
      </td>
      <td>Senior</td>
      <td>
        <button type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
        <a href="delete_user.php?id=<?= $user->id; ?>" class="btn btn-danger btn-sm btn-rounded">
            Delete
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>




<?php include("includes/footer.php"); ?>