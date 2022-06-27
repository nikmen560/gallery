<?php include("includes/admin_navigation.php"); ?>
<?php
$photos = Photo::get_all();
?>
<div class="d-flex flex-wrap justify-content-center">

    <?php foreach ($photos as $photo) : ?>
        <?php $comments = Comment::get_all_comments($photo->id) ?>
        <div class="card m-3">
            <div class="card-body d-flex flex-row">
                <div>
                    <h5 class="card-title font-weight-bold mb-2"><?= $photo->title ?></h5>
                    <p class="card-text"><i class="far fa-clock pe-2"></i>07/24/2018</p>
                </div>
            </div>
            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                <!-- <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/full page/2.jpg" alt="Card image cap" /> -->
                <img src="<?= $photo->picture_path() ?>" width="500px"  class="img-fluid" alt="Wild Landscape" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>
            <div class="card-body">
                <p class="card-text collapse" id="collapseContent">
                    <?= $photo->description ?>
                </p>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-link link-danger p-md-1 my-1 delete_link"  href="delete_photo.php?id=<?= $photo->id ?>" >Delete</a>
                    <a class="btn btn-link link-primary p-md-1 my-1" href="edit_photo.php?id=<?= $photo->id ?>" >Edit</a>
                    <a class="btn btn-link link-secondary p-md-1 my-1" href="/gallery/photo-details.php?photo=<?= $photo->id ?>" >View</a>
                    <a class="btn btn-link link-info p-md-1 my-1" href="comments.php?photo=<?= $photo->id ?>" >Comments (<?= count($comments) ?>)</a>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>



<?php include("includes/footer.php"); ?>