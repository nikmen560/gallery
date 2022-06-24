<?php require_once("init.php") ?>


<?php
$photos = Photo::get_all();

?>

<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalTitle">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php foreach ($photos as $photo) : ?>
                        <div class="col-sm mb-2">
                            <div class="hover-zoom">
                                <img class="img-fluid image_modal "  src="<?= $photo->picture_path(); ?>"  alt="" />
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" disabled="true" id="set_user_image" class="btn btn-primary ">Save changes</button>
            </div>
        </div>
    </div>
</div>