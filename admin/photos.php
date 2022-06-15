<?php include("includes/admin_navigation.php"); ?>
<?php
$photos = Photo::get_all();
?>
<div class="d-flex flex-wrap justify-content-center">

    <?php foreach ($photos as $photo) : ?>
        <div class="card m-3">
            <div class="card-body d-flex flex-row">
                <div>
                    <h5 class="card-title font-weight-bold mb-2"><?= $photo->photo_title ?></h5>
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
                    <?= $photo->photo_description ?>
                </p>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent" role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                    <div>
                        <i class="fas fa-share-alt text-muted p-md-1 my-1 me-2" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Share this post"></i>
                        <i class="fas fa-heart text-muted p-md-1 my-1 me-0" data-mdb-toggle="tooltip" data-mdb-placement="top" title="I like it"></i>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>



<?php include("includes/footer.php"); ?>