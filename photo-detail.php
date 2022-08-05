<?php require_once("includes/navigation.php") ?>
<?php require_once("includes/search.php") ?>
<?php
$photo = Photo::get_by_id($_GET['photo']);
$photo->update_views();
$comments = Comment::get_all_comments($_GET['photo']);
$related_photos = $photo->get_similar_photos();
$photo->get_similar_photos();
$tags = $photo->get_tags();
$pic_dimensions_arr = $photo->get_picture_dimensions();
$visit = new Visit();
$visit->add_visit();
?>

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary"><?= $photo->title ?></h2>
    </div>
    <div class="row tm-mb-90">
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
            <img src="<?= $photo->picture_path() ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="tm-bg-gray tm-video-details">
                <p class="mb-4">
                    <?= $photo->description  ?>
                </p>

                <div class="text-center mb-5">
                    <form action="" id="downloadForm" method="post">
                        <a id="downloadLink" name="downloadLink" href="<?= $photo->picture_path() ?>" download="" class="btn btn-primary tm-btn-big">Download</a>
                    </form>
                </div>
                <div class="mb-4 d-flex flex-wrap">
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary"><?= $pic_dimensions_arr['width'] . 'x' . $pic_dimensions_arr['height']; ?> </span>
                    </div>
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary"><?= $photo->type; ?></span>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="tm-text-gray-dark mb-3">License</h3>
                    <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                </div>
                <div>
                    <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                    <?php foreach ($tags as $tag) : ?>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block"><?= $tag ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="container">
            <div class="be-comment-block">
                <h1 class="comments-title">Comments (<?= count($comments) ?>)</h1>

                <?php foreach ($comments as $comment) : ?>
                    <div class="be-comment">
                        <div class="be-img-comment">
                            <a href="blog-detail-2.html">
                                <img src="<?= $comment->avatar ?>" alt="" class="be-ava-comment">
                            </a>
                        </div>
                        <div class="be-comment-content">
                            <span class="be-comment-name">
                                <a href="blog-detail-2.html"><?= $comment->author ?></a>
                                <small><?= $comment->email ?> </small>
                            </span>
                            <span class="be-comment-time">
                                <i class="fa fa-clock-o"></i>
                                <?= $comment->date ?>
                            </span>
                            <p class="be-comment-text">
                                <?= $comment->body ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <form class="form-block" id="add_comment_form" action="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-user"></i></div>
                                <input class="form-input" id="username" type="text" required name="username" placeholder="Your name">
                                <input type="text" class="d-none" name="photo_id" value="<?= $photo->id ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 fl_icon">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-envelope"></i></div>
                                <input class="form-input" type="text" id="email" required name="email" placeholder="Your email">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea class="form-input" id="body" name="body" required placeholder="Your text"></textarea>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary pull-right" name="submit" id="submit_btn" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">
            Related Photos
        </h2>
    </div>
    <div class="row mb-3 tm-gallery">

        <?php foreach ($related_photos as $related_photo) : ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="<?= $related_photo->picture_path() ?>" alt="<?= $related_photo->alt ?>" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?= $related_photo->title ?></h2>
                        <a href="/gallery/photo-detail.php?photo=<?= $related_photo->id ?>">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?= $related_photo->date ?> </span>
                    <span><?= $related_photo->views ?> views</span>
                </div>
            </div>
        <?php endforeach; ?>

    </div> <!-- row -->
</div> <!-- container-fluid, tm-container-content -->

<?php require_once("includes/footer.php") ?>
</body>

</html>