<?php include("includes/admin_navigation.php"); ?>
<?php
$users = User::get_all();
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Users</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <p class="bg-success">
                <?php echo $session->message() ?>
              </p>
              <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Status</th>
                <th>Position</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img  src="<?= $user->image_path() ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                      <div class="ml-3 ms-3">
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
                    <a href="edit_user.php?id=<?= $user->id; ?>" class="btn btn-link btn-sm btn-rounded">
                      Edit
                    </a>
                    <a href="delete_user.php?id=<?= $user->id; ?>" class="btn btn-danger btn-sm btn-rounded">
                      Delete
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>





<?php include("includes/footer.php"); ?>