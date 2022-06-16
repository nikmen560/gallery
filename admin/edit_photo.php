<?php require_once("includes/admin_navigation.php"); ?>
<?php
if(!empty($_GET['id'])){
    $photo = Photo::get_by_id($_GET['id']);
} else {
    redirect("admin/photos.php");
}
?>
<?php 
if(isset($_POST['update'])) {
    if($photo) {
        $photo->title = $_POST['title'];
        $photo->description = $_POST['description'];
        $photo->alt = $_POST['alt'];
        $photo->save();
    }
}
?>


<div class="d-flex justify-content-center ">
    <form method="POST" class="col-md-6 " action="" enctype="multipart/form-data">
        <!-- Text input -->
        <div class="form-outline mb-4">
            <input type="text" name="title" id="title" class="form-control" value="<?= $photo->title ?>" />
            <label class="form-label" for="title">Title</label>
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="alt" id="alt" class="form-control" value="<?= $photo->alt ?>" />
            <label class="form-label" for="alt">Alternate_description</label>
        </div>
        <!-- Text input -->
        <div class="form-outline mb-4">
            <textarea name="description" id="summernote" class="form-control" cols="30" rows="10"><?= $photo->description ?></textarea>
            <label class="form-label" for="summernote">Description</label>
        </div>

        <!-- Number input -->
        <div class="form-outline mb-4">
            <img width="100%" class="rounded-5" src="<?= $photo->picture_path() ?>" alt="<?= $photo->title ?>">
        </div>
        <div class=" mb-4">
            <label class="form-label" for="file">Upload new picture</label>
            <input type="file" class="form-control " id="file" name="upload" />
        </div>
        <!-- Submit button -->
        <button type="submit" name="update" class="btn btn-primary btn-block mb-4">Save</button>
    </form>


</div>



<?php include("includes/footer.php"); ?>
