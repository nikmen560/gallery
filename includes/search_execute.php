<?php
require_once("../admin/includes/init.php");

if (isset($_POST['search'])) {
  $data = [];
  $search_query = $_POST['search'];
  if (empty($search_query)) {
    $data['error'] = "search query is empty";
  }

  $sql = "SELECT * FROM photos WHERE title LIKE '%{$search_query}%' 
    OR tags LIKE '%{$search_query}%'";
  $photos = Photo::find_by_query($sql);

  if (empty($photos)) {
    $data['error'] = "nothing has been found";
  }

  if (empty($data['error'])) {

for($i = 0; $i < count($photos); $i++){

      $result_elem =
        "
                <div class='row search-result'>
                    <a href='#'>
                        <div class='col-xs-6 col-sm-3 col-md-3 col-lg-2'>
                            <img class='img-responsive w-100' src='{$photos[$i]->picture_path()}' alt=''>
                        </div>
                        <div class='col-xs-6 col-sm-9 col-md-9 col-lg-10 title'>
                            <h3>amfidsnfl;</h3>
                            <p>Ut quis libero id orci semper porta ac vel ante. In nec laoreet sapien. Nunc hendrerit ligula at massa sodales, ullamcorper rutrum orci semper.</p>
                        </div>
                    </a>
                </div>
";
$data['result'][$i] = $result_elem;
}
}
  echo json_encode($data);
}
