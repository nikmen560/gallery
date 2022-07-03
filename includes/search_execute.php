<?php
require_once("../admin/includes/init.php");

if (isset($_POST['search'])) {
  $data = [];
  $search_query = $_POST['search'];
  if (empty($search_query)) {
    $data['error'] = "Search query is empty";
  }

  $sql = "SELECT * FROM photos WHERE title LIKE '%{$search_query}%' 
    OR tags LIKE '%{$search_query}%'";
  $photos = Photo::find_by_query($sql);

  if (empty($photos)) {
    $data['error'] = "Nothing has been found";
  }

  if (empty($data['error'])) {
    foreach ($photos as $photo) {
      $result_elem =
        "
                <div class='row search-result mb-3 search-result-success'>
                    <a class='d-flex' href='/gallery/photo-detail.php?photo={$photo->id}'>
                        <div class='col-xs-6 col-sm-3 col-md-3 col-lg-2 m-3'>
                            <img class='img-responsive w-100' src='{$photo->picture_path()}' alt='{$photo->alt}'>
                        </div>
                        <div class='col-xs-6 col-sm-9 col-md-9 col-lg-10 title'>
                            <h3>{$photo->title}</h3>
                            <p>{$photo->description}</p>
                        </div>
                    </a>
                </div>
";
      if (empty($data['result'])) {
        $data['result'] = $result_elem;
      } else {
        $data['result'] .= $result_elem;
      }
    }
  }
  echo json_encode($data);
}
