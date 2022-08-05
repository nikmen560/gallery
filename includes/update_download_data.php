<?php 
if(isset($_POST['download_photo_id'])) {
    $data = [];
    $photo = Photo::get_by_id($_GET['photo']);
    $photo->download_count += 1;
    if($photo->update()) { 
    $data['success'] = true;

    } else {
        $data['success'] = true;
    }
    if(!empty($data)) {
       return json_encode($data);
    }
}

?>