<?php require_once("includes/navigation.php") ?>
<?php require_once("includes/search.php") ?>

<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 8;
$items_total = Photo::count_all();
$paginate = new Paginate($page, $items_per_page, $items_total);
$photos = Photo::get_paginated_photos($items_per_page, $paginate);
$visit = new Visit();
$visit->add_visit();

?>

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Latest Photos
        </h2>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" class="tm-text-primary">
                Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of <?= $paginate->page_total() ?>
            </form>
        </div>
    </div>
    <div class="row tm-mb-90 tm-gallery">
        <?php foreach ($photos as $photo) : ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="<?= $photo->picture_path() ?>" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?= $photo->title ?></h2>
                        <a href="photo-detail.php?photo=<?= $photo->id ?>">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?= $photo->date ?></span>
                    <span><?= $photo->views ?> views</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div> <!-- row -->
    <div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <?php if ($paginate->has_previous()) : ?>
                <a href="/gallery/index.php?page=<?= $paginate->previous() ?>" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
            <?php else : ?>
                <a class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
            <?php endif; ?>
            <div class="tm-paging d-flex">
                <?php
                for ($i = 1; $i <= $paginate->items_total_count; $i++) {
                    if ($i <= 4) {
                        if ($paginate->current_page == $i) {
                            echo "<a href='/gallery/index.php?page={$i}' class=' tm-paging-link active'>{$i}</a>";
                        } else {
                            echo "<a href='/gallery/index.php?page={$i}' class=' tm-paging-link'>{$i}</a>";
                        }
                    } else {
                        break;
                    }
                }

                ?>

            </div>
            <?php if ($paginate->has_next()) : ?>
                <a href="/gallery/index.php?page=<?= $paginate->next() ?>" class="btn btn-primary tm-btn-next">Next Page</a>
            <?php else : ?>
                <a class="btn btn-primary tm-btn-next disabled ">Next Page</a>
            <?php endif; ?>
        </div>
    </div>
</div> <!-- container-fluid, tm-container-content -->
<?php require_once("includes/footer.php") ?>