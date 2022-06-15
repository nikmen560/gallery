

        <?php include("includes/admin_navigation.php"); ?>

        <?php 
        if(isset($_POST['submit'])) {
            $photo = new Photo();
            $photo->photo_title = $_POST['title'];
            $photo->photo_description = $_POST['description'];
            $photo->set_file($_FILES['upload']);
            if($photo->save()) {
                var_dump("success");
            } else {
                var_dump($photo->custom_errors_arr);

            }
        }
        
        ?>

        <div class="col-md-6">

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="upload">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
        </div>



  <?php include("includes/footer.php"); ?>