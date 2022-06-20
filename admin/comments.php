<?php include("includes/admin_navigation.php"); ?>
<?php
$comments = Comment::get_all();
if(isset($_GET['photo'])){
    $comments = Comment::get_all_comments($_GET['photo']);
}
?>

<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Author</th>
      <th>Body</th>
      <th>Active</th>
      <th>Photo id</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($comments as $comment): ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="/gallery/img/img-01.jpg<?= "" ?>" 
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?= $comment->author?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?= $comment->body; ?></p>
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline">Active</span>
      </td>
      <td><?= $comment->photo_id ?></td>
      <td>
        <a href="edit_comment.php?id=<?= $comment->id; ?>" class="btn btn-link btn-sm btn-rounded">
           Edit 
        </a>
        <a href="delete_comment.php?id=<?= $comment->id; ?>" class="btn btn-danger btn-sm btn-rounded">
            Delete
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>




<?php include("includes/footer.php"); ?>