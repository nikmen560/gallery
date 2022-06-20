<?php require_once("includes/navigation.php") ?>
<?php require_once("includes/search.php") ?>
<?php $photo = Photo::get_by_id($_GET['photo']) ?>
<?php $comments = Comment::get_all_comments($_GET['photo']) ?>


<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary"><?= $photo->title ?></h2>
    </div>
    <div class="row tm-mb-90">
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
            <img src="/gallery/admin/<?= $photo->picture_path() ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="tm-bg-gray tm-video-details">
                <p class="mb-4">
                    <?= $photo->description  ?>
                </p>
                <div class="text-center mb-5">
                    <a href="#" class="btn btn-primary tm-btn-big">Download</a>
                </div>
                <div class="mb-4 d-flex flex-wrap">
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">1920x1080</span>
                    </div>
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">JPG</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="tm-text-gray-dark mb-3">License</h3>
                    <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                </div>
                <div>
                    <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Cloud</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Background</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Timelapse</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Real Estate</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="container">
            <div class="be-comment-block">
                <h1 class="comments-title">Comments (3)</h1>

                <?php foreach($comments as $comment): ?>
                <div class="be-comment">
                    <div class="be-img-comment">
                        <a href="blog-detail-2.html">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">

                        <span class="be-comment-name">
                            <a href="blog-detail-2.html"><?= $comment->author ?></a>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            May 27, 2015 at 3:14am
                        </span>

                        <p class="be-comment-text">
                            <?= $comment->body ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="be-comment">
                    <div class="be-img-comment">
                        <a href="blog-detail-2.html">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">
                        <span class="be-comment-name">
                            <a href="blog-detail-2.html">Phoenix, the Creative Studio</a>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            May 27, 2015 at 3:14am
                        </span>
                        <p class="be-comment-text">
                            Nunc ornare sed dolor sed mattis. In scelerisque dui a arcu mattis, at maximus eros commodo. Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant. Proin ut ornare lectus, vel eleifend est. Fusce hendrerit dui in turpis tristique blandit.
                        </p>
                    </div>
                </div>
                <div class="be-comment">
                    <div class="be-img-comment">
                        <a href="blog-detail-2.html">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">
                        <span class="be-comment-name">
                            <a href="blog-detail-2.html">Cüneyt ŞEN</a>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            May 27, 2015 at 3:14am
                        </span>
                        <p class="be-comment-text">
                            Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant
                        </p>
                    </div>
                </div>
                <form class="form-block">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-user"></i></div>
                                <input class="form-input" type="text" placeholder="Your name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 fl_icon">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                <input class="form-input" type="text" placeholder="Your email">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea class="form-input" required="" placeholder="Your text"></textarea>
                            </div>
                        </div>
                        <a class="btn btn-primary pull-right">submit</a>
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
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-01.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Hangers</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">16 Oct 2020</span>
                <span>12,460 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-02.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Perfumes</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">12 Oct 2020</span>
                <span>11,402 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-03.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Clocks</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">8 Oct 2020</span>
                <span>9,906 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-04.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Plants</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">6 Oct 2020</span>
                <span>16,100 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-05.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Morning</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">26 Sep 2020</span>
                <span>16,008 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-06.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Pinky</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">22 Sep 2020</span>
                <span>12,860 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-07.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Bus</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">12 Sep 2020</span>
                <span>10,900 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-08.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>New York</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">4 Sep 2020</span>
                <span>11,300 views</span>
            </div>
        </div>
    </div> <!-- row -->
</div> <!-- container-fluid, tm-container-content -->
<?php require_once("includes/footer.php") ?>

</body>

</html>