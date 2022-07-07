

        <?php include("includes/admin_navigation.php"); ?>

        <?php 
        if(isset($_FILES['file'])) {
            $photo = new Photo();
            $photo->title = $_POST['title'];
            $photo->description = $_POST['description'];
            $photo->set_file($_FILES['file']);
            if($photo->save()) {
                $session->message("successfully added");
            } else {
                var_dump($photo->custom_errors_arr);

            }
        }
        
        ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Upload</h4>
      </div>
      <div class="card-body">

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="file">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
        </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="upload.php" class="dropzone">

                </form>
            </div>
        </div>
  </div>
</div>




  <?php include("includes/footer.php"); ?>