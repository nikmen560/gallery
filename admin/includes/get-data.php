<?php require_once("init.php") ?>
<?php

$visits = Visit::get_all();

 echo  json_encode($visits)
 
 ?>